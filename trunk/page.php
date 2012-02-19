<?php
	require_once "engine/blog.php";
	require_once "visitors/pagevisitor.php";
	include "settings/globalvars.php";

	$blog = new Blog($GLOB_username, $GLOB_password, $GLOB_server, $GLOB_database);
	$visitor = new PageVisitor($_GET['page'], $GLOB_folder);

	$blog->accept($visitor);
?>