<?php
// Simple CMS main index.php file

require_once '../functions.php';

$conn = connect();
$date = time();

// Create PAGES table
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
 		INSERT INTO settings VALUES ('site_title', 'jCMS demo');
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

// Insert SETTINGS
mysql_query("
 		INSERT INTO users VALUES (1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');
 	")
or die(mysql_error()); 

echo "Database installation complete - please delete the install directory";
echo "<a href='". BASE_URL . "'>Visit my site</a>";

?>