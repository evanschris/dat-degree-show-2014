<?php 
	$strPage = 'projects';
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');
	$objProject = new Project();
?>
		
	<main class="project-main clearfix" role="main">
		<?php
			$objProject->display();
		?>
	</main>
			

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>
