<?php
	require_once "engine/blog.php";
	require_once "visitors/htmlvisitor.php";
	include "settings/globalvars.php";
	
	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new HTMLVisitor();
	
	$blog->accept($visitor);
?>