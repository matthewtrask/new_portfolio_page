<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

$hashedpassword = $user->create_hash($password);

try {

	//insert into database
	$stmt = $db->prepare('INSERT INTO blog_members (username,password,email) VALUES (:username, :password, :email)') ;
	$stmt->execute(array(
		':username' => $username,
		':password' => $hashedpassword,
		':email' => $email
	));

	//redirect to index page
	header('Location: users.php?action=added');
	exit;

} catch(PDOException $e) {
    echo $e->getMessage();
}

?>
<form action='' method='post'>

	<p><label>Username</label><br />
	<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

	<p><label>Password</label><br />
	<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

	<p><label>Confirm Password</label><br />
	<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

	<p><label>Email</label><br />
	<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
	
	<p><input type='submit' name='submit' value='Add User'></p>

</form>