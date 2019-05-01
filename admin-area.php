<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Area | Seoul | Assignment 7</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<?php 
include('connect-db.php');
$result = mysqli_query($connection, "SELECT * FROM survey");
?>
<div class="container">
  <div style="float: right; margin-top: 30px;">
    <?php if(isset($_SESSION['username'])) { ?>
      <a href="logout.php">Logout of your Admin Account</a>
      <?php } else { ?>
    <?php } ?>
</div>
  <h1>Survey Results</h1>
  <table border class="table table-striped table-hover">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Location</th>
      <th>Favorite Movie</th>
      <th>Favorite Character</th>
      <th>Favorite Song</th>
      <th>Scariest Villain</th>
      <th>IP Address</th>
      <?php if(isset($_SESSION['username'])) { ?>
      <th colspan="2"><em>Functions</em></th>
      <?php } ?>
    </tr>
<?php
// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {
?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['question1']; ?></td>
    <td><?php echo $row['question2']; ?></td>
    <td><?php echo $row['question3']; ?></td>
    <td><?php echo $row['question4']; ?></td>
    <td><?php echo $row['ip_address']; ?></td>
    <?php if(isset($_SESSION['username'])) { ?>
    <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
    <td><a onclick="return confirm('Are you sure you want to delete ID: <?php echo $row["id"]; ?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    <?php } ?>
  </tr>
<?php
// close the loop
}
?>
</table>

<div>
  <br>
  <?php if(isset($_SESSION['username'])) { ?>
	<a href="new.php">Add a new record</a>
  <?php } ?>
</div>
</div>
</body>
</html>