<?php

session_start();

// redirects the user to home page if they are already logged in:
if (isset($_SESSION['user_id'])) {
	header('Location: /');
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	// Enter the user into the DB:
	$sql= "INSERT INTO users (email, password) VALUES (:email, :password)";
	$statement = $connection->prepare($sql);

	$statement->bindParam(':email', $_POST['email']);
	$statement->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	if ( $statement->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry, some issue came up while creating your account';
	endif;

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Below</title>
</head>
<body>

	<div class="header">
		<a href="/php_login">[APP NAME]</a>
	</div>


<!-- Example of inserting PHP script inside of HTML code -->
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Register</h1>
	<a href="login.php">or login</a>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Enter your Email" name="email" />
		<input type="text" placeholder="Enter a password" name="password"/>
		<input type="text" placeholder="Confirm password" name="confirm_password"/>
		<input type="submit"/>

	</form>

	
</body>
</html>