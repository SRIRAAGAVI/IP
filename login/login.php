<html>
    <head>
        <h1>The home page</h1>
        </head>
<body>
    <table border="3">
        <tr>
            <th>ID</thth>
            <th>Username</th>
            <th>Password</th>
        </tr>
<?php
$connection = mysqli_connect("localhost","root","","users",3307);
$sql = "select * from accounts";
$run=mysqli_query($connection,$sql);
$id=1;
while($row=mysqli_fetch_array($run)){
    $uid=$row['id'];
    $un=$row['username'];
    $pw=$row['password'];
?>
<tr>
    <td><?php echo $uid ?></td>
    <td><?php echo $un ?></td>
    <td><?php echo $pw ?></td>
<td>

    <button><a href="Edit.php?edit=<?php echo $uid ?>">Edit</a></button> &nbsp;
      <button><a href="Delete.php?del=<?php echo $uid ?>">Delete</a></button>
</td>
</tr>
<?php $id++ ; } ?>
</table>
</body>
</html>

            