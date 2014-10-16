<?php

//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

private $db;

public function __construct($db) {
	$this->db = $db;
}

public function is_logged_in(){
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		return true;
	}
}

public function create_hash($value) {
	return $hash = crypt($value, '$2a$12$'.substr(str_replace('+', '.', base64_encode(sha1(microtime(true), true))), 0, 22));
}

private function verify_hush($password, $hash){
	return $hash == crypt($password, $hash);
}

private function get_user_hash($username){
	try {
		$stmt = $this->db->prepare('SELECT password FROM blog_members WHERE username = :username');
		$stmt->execute(array('username' => $username));
		$row = $stmt->fetch();
		return $row['password'];
	}
	catch(PDOException $e) {
		echo '<p class="error">'.$e->getMessage().'</p>';
	}
}
?>