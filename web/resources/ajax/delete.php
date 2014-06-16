<?php 

	if(!isset($_COOKIE["user"])){
		header( 'Location: /login.php' );
	}

	include('../../resources/inc/init.php');

	if($_GET){

		$objProject = new Project($_GET['id']);
		echo $objProject->delete();

	}

?>