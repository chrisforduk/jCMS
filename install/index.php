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
	
	
		<form action="setupdb.php" method="post">
		
		
		<fieldset class="two-col">
            <p class="left">
                <label for="dbname">Database Name:</label>
                <input type="text" name="dbname" id="dbname" value="">
            </p>
            <p class="right">
                <label for="dbhost">Database Host:</label>
                <input type="text" name="dbhost" id="dbhost" value="">
            </p>
        </fieldset>
        
		<fieldset class="two-col">
            <p class="left">
                <label for="dbuser">Database Username:</label>
                <input type="text" name="dbuser" id="dbuser" value="">
            </p>
            <p class="right">
                <label for="dbpass">Database Password:</label>
                <input type="password" name="dbpass" id="dbpass" value="">
            </p>
        </fieldset>
			
		<p class="buttons">
            <button type="submit" class="low-button next-step">Next Step</button>
        </p>
        
		</form>
	
	</div>
			
</body>
</html>
