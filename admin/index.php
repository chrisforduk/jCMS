<?php
// Simple CMS admin

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
		
			<?php jcms_manage_pages(); ?>

		</div>

</div>

</body>
</html>
