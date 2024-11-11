<?php
// Database connection
$connection = mysqli_connect("localhost", "root", "", "library", 3307);
$edit = $_GET['edit'];

// Initialize variables with default values to prevent warnings
$uid = $name = $address = $mobile = "";

// Fetch the user data based on the ID
$sql = "SELECT * FROM user WHERE id = '$edit'";
$run = mysqli_query($connection, $sql);

// Check if any rows are returned
if ($run && mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_array($run)) {
        $uid = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $mobile = $row['mobile'];
    }
} else {
    echo "No user found with the provided ID.";
}
?>

<?php
// Update user data if form is submitted
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $sql = "UPDATE user SET name='$name', address='$address', mobile='$mobile' WHERE id='$edit'";
    
    if (mysqli_query($connection, $sql)) {
        echo '<script>location.replace("index.php")</script>';
    } else {
        echo "Something went wrong: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Student Crud Application</h1>
                    </div>
                    <div class="card-body">
                        <form action="?edit=<?php echo $edit; ?>" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php echo htmlspecialchars($address); ?>">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
