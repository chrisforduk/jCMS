<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>jCMS Installation</title>
		<link rel="stylesheet" type="text/css" href="../admin/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../admin/css/setup.css" />
	<head>
	<body>
	
	<div id="container">
	
	<div class="content" id="title">
		<h1><img src="../admin/images/jcmslogo.png" alt="jCMS"></a></h1>
	</div>
	
		<p>Alright! You're all setup!</p>
		<p>&nbsp;</p>
		<?php require_once '../functions.php';?>
		<?php echo "<p>Your site URL is: <a href='". BASE_URL . "'>". BASE_URL ."</a>";?>
		<p>&nbsp;</p>
		<?php echo "<p>Your site admin URL is: <a href='". BASE_URL . "/admin'>". BASE_URL ."/admin</a>";?>
		<p>&nbsp;</p>
		<p>Remember to delete your 'install' directory.</p>
	
	</div>
			
</body>
</html>
