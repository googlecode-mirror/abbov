<?php

	// Necessary includes for Blog class
	require_once "engine/visitable.php";
	require_once "engine/database.php";
	require_once "engine/page.php";
	
	class Blog implements Visitable {
		private $_db; // Blog's database represented by the Database class
		private $_pages; // Blog's pages
		
		// __construct(): executed when object is created
		// Creates a new Database object, connects to the database server and selects the database
		// Queries the database for pages
		//
		// Doesn't receive information
		//
		// Doesn't return information
		
		function __construct($user, $pass, $addr, $data) {
			$this->_db = new Database($user, $pass, $addr);
			$this->_db->connect();
			$this->_db->selectDatabase($data);
			$this->_pages = $this->_db->getPages();
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
		
		function getPage($id) {
			$page = $id - 1;
			return $this->_pages[$page];
		}
	}
	
?>