<?php
require_once "../controllers/Ministry.php";

$ministry = new Ministry();

$action = $_POST['action'];

switch ($action) {
    case 'create':
        $name = $_POST['name'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $logoFile = $_FILES['logo'];
        $result = $ministry->createMinistry($name, $description, $address, $logoFile);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;
    
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $logoFile = !empty($_FILES['logo']) ? $_FILES['logo'] : null;
        $result = $ministry->updateMinistry($id, $name, $description, $address, $logoFile);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;
    
    case 'delete':
        $id = $_POST['id'];
        $result = $ministry->deleteMinistry($id);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;
    
    case 'get':
        $ministries = $ministry->getMinistries();
        echo json_encode(['status' => 'success', 'data' => $ministries]);
        break;
    
    case 'getById':
        $id = $_POST['id'];
        $ministryData = $ministry->getMinistryById($id);
        echo json_encode(['status' => 'success', 'data' => $ministryData]);
        break;
    
    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
?>
