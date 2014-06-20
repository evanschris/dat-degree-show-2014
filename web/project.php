<?php 
	$strPage = 'project';
	


	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');
	
	if(isset($_GET['project'])){
		$projTitle = $_GET['project'];
		$objProject = new Project(null, $projTitle);
		if($objProject->activeProject != false){
?>

</div>

<div class="vimeo-container">
	<div id="overlay" style="background: url(/img/<?php echo strtolower(str_replace(' ','-',$objProject->title)); ?>-cover.jpg) no-repeat center center;">
		<img id="play-button" src="/resources/img/delete.png" />
	</div>
	<iframe id="video" src="//player.vimeo.com/video/<?php echo $objProject->video; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=b62f21;api=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<div class="container">
<main class="profile-main clearfix" role="main">	
	<img id="author-img" src="/img/<?php echo str_replace(' ','-',$objProject->author); ?>.jpg">
	<section>
	<h1><?php echo $objProject->title; ?></h1>
	<h2><?php echo $objProject->author; ?></h2>	
	<a class="profile-twitter" href="https://twitter.com/<?php echo $objProject->twitter; ?>" title="<?php echo str_replace('@','',$objProject->twitter); ?>"><?php echo $objProject->twitter; ?></a>
	<a class="profile-website" href="<?php echo $objProject->website; ?>" title="<?php echo $objProject->website; ?>"><?php echo str_replace('/','',str_replace('http:','',str_replace('https:','',$objProject->website))); ?></a>
</section>
<p>
	<?php echo str_replace('<br />','</p><p>',str_replace('<br>','</p><p>',nl2br($objProject->description))); ?>
</p>
</main>


<?php 
		}else{
			include($_SERVER['DOCUMENT_ROOT'].'/404.html');
		}
	}
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>
