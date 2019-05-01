<?php session_start(); ?>
<?php
// creates the edit record form
function renderForm($id, $name, $email, $location, $question1, $question2, $question3, $question4, $error) {
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Record | Seoul | Assignment 7</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '') {
	echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>
<div class="container">
	<h1>Add or Edit a Record</h1>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<strong>ID:</strong> <?php echo $id; ?>
		<div class="form-group">
			<label for="name">Name: *</label> <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>"/>
		</div>
		<div class="form-group">
			<label for="email">Email: *</label> <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>"/>
		</div>
		<div class="form-group">
			<label for="location">Location (city and state): *</label> <input type="text" name="location" id="location" class="form-control" value="<?php echo $location; ?>"/>
		</div>
		<div class="form-group">
			<label for="question1">Favorite Movie: *</label> <input type="text" name="question1" id="question1" class="form-control" value="<?php echo $question1; ?>"/>
		</div>
		<div class="form-group">
			<label for="question2">Favorite Character: *</label> <input type="text" name="question2" id="question2" class="form-control" value="<?php echo $question2; ?>"/>
		</div>
		<div class="form-group">
			<label for="question3">Favorite Song: *</label> <input type="text" name="question3" id="question3" class="form-control" value="<?php echo $question3; ?>"/>
		</div>
		<div class="form-group">
			<label for="question4">Scariest Villain: *</label> <input type="text" name="question4" id="question4" class="form-control" value="<?php echo $question4; ?>"/>
		</div>
		<div>* required</div>
		<input type="submit" name="submit" id="submit" class="btn btn-primary mb-2" value="Submit">
	</form>

	<div>
		<br>
		<a href=".">Cancel</a>
	</div>
</div>
</body>
</html>
<?php
}
?>