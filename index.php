<?php
// Simple CMS main index.php file

require_once 'functions.php';

connect();

$IDs = getArray();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php jcms_site_title(); ?></title>
		<link rel="stylesheet" type="text/css" href="admin/css/default.css" />
	<head>
	<body>
	
<div id="wrapper">

	<div id="header">
	<h1><?php jcms_site_title(); ?></h1>
	
	<?php jcms_list_pages(); ?>
	
	</div>
	
	<div id="content">
		
		<?php if (in_array($_GET['id'], $IDs) || !$_GET): ?>
		
			<h2><?php jcms_the_title(); ?></h2>
			
			<p><?php jcms_the_content(); ?></p>
			
		<?php else: ?>
		
			<!-- Show a not found error -->
			<p>Not found</p>
		
		<?php endif; ?>
			
	</body>
</html>
