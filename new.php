<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include('renderform.php');

// connect to the database
include('connect-db.php');

// check if the form has been submitted. If it has, start to process the form and save it to the database
if (isset($_POST['submit'])) {
	// get form data, making sure it is valid
	$name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
	$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
	$location = mysqli_real_escape_string($connection, htmlspecialchars($_POST['location']));
	$question1 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question1']));
	$question2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question2']));
	$question3 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question3']));
	$question4 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question4']));

	// check to make sure both fields are entered
	if ($name == '' || $email == '' || $location == '' || $question1 == '' || $question2 == '' || $question3 == ''|| $question4 == '') {
		// generate error message
		$error = 'ERROR: Please fill in all required fields!';

		// if either field is blank, display the form again
		renderForm($id, $name, $email, $location, $question1, $question2, $question3, $question4, $error);

	} else {
		// save the data to the database
		$result = mysqli_query($connection, "INSERT INTO survey (name, email, location, question1, question2, question3, question4) VALUES ('$name', '$email', '$location', '$question1', '$question2', '$question3', '$question4')");

		// once saved, redirect back to the view page
		header("Location: admin-area.php");
	}
} else {
	// if the form hasn't been submitted, display the form
	renderForm('','','','','','','','','');
}
?>