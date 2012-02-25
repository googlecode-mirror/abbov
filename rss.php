<?php
	// Required classes for the RSS demo
	require_once "engine/blog.php";
	require_once "visitors/rssvisitor.php";

	// Settings
	include "settings/globalvars.php";

	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new RSSVisitor($GLOB_folder);

	// Creates the RSS feed
	$blog->accept($visitor);
?>