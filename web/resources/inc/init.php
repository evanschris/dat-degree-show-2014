<?php 

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if (strpos($url,'local') || strpos($url,'192')) {

	define("DBHOST", "localhost");
	define("DBNAME", "dat2014");
	define("DBUSER", "root");
	define("DBPASS", "");
	define("SITE_NAME", "DAT '14 Graduate Showcase LOCAL");

}else{

	define("DBHOST", "localhost");
	define("DBNAME", "");
	define("DBUSER", "");
	define("DBPASS", "");
	define("SITE_NAME", "DAT '14 Graduate Showcase");
	
}

	foreach (glob($_SERVER['DOCUMENT_ROOT'].'/resources/inc/classes/*.php') as $filename){
		include $filename;
	}

	//db::Connect();

	session_start();

	if(isset($_COOKIE["user"])){
		if(strlen($_COOKIE["user"]) > 0){
			$activeUserID = $_COOKIE["user"];

			$loggedin = true;
			$objActiveUser = new User($activeUserID);
		}
	}else{
		$loggedin = false;
	}

	
?>