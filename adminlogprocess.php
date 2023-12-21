<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
       
        header('Location: admin.php');
    } else {
        echo "Login failed. Please try again.";
    }
}

$conn->close();
?>
