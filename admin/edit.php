<?php
// Simple CMS edit page

require_once '../functions.php';

// Check if user is logged in
checkMember();

connect();

$id = $_GET['id'];

$result = mysql_query("SELECT title, body FROM pages WHERE id='$id'");
$row = mysql_fetch_array($result);

$title= $row['title'];
$body = $row['body'];

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
	
		<h2>Edit Page</h2>
		
		<?php if (in_array($_GET['id'], $IDs)): ?>
			<form action="update.php?id=<?php echo $id; ?>" method="post">
				<p>
					<label for="title">Title:</label>
					<div class="input"><input name="title" id="title" type="text" maxlength="150" value="<?php echo $title; ?>" /></div>
				</p>
				
				<p>
					<label for="body">Body Text:</label>
					<div class="input"><textarea name="body" id="body"><?php echo $body; ?></textarea></div>
				</p>
				
				<p>
					<label for="date">Change the date?</label>
					<div class="input"><input type="checkbox" name="date" value="1" /></div>
				</p>
				
				<p>
					<input type="submit" value="Update" />
				</p>
			</form>
		<?php else: ?>
			<p>Page not found</p>
		<?php endif; ?>
		
</div>
		
	</body>
</html>

