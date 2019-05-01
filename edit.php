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

// check if the form (from renderform.php) has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit'])) {
	// confirm that the 'id' value is a valid integer before getting the form data
	if (is_numeric($_POST['id'])) {
		// get form data, making sure it is valid
		$id = $_POST['id'];
		$name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
		$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
		$location = mysqli_real_escape_string($connection, htmlspecialchars($_POST['location']));
		$question1 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question1']));
		$question2 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question2']));
		$question3 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question3']));
		$question4 = mysqli_real_escape_string($connection, htmlspecialchars($_POST['question4']));
		$ip = mysqli_real_escape_string($connection, getUserIPAddr());

		// check that firstname/lastname fields are both filled in
		if ($name == '' || $email == '' || $question1 == '' || $question2 == '' || $question3 == '' || $question4 == '') {
			// generate error message
			$error = 'ERROR: Please fill in all required fields!';

			//error, display form
			renderForm($id, $name, $email, $location, $question1, $question2, $question3, $question4, $error);

		} else {
			// save the data to the database
			$result = mysqli_query($connection, "UPDATE survey SET name='$name', email='$email', location='$location', question1='$question1', question2='$question2', question3='$question3', question4='$question4', ip_address='$ip' WHERE id='$id'");

			// once saved, redirect back to the homepage page to view the results
			header("Location: admin-area.php");
		}
	} else {
		// if the 'id' isn't valid, display an error
		echo 'Error!';
	}
} else {
	// if the form (from renderform.php) hasn't been submitted yet, get the data from the db and display the form
	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
		// query db
		$id = $_GET['id'];
		$result = mysqli_query($connection, "SELECT * FROM survey WHERE id=$id");
		$row = mysqli_fetch_array( $result );

		// check that the 'id' matches up with a row in the databse
		if($row) {
			// get data from db
			$name = $row['name'];
			$email = $row['email'];
			$location = $row['location'];
			$question1 = $row['question1'];
			$question2 = $row['question2'];
			$question3 = $row['question3'];
			$question4 = $row['question4'];
			$ip = $row['ip_address'];

			// show form
			renderForm($id, $name, $email, $location, $question1, $question2, $question3, $question4, $ip_address, '');
		} else {
			// if no match, display result
			echo "No results!";
		}
	} else {
		// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
		echo 'Error!';
	}
}
?>