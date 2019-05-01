<!DOCTYPE html>
<html>
<head>
	<title>Survey | Seoul | Assignment 7</title>
</head>
<body>
	<form method="post" action="insert.php">
		<label for="name">Name: </label>
		<input type="text" name="name" id="name" placeholder="Enter your name...">

		<label for="email">Email: </label>
		<input type="email" name="email" id="email" placeholder="Enter your email...">

		<label for="location">Location: </label>
		<input type="text" name="location" id="location" placeholder="Enter the city you're from...">

		<label for="favmovie">Which is your favorite Shrek movie? </label>
		<input type="text" name="favmovie" id="favmovie" placeholder="Type here...">

		<label for="favchar">Who is your favorite Shrek character? </label>
		<input type="text" name="favchar" id="favchar" placeholder="Type here...">

		<label for="favsong">Which song from the Shrek movies is your favorite? </label>
		<input type="text" name="favsong" id="favsong" placeholder="Type here...">

		<label for="mean">Who is the meanest Shrek villain? </label>
		<input type="text" name="mean" id="mean" placeholder="Type here...">

		<input type="submit" value="Submit">
	</form>
</body>
</html>