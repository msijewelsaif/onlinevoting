<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 1; // You would get the user ID after they log in
    $fruit = $_POST['fruit'];

    $sql = "INSERT INTO votes (user_id, fruit) VALUES ('$user_id', '$fruit')";

    if ($conn->query($sql) === TRUE) {
        header('Location: votesuccessful.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
