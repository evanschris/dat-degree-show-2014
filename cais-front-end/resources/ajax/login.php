<?php 
	include('../../resources/inc/init.php');

	echo json_encode(User::login($_POST));
?>