<?php
	// Required classes for the Add Post demo
	require_once "engine/blog.php";

	// Settings
	include "settings/globalvars.php";

	// Creates a new Blog and a new Visitor
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);

	// Post variables
	$title = $_POST['title'];
	$text = $_POST['text'];
	$author = $_POST['author'];
	$tags = split(", ", $_POST['tags']);

	// Adds a new post
	$blog->newPost($title, $text, $author, $tags);
	
	header('Location:index.php');
?>