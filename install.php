<?php
	// Required classes for the installation script
	require_once "engine/database.php";
	
	// Settings
	include "settings/globalvars.php";
	
	$database = new Database($GLOB_username, $GLOB_password, $GLOB_server);
	$database->createStructures($GLOB_database);
?>