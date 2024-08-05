<?php
require_once "../db/connect.php";

class DepartmentLoader extends DB
{
    private $role;
    private $ministry_id;
    private $dept_id;
    private $dept_name;
    private $table = "depttb";

    public function __construct($role, $ministry_id, $dept_id = '', $dept_name = '')
    {
        parent::__construct();
        $this->role = $role;
        $this->ministry_id = $ministry_id;
        $this->dept_id = $dept_id;
        $this->dept_name = $dept_name;
    }

    public function loadDepartments()
    {
        return $this->queryDepartments("ministry_id='{$this->ministry_id}'");
    }


    private function queryDepartments($condition)
    {
        $departments = [];
        $query = "SELECT DISTINCT dept_id, dept_name FROM $this->table WHERE $condition ORDER BY dept_name";
        $result = $this->conn->query($query);

        if (!$result) {
            echo json_encode(['status' => 'error', 'message' => $this->conn->error]);
            exit;
        }

        while ($row = $result->fetch_assoc()) {
            $departments[$row['dept_id']] = $row['dept_name'];
        }

        echo json_encode(['status' => 'success', 'departments' => $departments]);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contentvar']) && $_POST['contentvar'] == 'load_dept') {
    $role = $_POST['role'];
    $ministry_id = $_POST['ministry_id'];
    $dept_id = isset($_POST['dept_id']) ? $_POST['dept_id'] : '';
    $dept_name = isset($_POST['dept_name']) ? $_POST['dept_name'] : '';

    $deptLoader = new DepartmentLoader($role, $ministry_id, $dept_id, $dept_name);
    $deptLoader->loadDepartments();
    $deptLoader->closeConnection();
}
