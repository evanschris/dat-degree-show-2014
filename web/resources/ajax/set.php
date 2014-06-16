<?php 

	if(!isset($_COOKIE["user"])){
		header( 'Location: /login.php' );
	}

	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');

	$db = new db();

?>
	
	<h1 id="intro">Templates</h1>


			<?php
			
					$arrRes = $db->setTable($_POST, $_FILES);

					echo $arrRes['message'];


			?>
		

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>