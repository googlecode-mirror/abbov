<?php
	// Required classes for Blog
	require_once "engine/visitable.php";
	require_once "engine/database.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class Blog implements Visitable {
		private $_db; // Blog's database represented by the Database class
		private $_pages; // Blog's pages
		private $_title; // Blog's title
		
		// __construct(): executed when object is created
		// Creates a new Database object, connects to the database server and selects the database
		// Queries the database for pages
		//
		// $user - the username of the MySQL server
		// $pass - the password of the MySQL server
		// $addr - the address of the MySQL server
		// $data - the database in the MySQL server
		//
		// Doesn't return information
		
		function __construct($user, $pass, $addr, $data) {
			$this->_db = new Database($user, $pass, $addr);
			$this->_db->connect();
			$this->_db->selectDatabase($data);
			$this->_pages = $this->_db->getPages();
			$this->_title = $this->_db->getBlogTitle();
		}
		
		// accept(Visitor $a)
		// Accepts a given visitor that will display the blog content
		//
		// $a - a visitor object that implements the Visitor interface
		//
		// Doesn't return information
		
		function accept(Visitor $a) {
			$a->visitBlog($this);
		}
		
		// getPages()
		// Returns the blog pages
		//
		// Doesn't receive information
		//
		// Returns an array of pages
		
		function getPages() {
			return $this->_pages;
		}
		
		// getPage($id)
		// Returns a specific blog page
		//
		// $id - the number of the blog page requested
		//
		// Returns a page
		
		function getPage($id) {
			$page = $id - 1;
			return $this->_pages[$page];
		}
		
		
		// newPost($title, $text, $author, $tags)
		// Adds a new post to the blog's database
		//
		// $title - the title of the post
		// $text - the text of the post
		// $author - the author of the post
		// $tags - the tags of the post (in an array form)
		//
		//Doesn't return information
		
		function newPost($title, $text, $author, $tags) {
			$p = new Post($text, $title, $author, time(), $tags);
			$this->_db->addPost($p);
		}
		
		// deletePost($id)
		// Deletes a post from the blog's database
		//
		// $id - the post ID
		//
		// Doesn't return information
		
		function deletePost($id) {
			$this->_db->deletePost($id);
		}
		
		// rebuildPages()
		// Rebuilds the page index
		//
		// Doesn't receive information
		//
		// Doesn't return information
		
		function rebuildPages() {
			$this->_pages = $this->_db->getPages();
		}
		
		// getTitle()
		// Returns the blog title
		//
		// Doesn't receive information
		//
		// Returns a string
		
		function getTitle() {
			return $this->_title;
		}
	}
	
?>