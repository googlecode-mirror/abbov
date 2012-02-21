<?php

	// Required classes for Page Demo
	require_once "engine/blog.php";
	require_once "visitors/pagevisitor.php";
	
	// Settings
	include "settings/globalvars.php";
	
	// Page ID
	$id = $_GET['page'];

	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new PageVisitor($GLOB_folder);
	
	// Set page to visit
	if ($id != 0) $visitor->setPage($id);

	// Displays the page
	$blog->accept($visitor);
?>