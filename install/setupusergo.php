<?php

require_once '../functions.php';

$date = time();

// Check if the title is entered
if ($_POST['title']) {
	$title = mysql_real_escape_string($_POST['title']);
} else {
	echo '<p>The title field is empty.</p>';
}

// Check if the body is entered
if ($_POST['username']) {
	$username = mysql_real_escape_string($_POST['username']);
} else {
	echo '<p>The username field is empty.</p>';
}

// Check if the body is entered
if ($_POST['password']) {
	$password = mysql_real_escape_string($_POST['password']);
	$securepassword = md5($password);
} else {
	echo '<p>The password field is empty.</p>';
}

// Check if the body is entered
if ($_POST['url']) {
	$url = mysql_real_escape_string($_POST['url']);
} else {
	echo '<p>The url field is empty.</p>';
}

// If the title and body are both entered, insert into the database
if ($title && $username && $password && $url) {

	define('BASE_URL', $url);

//read the entire string
$str=implode(file('../config.php'));

$fp=fopen('../config.php','w');
//replace something in the file string - this is a VERY simple example
$str=str_replace('your_url',$title,$str);

//now, TOTALLY rewrite the file
fwrite($fp,$str,strlen($str));

connect();

// Insert SETTINGS
mysql_query("
 		INSERT INTO settings VALUES ('site_title', '$title');
 	")
or die(mysql_error()); 

// Insert SETTINGS
mysql_query("
 		INSERT INTO users VALUES (1, '$username', '$securepassword');
 	")
or die(mysql_error()); 

	header('location:done.php');
	
} else {
	echo '<p><a href="#" onClick="history.go(-1)">Back</a></p>';
}

?>