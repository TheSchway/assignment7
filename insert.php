<?php
	// 1. Create a database connection


	// Usually this data would come from HTML form values in $_POST
	require_once("connect-db.php");

	// This data is coming from HTML form values in $_POST
	$insertName = $_POST["name"];
	$insertEmail = $_POST["email"];
	$insertLocation = $_POST["location"];
	$insertMovie = $_POST["favmovie"];
	$insertCharacter = $_POST["favchar"];
	$insertSong = $_POST["favsong"];
	$insertVillain = $_POST["mean"];

	// You really should escape all strings
	$insertName = mysqli_real_escape_string($connection, $insertName);
	$insertEmail = mysqli_real_escape_string($connection, $insertEmail);
	$insertLocation = mysqli_real_escape_string($connection, $insertLocation);
	$insertMovie = mysqli_real_escape_string($connection, $insertMovie);
	$insertCharacter = mysqli_real_escape_string($connection, $insertCharacter);
	$insertSong = mysqli_real_escape_string($connection, $insertSong);
	$insertVillain = mysqli_real_escape_string($connection, $insertVillain);
	
	// 2. Perform database query
	$query  = "INSERT INTO survey (name, email, location, question1, question2, question3, question4) VALUES ('$insertName','$insertEmail','$insertLocation','$insertMovie','$insertCharacter','$insertSong','$insertVillain')";
	$result = mysqli_query($connection, $query);

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Database Insert | Seoul | Assignment 7</title>
	<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/navigation.css">
		<link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
</head>
<body>
	<div class="container">
	<h1>Success!</h1>


<?php
	if ($result) {
		echo "Thank you for filling out our survey! Click the link below to learn more about the Shrek movies!";
?>
<?php
	} else {
		die("Database query failed.");
	}
?>
	<a href="index.php">Click here to return to the home page!</a>

	<a href="shrek1.php">Click here to learn more!</a>
	</div>
</body>
</html>

<?php
	// 4. Step 4 is unnecessary here because we didn't 
	//	  get data that needs to be released
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>