<?php 
	if(!isset($_COOKIE["user"])){
		header( 'Location: /login.php' );
	}
	$strPage = 'admin';
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');

	if(isset($_GET['id'])){
		$objProject = new Project($_GET['id']);
	}else{
		$objProject = new Project();	
	}
	
?>
			
			<h1 id="intro"><?php echo SITE_NAME; ?></h1>
			
			<?php 
				$objProject->form();
				$objProject->display();

			?>




			

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>
