<?php 
	$strPage = 'home';
	if(isset($_GET['noinc'])){
		include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/init.php');
	}else{
		include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');
	}
?>
			
			<h1 id="intro"><?php echo SITE_NAME; ?></h1>
			

<?php 
	if(!isset($_GET['noinc'])){
		include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
	}
?>
