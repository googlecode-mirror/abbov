<?php

	// Required classes for Post
	require_once "engine/visitable.php";
	
	class Post implements Visitable {
		private $_title; // Title of the post
		private $_text; // Text of the post
		
		// __construct($text, $title): executed when object is created
		// Fills the internal variables with the given values
		//
		// $text - the post text
		// $title - the post title
		//
		// Doesn't return information
		
		function __construct($text, $title) {
			$this->_text = $text;
			$this->_title = $title;
		}
		
		// accept(Visitor $a)
		// Accepts a given visitor that will display the post content
		//
		// $a - a visitor object that implements the Visitor interface
		//
		// Doesn't return information
		
		function accept (Visitor $a) {
			$a->visitPost($this);
		}
		
		// getText()
		// Returns the post text
		//
		// Doesn't receive information
		//
		// Returns a string
		
		function getText() {
			return $this->_text;
		}
		
		// getTitle()
		// Returns the post title
		//
		// Doesn't receive information
		//
		// Returns a string
		
		function getTitle() {
			return $this->_title;
		}
	}
?>