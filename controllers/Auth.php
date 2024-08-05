<?php
require_once "../db/connect.php";

class Authenticate extends DB
{
    private $table = "user_tb";


    public function __construct()
    {
        parent::__construct();
    }

    public function loginUser($email, $pass)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($pass, $user['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function registerUser()
    {
        return ;
    }

}
