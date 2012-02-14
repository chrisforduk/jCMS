<?php

require_once '../functions.php';

$date = time();

// Check if the title is entered
if ($_POST['dbname']) {
	$dbname = mysql_real_escape_string($_POST['dbname']);
} else {
	echo '<p>The dbname field is empty.</p>';
}

// Check if the body is entered
if ($_POST['dbuser']) {
	$dbuser = mysql_real_escape_string($_POST['dbuser']);
} else {
	echo '<p>The dbuser field is empty.</p>';
}

// Check if the body is entered
if ($_POST['dbpass']) {
	$dbpass = mysql_real_escape_string($_POST['dbpass']);
} else {
	echo '<p>The dbpass field is empty.</p>';
}

// Check if the body is entered
if ($_POST['dbhost']) {
	$dbhost = mysql_real_escape_string($_POST['dbhost']);
} else {
	echo '<p>The dbhost field is empty.</p>';
}

if ($dbname && $dbuser && $dbpass && $dbhost) {

	define('DB_NAME', $dbname);
	define('DB_USER', $dbuser);
	define('DB_PASS', $dbpass);
	define('DB_HOST', $dbhost);

//read the entire string
$str=implode(file('../config.php'));

$fp=fopen('../config.php','w');
//replace something in the file string - this is a VERY simple example
$str=str_replace('database_name_here',$dbname,$str);
$str=str_replace('username_here',$dbuser,$str);
$str=str_replace('password_here',$dbpass,$str);
$str=str_replace('localhost',$dbhost,$str);

//now, TOTALLY rewrite the file
fwrite($fp,$str,strlen($str));

connect();
	
mysql_query("
		CREATE TABLE pages (
		id INT(11) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
 		title VARCHAR(150), 
 		body text,
 		date VARCHAR(10))
 	")
or die(mysql_error());  

// Insert SAMPLE page
mysql_query("
 		INSERT INTO pages VALUES (1, 'Sample Page', 'This is a sample page', '$date');
 	")
or die(mysql_error());  

// Create POSTS table
mysql_query("
		CREATE TABLE posts (
		id INT(11) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
 		title VARCHAR(150), 
 		body text,
 		date VARCHAR(10))
 	")
or die(mysql_error());  

// Insert SAMPLE post
mysql_query("
 		INSERT INTO posts VALUES (1, 'Sample Post', 'This is a sample post', '$date');
 	")
or die(mysql_error()); 

// Create SETTINGS table
mysql_query("
		CREATE TABLE settings (
 		name VARCHAR(20), 
 		value VARCHAR(20))
 	")
or die(mysql_error());  

// Insert SETTINGS
mysql_query("
 		INSERT INTO settings VALUES ('home_id', '1');
 	")
or die(mysql_error()); 

// Insert SETTINGS
mysql_query("
		CREATE TABLE users (
		id INT(11) NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(id),
 		username VARCHAR(40), 
 		password VARCHAR(40));
 	")
or die(mysql_error()); 
	
	// REDIRECT TO NEXT STEP
	header('location: setupuser.php');
	
} else {
	echo '<p><a href="#" onClick="history.go(-1)">Back</a></p>';
}

?>