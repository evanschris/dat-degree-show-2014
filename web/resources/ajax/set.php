<?php 

	if(!isset($_COOKIE["user"])){
		header( 'Location: /login.php' );
	}
	$strPage = 'admin';
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');

	$db = new db();

?>
	
	<h1 id="intro">Templates</h1>


			<?php

				//echo '<pre>' . print_r($_POST,1) . '</pre>';

				//echo '<pre>' . print_r($_FILES,1) . '</pre>';
			
					$arrRes = $db->setTable($_POST, $_FILES);

					echo $arrRes['message'];


			?>
		

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>