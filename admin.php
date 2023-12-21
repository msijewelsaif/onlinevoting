<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <div class="container">
        <h2>Admin - Vote Counts</h2>
        <table>
            <tr>
                <th>Fruit</th>
                <th>Vote Count</th>
            </tr>
            <?php
            require('db.php');

            // Check if the form has been submitted to reset votes
            if (isset($_POST['reset_votes'])) {
                // SQL statement to reset all vote counts to 0
                $resetSql = "UPDATE votes SET vote_count = 0";
                if ($conn->query($resetSql) === TRUE) {
                    echo "Votes have been reset.";
                } else {
                    echo "Error resetting votes: " . $conn->error;
                }
            }

            $sql = "SELECT fruit, COUNT(*) as vote_count FROM votes GROUP BY fruit";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['fruit'] . "</td><td>" . $row['vote_count'] . "</td></tr>";
                }
            }

            $conn->close();
            ?>
        </table>
        <form action="" method="POST">
            <input type="submit" name="reset_votes" value="Reset" class="reset-button">
        </form>
        <a href="logoutadmin.php" class="logout">Logout</a>
    </div>
</body>
</html>
