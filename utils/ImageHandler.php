<?php

class ImageHandler {
    private $targetDir = "../uploads/";

    public function uploadNow($imageFile){
        $targetFile = $this->targetDir . basename($imageFile["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($imageFile["tmp_name"]);
        if ($check === false) {
            return "File is not an image.";
        }

        // Check file size (5MB max)
        if ($imageFile["size"] > 5000000) {
            return "Sorry, your file is too large.";
        }

        // Allow certain file formats
        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        // Resize image
        $resizedImage = $this->resizeImage($imageFile["tmp_name"], $imageFileType, 800, 800);

        // Save resized image to server
        $resizedFilePath = $this->targetDir . "resized_" . basename($imageFile["name"]);
        if (!imagejpeg($resizedImage, $resizedFilePath, 90)) {
            return "Sorry, there was an error uploading your file.";
        }

        // Return the path of the resized image
        return $resizedFilePath;
    }

    private function resizeImage($file, $fileType, $width, $height)
    {
        list($originalWidth, $originalHeight) = getimagesize($file);

        $newWidth = $width;
        $newHeight = ($originalHeight / $originalWidth) * $newWidth;

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

        switch ($fileType) {
            case "jpg":
            case "jpeg":
                $srcImage = imagecreatefromjpeg($file);
                break;
            case "png":
                $srcImage = imagecreatefrompng($file);
                break;
            case "gif":
                $srcImage = imagecreatefromgif($file);
                break;
            default:
                return false;
        }

        imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
        return $resizedImage;
    }
}

// Usage example:

// Include your database connection file
require_once "db/connect.php";

$db = new DB(); // Assume this is your database connection class
$imageHandler = new ImageHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $otherInfo = $_POST['other_info'];
    $resizedFilePath = $imageHandler->uploadNow($_FILES['image']);
    
    if (strpos($resizedFilePath, "Sorry") === false) {
        // Save information to database
        $query = "INSERT INTO images (image_path, other_info) VALUES (?, ?)";
        $stmt = $db->getConnection()->prepare($query);
        $stmt->bind_param("ss", $resizedFilePath, $otherInfo);
        if ($stmt->execute()) {
            echo "The file has been uploaded and resized.";
        } else {
            echo "Sorry, there was an error saving to the database.";
        }
    } else {
        echo $resizedFilePath; // Display the error message
    }
}
?>
