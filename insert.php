<?php
	// 1. Create a database connection

	// Usually this data would come from HTML form values in $_POST
	require_once("connect-db.php");
	function getUserIpAddr(){
    	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        	//ip from share internet
        	$ip = $_SERVER['HTTP_CLIENT_IP'];
   		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        	//ip pass from proxy
        	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}else{
        	$ip = $_SERVER['REMOTE_ADDR'];
    	}
    	return $ip;
	}

	// This data is coming from HTML form values in $_POST
	$insertName = $_POST["name"];
	$insertEmail = $_POST["email"];
	$location = $_POST["location"];
	$insertMovie = $_POST["favmovie"];
	$insertCharacter = $_POST["favchar"];
	$insertSong = $_POST["favsong"];
	$insertVillain = $_POST["mean"];
	$ip = getUserIpAddr();

	$subject = "Shrek Survey Submission";
	$message = "";
	$message .= "Here are the results from your Shrek Survey!";
	$message .= "\n\n";
	$message .= "Name: ";
	$message .= $insertName;
	$message .= "\n";
	$message .= "Email: ";
	$message .= $insertEmail;
	$message .= "\n";
	$message .= "Location: ";
	$message .= $location;
	$message .= "\n";
	$message .= "Favorite Shrek Movie: ";
	$message .= $insertMovie;
	$message .= "\n";
	$message .= "Favorite Shrek Character: ";
	$message .= $insertCharacter;
	$message .= "\n";
	$message .= "Favorite Song from the Shrek Soundtrack: ";
	$message .= $insertSong;
	$messsage .= "\n";
	$message .= "Scariest Shrek Villain: ";
	$message .= $insertVillain;
	$message .= "\n\n";
	$message .= "Thank you for filling out our Shrek survey!";

	// You really should escape all strings
	$insertName = mysqli_real_escape_string($connection, $insertName);
	$insertEmail = mysqli_real_escape_string($connection, $insertEmail);
	$location = mysqli_real_escape_string($connection, $location);
	$insertMovie = mysqli_real_escape_string($connection, $insertMovie);
	$insertCharacter = mysqli_real_escape_string($connection, $insertCharacter);
	$insertSong = mysqli_real_escape_string($connection, $insertSong);
	$insertVillain = mysqli_real_escape_string($connection, $insertVillain);
	$ip = mysqli_real_escape_string($connection, $ip);
	mail($insertEmail, $subject, $message, "From: jdenn11@u.rochester.edu");

	
	// 2. Perform database query
	$query  = "INSERT INTO survey (name, email, location, question1, question2, question3, question4, ip_address) VALUES ('$insertName','$insertEmail','$location','$insertMovie','$insertCharacter','$insertSong','$insertVillain', '$ip')";
	$result = mysqli_query($connection, $query);

	
	
?>

<!DOCTYPE HTML>
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
	//mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>