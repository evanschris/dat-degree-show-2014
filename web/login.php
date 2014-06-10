<?php 
	$strPage = 'login';
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/header.php');
?>

	<h1 id="intro">Login</h1>


	<form id="login" action="/resources/ajax/login.php" method="POST">

		<label for="username">Username: </label>
			<input type="text" name="username"><br />
		
		<label for="password">Passphrase: </label>
			<input type="password" name="password"><br />
		
			<input type="submit" class="submit" value="Log in">

	</form>

	<div id="login_results">
	</div>

<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/resources/inc/footer.php');
?>
