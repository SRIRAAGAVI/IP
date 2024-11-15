<?php
// Establish database connection
$connection = mysqli_connect("localhost", "root", "", "users", 3307);

// Check if the "edit" parameter is set
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];

    // Fetch user data to edit
    $sql = "SELECT * FROM accounts WHERE id = '$edit'";
    $run = mysqli_query($connection, $sql);

    if ($run && mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_array($run);
        $uid = $row['id'];
        $name = $row['username'];
        $password = $row['password'];
    } else {
        echo "User not found!";
        exit;
    }
} else {
    echo "No user specified to edit.";
    exit;
}
?>

<?php
// Update user data if form is submitted
if (isset($_POST["submit"])) {
    $name = $_POST['unme'];
    $password = $_POST['pss'];
    
    // Corrected SQL query without extra comma
    $sql = "UPDATE accounts SET username='$name', password='$password' WHERE id='$edit'";
    
    if (mysqli_query($connection, $sql)) {
        echo '<script>location.replace("login.php")</script>';
    } else {
        echo "Something went wrong: " . $connection->error;
    }
}

// Close the database connection
mysqli_close($connection);
?>

<html>
    <head>
        <title>Update User</title>
    </head>
    <body>
        <div class='card-header'>
            <h1>Update User</h1>
        </div>
        <div class='card-body'>
            <form method='post' action='Edit.php?edit=<?php echo $edit; ?>'>
                Username: <input type='text' name='unme' required value="<?php echo htmlspecialchars($name); ?>"><br>
                Password: <input type='password' name='pss' required value="<?php echo htmlspecialchars($password); ?>"><br>
                <input type='submit' value='Submit' name="submit">
            </form>
        </div>
    </body>
</html>
