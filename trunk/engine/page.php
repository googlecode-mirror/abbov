<?php
	require_once "engine/visitable.php";
	require_once "engine/post.php";
	
	class Page implements Visitable {
		private $_posts;
		
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
		
		function addPost(Post $p) {
			$this->_posts[] = $p;
		}
	}
?>