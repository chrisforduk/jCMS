<?php
// Set home page

require_once '../functions.php';

connect();

// Check if user is logged in
checkMember();

$IDs = getArray();

if (in_array($_GET['id'], $IDs)) {
	// Get the page ID
	$id = $_GET['id'];

	// Update the table
	mysql_query("UPDATE settings SET value='$id' WHERE name='home_id'");
	header('location:index.php');
} else {
	echo "Page not found";
}

?>
