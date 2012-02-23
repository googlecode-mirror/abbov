<?php
	// Required classes for Visitable
	require_once "engine/visitor.php";
	
	interface Visitable {
	
		// accept(Visitor $a)
		// Accepts a given visitor that will display the content of the class that implements this interface
		//
		// $a - a visitor object that implements the Visitor interface
	
		function accept(Visitor $a);
	}
?>