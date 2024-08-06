<?php
require_once "../db/connect.php";

class Unit extends DB
{
    private $table = "units";

    public function __construct()
    {
        parent::__construct();
    }

    public function createUnit($ministry_id, $name, $description, $address)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (ministry_id, name, description, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $ministry_id, $name, $description, $address);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUnit($id, $name, $description, $address)
    {
        $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, description = ?, address = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $description, $address, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUnit($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUnits()
    {
        $result = $this->conn->query("SELECT * FROM $this->table");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUnitById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function getUnitsByMinistryId($ministry_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE ministry_id = ?");
        $stmt->bind_param("i", $ministry_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
