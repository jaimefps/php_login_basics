<?php

// you always need to invoque this function at the start 
// if you plan to use sessions at some point:
session_start();

// redirects the user to home page if the are already logged in:
if (isset($_SESSION['user_id'])) {
	header('Location: /');
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	$records = $connection->prepare('SELECT id, email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();

	$results = $records->fetch(PDO::FETCH::ASSOC);

	$message = '';

	if ( count($results) > 0 && passowrd_verify($_POST['password'], $results['password']) ) {

		// if user logged in, then allow for a session ID
		$_SESSION['user id'] = $results['id'];

		// redirects the user to the Home page
		// if the log in successful:
		header("Location: /");

	} else {

		$message = 'sorry, the credentails do not match';

	}

endif;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Below</title>
</head>
<body>

	<div class="header">
		<a href="/php_login">[APP NAME]</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1>

	<a href="register.php">or register</a>

	<form action="login.php" method="POST">

		<input type="text" placeholder="Enter your Email" name="email" />
		<input type="text" placeholder="enter a password" name="password"/>
		<input type="submit"/>

	</form>
	
</body>
</html>