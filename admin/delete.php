<?php
// Delete records

require_once '../functions.php';

connect();

// Check if user is logged in
checkMember();

$IDs = getArray();

if (in_array($_GET['id'], $IDs)) {
	// Get page id
	$id = $_GET['id'];
	
	mysql_query("DELETE FROM pages WHERE id='$id'");
	header('location:index.php');
} else {
	echo '<p>Page not found</p>';
}

?>
