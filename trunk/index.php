<?php
	
	// Required classes for the Index demo
	require_once "engine/blog.php";
	require_once "visitors/htmlvisitor.php";
	
	// Settings
	include "settings/globalvars.php";
	
	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new HTMLVisitor($GLOB_folder);
	
	// Displays the blog
	$blog->accept($visitor);
?>