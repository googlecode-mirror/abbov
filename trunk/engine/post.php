<?php
	require_once "engine/visitable.php";
	
	class Post implements Visitable {
		private $_title;
		private $_text;
		
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
		
		function getTitle() {
			return $this->_title;
		}
	}
?>