<?php
	// Required classes for the Delete Post demo
	require_once "engine/blog.php";
	
	// Settings
	include "settings/globalvars.php";
	
	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);

	// Delete Post Variables
	$id = $_GET['id'];
	
	$blog->deletePost($id);
	
	// Redirect to Index
	header('Location:index.php');
?>