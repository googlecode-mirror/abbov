<?php
	// Required classes for Page
	require_once "engine/visitable.php";
	require_once "engine/post.php";
	
	class Page implements Visitable {
		private $_posts; // Array of posts
		
		// _construct(): executed when object is created
		// Creates an array at $_posts
		//
		// Doesn't receive information
		//
		// Doesn't return information
		
		function __construct() {
			$this->_posts = array();
		}
		
		// accept(Visitor $a)
		// Accepts a given visitor that will display the page content
		//
		// $a - a visitor object that implements the Visitor interface
		//
		// Doesn't return information
		
		function accept(Visitor $a) {
			$a->visitPage($this);
		}
		
		// getPosts()
		// Returns the page posts
		//
		// Doesn't receive information
		//
		// Returns an array of posts
		
		function getPosts() {
			return $this->_posts;
		}
		
		// addPost(Post $p)
		// Adds a post to the page
		//
		// $p - the post to add to the page
		//
		// Doesn't return information
		
		function addPost(Post $p) {
			$this->_posts[] = $p;
		}
	}
?>