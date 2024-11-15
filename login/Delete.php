<?php
$connection = mysqli_connect("localhost", "root", "", "users", 3307);
$delete = $_GET['del'];

$sql = "DELETE FROM accounts WHERE id = '$delete'";
if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("login.php")</script>';
} else {
    echo "Something went wrong: " . $connection->error;
}
?>