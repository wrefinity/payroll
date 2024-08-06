<?php
require_once "../db/connect.php";
require_once "../utils/ImageHandler.php";

class Ministry extends DB
{
    private $table = "ministries";

    public function __construct()
    {
        parent::__construct();
    }

    public function createMinistry($name, $description, $address, $logoFile)
    {
        $imageHandler = new ImageHandler();
        $logoPath = $imageHandler->uploadNow($logoFile);

        if (strpos($logoPath, "Sorry") === false) {
            return false; // Image upload failed
        }
        $stmt = $this->conn->prepare("INSERT INTO $this->table (`name`, `description`, `address`, `logo`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $description, $address, $logoPath);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateMinistry($id, $name, $description, $address, $logoFile = null)
    {
        if ($logoFile) {
            $imageHandler = new ImageHandler();
            $logoPath = $imageHandler->uploadNow($logoFile);

            if (strpos($logoPath, "Sorry") === false) {
                return false; // Image upload failed
            }

            $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, description = ?, address = ?, logo = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $description, $address, $logoPath, $id);
        } else {
            $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, description = ?, address = ? WHERE id = ?");
            $stmt->bind_param("sssi", $name, $description, $address, $id);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteMinistry($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMinistries()
    {
        $result = $this->conn->query("SELECT * FROM $this->table");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMinistryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
?>
