<?php
// Insert new page into DB
require_once '../functions.php';
connect();
// Check if user is logged in
checkMember();
?>
<?php
// Check if the title is entered
if ($_POST['title']) {
	$title = mysql_real_escape_string($_POST['title']);
} else {
	echo '<p>The title field is empty.</p>';
}

// Check if the body is entered
if ($_POST['body']) {
	$body = mysql_real_escape_string($_POST['body']);
} else {
	echo '<p>The body field is empty.</p>';
}

// Get Unix time
$date = time();

// If the title and body are both entered, insert into the database
if ($title && $body) {
	
	mysql_query("INSERT INTO pages (title, body, date) VALUES ('$title', '$body', '$date')");
	header('location:index.php');
} else {
	echo '<p><a href="new.php">Back</a></p>';
}

?>