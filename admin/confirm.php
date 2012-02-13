<?php
// Confirm deletion

require_once '../config.php';
require_once '../functions.php';

connect();

// Check if user is logged in
checkMember();

$IDs = getArray();

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
	
		<h2>Confirm Delete</h2>
		
		<?php if (in_array($_GET['id'], $IDs)): ?>
		
			<?php
			// Get the page ID
			$id = $_GET['id'];
			
			// Get the page title
			$result = mysql_query("SELECT title FROM pages WHERE id='$id'");
			$row = mysql_fetch_array($result);
			
			$title = $row['title'];

			?>
			
			<p>Are you sure you would like to delete the page <em><?php echo $title; ?></em>?</p>
			<br/>
			<ul>
				<li><a href="delete.php?id=<?php echo $_GET['id']; ?>">Yes</a><li>
				<li><a href="index.php">No</a></li>
			</ul>
			
		<?php else: ?>
			
			<p>Page not found</p>
			
		<?php endif; ?>
	
</div>
	
	</body>
</html>
