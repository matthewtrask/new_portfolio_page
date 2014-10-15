<?php 

ob_start();
session_start();

//database credentials
define('DBHOST', 'localhost');
define('DBUSER','root');
define('DBPASS','root');
define('DBNAME','matt_site');

$db = new PDO("mysql:host=".DBHOST.";post=8889;dbname=".DBNAME, DBUSER, DBPASS)
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Set Timezone
date_default_timezone_set('America/New_York');

//Load classes as needed

function __autoload($class){

	$class = strtolower($class);

	$classpath = 'classes/cass.'.$class . '.php';
	if (file_exists($classpath)) {
		require_once $classpath;
	}

	$classpath = '../classes/cass.'.$class . '.php';
	if (file_exists($classpath)) {
		require_once $classpath;
	}
}

$user = new User($db);