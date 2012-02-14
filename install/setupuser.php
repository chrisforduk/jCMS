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
	
	
		<form action="setupusergo.php" method="post">
		
		
		<fieldset class="two-col">
            <p class="left">
                <label for="title">Site Title:</label>
                <input type="text" name="title" id="thetitle" value="">
            </p>
            <p class="right">
                <label for="url">Your URL:</label>
                <input type="text" name="url" id="url" value="<?php echo getcwd();?>">
            </p>
        </fieldset>
        
		<fieldset class="two-col">
            <p class="left">
                <label for="username">Admin Username:</label>
                <input type="text" name="username" id="username" value="">
            </p>
            <p class="right">
                <label for="password">Admin Password:</label>
                <input type="password" name="password" id="password" value="">
            </p>
        </fieldset>
			
		<p class="buttons">
            <button type="submit" class="low-button next-step">Next Step</button>
        </p>
        
		</form>
	
	</div>
			
</body>
</html>
