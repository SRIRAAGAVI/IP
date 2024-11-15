<?php
  $connection = mysqli_connect("localhost", "root", "","users",3307);
  if(isset($_POST["submit"]))
  {
    $Username = $_POST['unme'];
    $password = $_POST['pss'];
    $sql = "insert into accounts(username,password)values('$Username','$password')";
    if(mysqli_query($connection,$sql))
    {
        echo '<script>location.replace("login.php")</script>';
    }
    else
    {
        echo "Some thing Error" .$connection->error;

    }
    




  }



?>
<html>
    <head>
        <title>The login form</title>
    </head>
    <body>
    <h1>The registration page<h1>
                            <br>
    <form method='post' action='Add.php'>
        Username: <input type='text' name='unme' required><br><br>
        Password: <input type='password' name='pss' required><br><br>
        <input type='submit' value='Submit' name="submit">
    </form>
    </body>
</html>
