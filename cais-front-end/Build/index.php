<?php 
	$strPage = 'home';
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');
?>
			
			<h1 id="intro"><?php echo SITE_NAME; ?></h1>
			<p>
				<?php 

					if($loggedin == true){
						echo 'Welcome '.$objActiveUser->name;
					}else{	
						echo 'Not Logged In.';
					}

				?>
			</p>

			

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>
