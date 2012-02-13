<?php
// Login page

require_once '../functions.php';

connect();

session_start();

// Log the user out
if ($_GET['status'] == 'logout') {
	logout();
}

// Log the user in
if ($_POST['username'] && $_POST['password']) {
	$result = validateUser($_POST['username'], $_POST['password']);
}

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
	
		<h2>Login</h2>
	
		<form method="post" action="">
			<p>
				<label for="name">Username: </label>
				<div class="input"><input type="text" name="username" /></div>
			</p>
			
			<p>
				<label for="password">Password: </label>
				<div class="input"><input type="password" name="password" /></div>
			</p>
			
			<p>
				<input type="submit" id="submit" value="Login" name="submit" />
			</p>
		</form>
		<?php if (isset($result)) echo $result; ?>

	</div>

</div>

	</body>
</html>
