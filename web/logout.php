<?php 
	$strPage = 'logout';
	setcookie("user", "", time()-3600, "/");
   	header( 'Location: /' );

?>