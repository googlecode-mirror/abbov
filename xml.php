<?php
	// Required classes for the XML demo
	require_once "engine/blog.php";
	require_once "visitors/xmlvisitor.php";
	
	// Settings
	include "settings/globalvars.php";
	
	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new XMLVisitor();
	
	// Builds the XML file
	$blog->accept($visitor);
?>