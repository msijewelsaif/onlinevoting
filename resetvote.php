<?php
require('db.php');

// SQL statement to reset all vote counts to 0
$sql = "UPDATE votes SET vote_count = 0";

if ($conn->query($sql) === TRUE) {
    echo "Votes have been reset.";
} else {
    echo "Error resetting votes: " . $conn->error;
}

$conn->close();
?>
