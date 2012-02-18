<?php

	// Required classes for blog's index
	require_once "engine/blog.php";
	require_once "visitors/xmlvisitor.php";
	
	// Blog's settings
	include "settings/globalvars.php";
	
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new XMLVisitor();
	
	$blog->accept($visitor);
?>