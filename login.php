<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login, redirect to another page
        header('Location: vote.html');
    } else {
        echo "Login failed. Please try again.";
    }
}

$conn->close();
?>
