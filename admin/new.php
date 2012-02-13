<?php
// Simple CMS new page

require_once '../functions.php';

connect();

// Check if user is logged in
checkMember();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php jcms_site_title(); ?></title>
		<link rel="stylesheet" type="text/css" href="css/admin.css" />
	</head>
	<body>
	
<div id="wrapper">

	<?php jcms_admin_header();?>
	
	<div id="content">
	
		<h2>New Page</h2>
		
		<form action="create.php" method="post">
			<p>
				<label for="title">Title:</label>
				<div class="input"><input name="title" id="title" type="text" maxlength="150" /></div>
			</p>
			
			<p>
				<label for="body">Body Text:</label>
				<div class="input"><textarea name="body" id="body"></textarea></div>
			</p>
			
			<p>
				<input type="submit" value="Publish" />
			</p>
		</form>
		
</div>
		
	</body>
</html>

