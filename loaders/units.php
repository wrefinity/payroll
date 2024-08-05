<?php
require_once "../db/connect.php";

class DepartmentUnitsLoader extends DB {
    private $role;
    private $ministry_id;
    private $dept_id;
    private $table = "unit_tb";


    public function __construct($role, $ministry_id, $dept_id) {
        parent::__construct();
        $this->role = $role;
        $this->ministry_id = $ministry_id;
        $this->dept_id = $dept_id;
    }

    public function loadUnits() {
   
        $units = [];
        $query = "select distinct unit_id, unit_name from $this->table where ministry_id='$this->ministry_id' and dept_id='$this->dept_id' order by unit_name";
        $result = $this->conn->query($query);

        if (!$result) {
            echo json_encode(['status' => 'error', 'message' => $this->conn->error]);
            exit;
        }

        while ($row = $result->fetch_assoc()) {
            $units[$row['unit_id']] = $row['unit_name'];
        }
        echo json_encode(['status' => 'success', 'units' => $units]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    $ministry_id = $_POST['ministry_id'];
    $dept_id = $_POST['dept_id'];

    
    $unitLoader = new DepartmentUnitsLoader( $role, $ministry_id, $dept_id);
    $unitLoader->loadUnits();
    // Close the database connection
    $unitLoader->closeConnection();
}

?>
