<?php

	// Required classes for Page Demo
	require_once "engine/blog.php";
	require_once "visitors/pagevisitor.php";
	
	// Settings
	include "settings/globalvars.php";

	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new PageVisitor($_GET['page'], $GLOB_folder);

	// Displays the page
	$blog->accept($visitor);
?>