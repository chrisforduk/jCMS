<?php
// Update database tables

require_once '../config.php';
require_once '../functions.php';

connect();

// Check if user is logged in
checkMember();

$IDs = getArray();

if (in_array($_GET['id'], $IDs)) {
	// Get the page id
	$id = $_GET['id'];

	// Check if the title is entered
	if ($_POST['title']) {
		$title = mysql_real_escape_string($_POST['title']);
	} else {
		echo '<p>The title is empty.</p>';
	}

	// Check if the body is entered
	if ($_POST['body']) {
		$body = mysql_real_escape_string($_POST['body']);
	} else {
		echo '<p>The body is empty.</p>';
	}

	// If the title and body are both entered, insert into the database
	if ($title && $body) {
		connect();
		
		// Check if they want to change the date
		if (isset($_POST['date'])) {
			// Get Unix time
			$date = mysql_real_escape_string(time());
			
			mysql_query("UPDATE pages SET title='$title', body='$body', date='$date' WHERE id='$id'");
			header('location:index.php');
		} else {
			mysql_query("UPDATE pages SET title='$title', body='$body' WHERE id='$id'");
			header('location:index.php');
		}
	} else {
		echo '<p><a href="edit.php">Back</a></p>';
	}
} else {
	echo '<p>Page not found</p>';
}

?>
