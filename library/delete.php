<?php
$connection = mysqli_connect("localhost", "root", "", "library", 3307);
$delete = $_GET['del'];

$sql = "DELETE FROM user WHERE id = '$delete'";
if (mysqli_query($connection, $sql)) {
    echo '<script>location.replace("index.php")</script>';
} else {
    echo "Something went wrong: " . $connection->error;
}
?>