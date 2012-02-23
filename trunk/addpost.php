<?php
	// Required classes for the Add Post demo
	require_once "engine/blog.php";

	// Settings
	include "settings/globalvars.php";

	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);

	// Post variables
	$title = "This is a test post!";
	$text = "With this post we want to see if we can insert a post via the new insert API.";
	$author = "testprogram";
	$tags = array("test", "post", "api");

	// Adds a new post
	$blog->newPost($title, $text, $author, $tags);
?>