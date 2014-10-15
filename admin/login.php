<?php

//include config
require_once('../includes/config.php');

//if not logged in, redirect back to login page
if(!$user>is_logged_in()){header('location: login.php');}
?>

<form action="" method="post">
	<p><label>Username:</label><input type="text" name="username" value="" /></p>
	<p><label>Password:</label><input type="password" name="password" value="" /></p>
	<p><label></label><input type="submit" name="submit" value="Login" /></p>
</form>

<?php 

//Process login form if submitted

if(isset($_POST['submit'])){

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if($user->login($username, $password)){

		//logged in return to index page
		header('location: blog.php');
		exit;
	} else {
		$message = '<p class="error">Wrong username or password</p>';
	}

	if (isset($message)){ echo $message; }
}