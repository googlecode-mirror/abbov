<?php
	// Required classes for Post
	require_once "engine/visitable.php";
	
	class Post implements Visitable {
		private $_title; // Title of the post
		private $_text; // Text of the post
		private $_author; // Author of the post
		private $_time; // Time of the post
		private $_tags; // Tags of the post
		
		// __construct($text, $title): executed when object is created
		// Fills the internal variables with the given values
		//
		// $text - the post text
		// $title - the post title
		// $author - the post author
		// $time - the post time
		// $tags - the post tags
		//
		// Doesn't return information
		
		function __construct($text, $title, $author, $time, $tags) {
			$this->_text = $text;
			$this->_title = $title;
			$this->_author = $author;
			$this->_time = $time;
			$this->_tags = $tags;
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
		
		// getTitle()
		// Returns the post title
		//
		// Doesn't receive information
		//
		// Returns a string
		
		function getAuthor() {
			return $this->_author;
		}
		
		// getTime()
		// Returns the post title
		//
		// Doesn't receive information
		//
		// Returns an integer
		
		function getTime() {
			return $this->_time;
		}
		
		// getTags()
		// Returns the post tags
		//
		// Doesn't receive information
		//
		// Returns an array of string
		
		function getTags() {
			return $this->_tags;
		}
	}
?>