<?php
session_start();
require_once '../controllers/Auth.php';

// Create User object
$auths = new Authenticate();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($auths->loginUser($username, $password)) {
        $_SESSION['username'] = $username;
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
    }
}
?>
