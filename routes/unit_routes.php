<?php
require_once "../controllers/Unit.php";

$unit = new Unit();

$action = $_POST['action'];

switch ($action) {
    case 'createUnit':
        $ministry_id = $_POST['ministry_id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $result = $unit->createUnit($ministry_id, $name, $description, $address);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;

    case 'updateUnit':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $result = $unit->updateUnit($id, $name, $description, $address);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;

    case 'deleteUnit':
        $id = $_POST['id'];
        $result = $unit->deleteUnit($id);
        echo json_encode(['status' => $result ? 'success' : 'error']);
        break;

    case 'getUnits':
        $units = $unit->getUnits();
        echo json_encode(['status' => 'success', 'data' => $units]);
        break;

    case 'getUnitById':
        $id = $_POST['id'];
        $unitData = $unit->getUnitById($id);
        echo json_encode(['status' => 'success', 'data' => $unitData]);
        break;

    case 'getUnitsByMinistryId':
        $ministry_id = $_POST['ministry_id'];
        $units = $unit->getUnitsByMinistryId($ministry_id);
        echo json_encode(['status' => 'success', 'data' => $units]);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
?>