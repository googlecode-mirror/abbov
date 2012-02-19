<?php

	// Required classes for Database
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class Database {
		private $_username; // Database server username
		private $_password; // Database server password
		private $_address; // Database server IP Address
		private $_connection; // Connection object
	
		// __construct($user, $pass, $addr): executed when object is created
		// Fills the internal variables with the given values
		//
		// $user - username of the database server
		// $pass - password of the database server
		// $addr - IP address of the database server
		//
		// Doesn't return information
		
		function __construct($user, $pass, $addr) {
			$this->_username = $user;
			$this->_password = $pass;
			$this->_address = $addr;
		}
		
		// connect()
		// Connects to a database server and stores in an internal variable the connection object
		//
		// Doesn't receive information
		//
		// Doesn't return information
		
		function connect() {			
			$this->_connection = @mysql_connect($this->_address, $this->_username, $this->_password);
			if($this->_connection === FALSE) {
				echo "ERROR!<br>";
				echo mysql_error();
				exit;
			}
		}
		
		// selectDatabase($db)
		// Selects a database from the database server
		//
		// $db - database to select
		//
		// Doesn't return information
		
		function selectDatabase($db) {
			mysql_select_db($db, $this->_connection);
		}
		
		// getPages()
		// Returns the database's Post table in Page object form
		//
		// Doesn't receive information
		//
		// Returns an array of pages
		
		function getPages() {
			$pages = array();
			$query = "SELECT * FROM Posts ORDER BY ID DESC";
			
			$posts = mysql_query($query, $this->_connection);
			
			$np = mysql_num_rows($posts);
			
			if ($np > 0) {
				for ($i = 0; $i < $np; $i++) {
					$page = new Page();
					for ($j = 0; $j < 10; $j++) {
						if ($post = mysql_fetch_assoc($posts)) {
							$p = new Post($post["Text"], $post["Title"]);
							$page->addPost($p);
						}
						else {
							break;
						}
					}
					$pages[] = $page;
					if ($post == NULL) break;
				}
			}
			
			return $pages;
		}
	}
?>