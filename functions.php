<?php
// Simple CMS main functions file

require_once 'config.php';

// Connect to MySQL database
function connect() {
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect. ' . mysql_error());
	mysql_select_db(DB_NAME) or die('Could not select database. ' . mysql_error());
}

function setup() {

}

// Display title
function jcms_site_title() {
	$result = mysql_query("SELECT value FROM settings WHERE name='site_title'");
	$row = mysql_fetch_array($result);
	echo $row['value'];
}


// Display page title
function jcms_the_title() {
	if ($_GET['id']) {
		$pageID = (int) $_GET['id'];
		$result = mysql_query("SELECT title FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
	
		echo $row['title'];
	} else {
		$result = mysql_query("SELECT value FROM settings WHERE name='home_id'");
		$row = mysql_fetch_array($result);
		
		$pageID = $row['value'];
		
		$result = mysql_query("SELECT title FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
		
		echo $row['title'];
	}
}

// Display page body
function jcms_the_content() {
	if ($_GET['id']) {
		$pageID = (int) $_GET['id'];

		$result = mysql_query("SELECT body FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
		
		echo $row['body'];
	} else {
		$result = mysql_query("SELECT value FROM settings WHERE name='home_id'");
		$row = mysql_fetch_array($result);
		
		$pageID = $row['value'];
		
		$result = mysql_query("SELECT body FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
		
		echo $row['body'];
	}
}

// Display page date
function pageDate() {
	if ($_GET['id']) {
		$pageID = (int) $_GET['id'];

		$result = mysql_query("SELECT date FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
		
		// Convert Unix time to date
		$date = date('M d, Y', $row['date']);
		
		echo $date;
	} else {
		$result = mysql_query("SELECT value FROM settings WHERE name='home_id'");
		$row = mysql_fetch_array($result);
		
		$pageID = $row['value'];
		
		$result = mysql_query("SELECT date FROM pages WHERE id='$pageID'");
		$row = mysql_fetch_array($result);
		
		// Convert Unix time to date
		$date = date('M d, Y', $row['date']);
		
		echo $date;
	}
}

// List the pages
function jcms_list_pages() {
	// List the home page first
	$result = mysql_query("SELECT value FROM settings WHERE name='home_id'");
	$row = mysql_fetch_array($result);
	
	$homeID = $row['value'];
	
	$result = mysql_query("SELECT title FROM pages WHERE id='$homeID'");
	$row = mysql_fetch_array($result);
	
	$homeTitle = $row['title'];
	
	echo "<ul><li><a href='" . BASE_URL . "/index.php'>$homeTitle</a></li>";
	
	// List the rest of the pages
	$result = mysql_query("SELECT id, title FROM pages");
	
	while ($row = mysql_fetch_array($result)) {
		// Do not list the home page twice
		if ($row['id'] != $homeID) {
			$pageID = $row['id'];
			$pageTitle = $row['title'];
			
			echo "<li><a href='" . BASE_URL . "/index.php?id=$pageID'>$pageTitle</a></li>";
		}
	}
	
	echo "<li><a href='" . BASE_URL . "/admin/index.php'>Admin</a></li></ul>";
}

// Display admin table
function jcms_manage_pages() {
	// Find the home page ID
	$result = mysql_query("SELECT value FROM settings WHERE name='home_id'");
	$row = mysql_fetch_array($result);
	
	$homeID = $row['value'];
	
	// Display a table
	$result = mysql_query("SELECT id, title, date FROM pages");
	
	echo '<h2>Manage Pages</h2>';
	echo '<table>';
	echo '<tr>
		<th width="5%">ID</th>
		<th width="65%">Title</th>
		<th width="15%">Date</th>
		<th width="15%">Actions</th>
		</tr>';

	while ($row = mysql_fetch_array($result)) {
		$id = $row['id'];
		$title = $row['title'];
		$date = date('d M Y', $row['date']);
		
		echo "<tr>
			<td>$id</td>
			<td><a href='". BASE_URL . "/admin/edit.php?id=$id'>$title</a>";
		if ($id == $homeID) {
			echo ' <strong>(Home)</strong>';
		}
		echo "</td>
			<td>$date</td>
			<td> 
			<a href='sethome.php?id=$id'><img src='http://cdn1.iconfinder.com/data/icons/silk2/house.png'></a>
			<a href='". BASE_URL . "/index.php?id=$id'><img src='http://cdn1.iconfinder.com/data/icons/silk2/page_white_link.png'></a>
			<a href='edit.php?id=$id'><img src='http://cdn1.iconfinder.com/data/icons/silk2/page_white_edit.png'></a>
			<a href='confirm.php?id=$id'><img src='http://cdn1.iconfinder.com/data/icons/silk2/page_white_delete.png'></a>";
	}
	echo '</table>';
	echo '<a class="submit" href="'. BASE_URL . '/admin/new.php">New Page</a>';
}

// Get array with page IDs
function getArray() {
	$result = mysql_query("SELECT id FROM pages");
	
	$IDs = array();
	$i = 0;
	while ($row = mysql_fetch_array($result)) {
		$IDs[$i] = $row['id'];
		$i++;
	}
	return $IDs;
}

// Admin user login functions

// Check username and password
function verifyUser($name, $pass) {
	// Escape strings
	$username = mysql_real_escape_string($name);
	$password = mysql_real_escape_string($pass);

	$result = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");

	if (mysql_fetch_array($result)) {
		return true;
	} else {
		return false;
	}
}

// Validate user
function validateUser($name, $pass) {
	$check = verifyUser($name, md5($pass));
	
	if ($check) {
		$_SESSION['status'] = 'authorized';
		
		header('location: index.php');
	} else {
		return 'Please enter a correct username and password';
	}
}

function logout() {
	if (isset($_SESSION['status'])) {
		unset($_SESSION['status']);

		// Remove the cookie
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 1000);
			session_destroy();
		}
	}
}

function checkMember() {
	session_start();

	if($_SESSION['status'] != 'authorized') {
		header('location: login.php');
	}
}

function jcms_admin_header() {

	echo "<div id='header'>";
	echo "<h1>jCMS</h1>";
	
	if($_SESSION['status'] == 'authorized') {
		echo "<a href='". BASE_URL . "/admin'>Manage Pages</a>";
		echo "<a class='preview' href='". BASE_URL . "'>View Site</a>";
		echo "<a class='logout' href='". BASE_URL . "/admin/login.php?status=logout'>Log Out</a>";		
	} else {
		echo "<a href='". BASE_URL . "'>Back to site</a>";
		echo "<a class='logout' href='". BASE_URL . "/admin/login.php'>Login</a>";
	}

	echo "</div>";

}

?>