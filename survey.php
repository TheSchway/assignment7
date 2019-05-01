<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>Assignment 07: Survey On Shrek</title>
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="css/navigation.css">
		<link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet">
</head>
<body>


	<div class="bannerContainer">

			<div class="banner1">
				<header>
					<a href="index.php">
						<h1> SHREK</h1>
					</a>

				</header>
			</div>


			<div class="banner2">

				<nav class="menu">

					<ul>
						<li><a href = "survey.php">Survey</a></li>
						<li><a href = "shrek3.php">Shrek The Third</a></li>
						<li><a href = "shrek2.php">Shrek 2</a></li>
						<li><a href = "shrek1.php">Shrek 1</a></li>
						<li><a href = "index.php">Home</a></li>
					
					</ul>
				</nav>
			</div>
		</div>

		<div class="container">

		<div>
			<header>
				<h1>Shrek Survey</h1>
				<h3>Help Us Collect Data</h3>
			</header>
		</div>

	
		<form method="post" action="insert.php">
			<label for="name">Name: </label>
			<br/>
			<input type="text" name="name" id="name" placeholder="Enter your name...">
			<br/>

			<label for="email">Email: </label>
			<br/>
			<input type="email" name="email" id="email" placeholder="Enter your email...">
			<br/>

			<label for="location">Location: </label>
			<br/>
			<input type="text" name="location" id="location" placeholder="Enter the city you're from...">
			<br/>

			<label for="favmovie">Which is your favorite Shrek movie? </label>
			<br/>
			<input type="text" name="favmovie" id="favmovie" placeholder="Type here...">
			<br/>

			<label for="favchar">Who is your favorite Shrek character? </label>
			<br/>
			<input type="text" name="favchar" id="favchar" placeholder="Type here...">
			<br/>

			<label for="favsong">Which song from the Shrek movies is your favorite? </label>
			<br/>
			<input type="text" name="favsong" id="favsong" placeholder="Type here...">

			<br/>

			<label for="mean">Who is the meanest Shrek villain? </label>
			<br/>
			<input type="text" name="mean" id="mean" placeholder="Type here...">
			<br/>

			<input type="submit" value="Submit">
		</form>



		</div>

		<footer class="foot2">
	CSC 174: Advanced Front-end Web Design and Development
	<a href = "login.php">Administrators Only: Click Here To Login To Your Account</a>

	</footer>

	<script src="//code.jquery.com/jquery.js"></script>
	<script src="js/menu-highlighter.js"></script>
	</body>
	</html>