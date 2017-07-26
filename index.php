<?php

session_start();

require 'database.php';

if ( isset($_SESSION['user_id']) ) {
	$records = $connection->prepare('SELECT id, email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if ( count($results) > 0 ) {
		$user = $results;
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>PHP Login Tutorial</title>
</head>
<body>

	<div class="header">
		<a href="/php_login">[APP NAME]</a>
	</div>

	<?php if( !empty($user) ): ?>
		<br /> Welcome. Successfully logged in!
		<a href="logout.php">Logout?</a>
	<?php else: ?>
		<h1> Please Login or Register</h1>
		<a href="login.php">Login</a> or
		<a href="register.php"> Register</a>
	<?php endif; ?>


</body>
</html>