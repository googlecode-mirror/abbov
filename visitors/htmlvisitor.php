<?php

	// Required classes for HTML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class HTMLVisitor implements Visitor {
	
		private $_rootfolder;
		
		function __construct($rf) {
			$this->_rootfolder = $rf;
		}
	
		// visitBlog(Blog $b)
		// Displays the content of a Blog
		//
		// $b - a Blog object
		//
		// Doesn't return information
		
		function visitBlog(Blog $b) {
			$pages = $b->getPages();
			
			echo "<html><head><title>ABBOV TEST</title>";
			echo '<link rel="alternate" type="application/rss+xml" title="RSS" href="http://' . $_SERVER['SERVER_ADDR'] . $this->_rootfolder . 'rss.php">';
			echo "</head><body>";
			
			foreach ($pages as $pa) {
				$pa->accept($this);
			}
			
			echo "</body></html>";
		}
		
		// visitPage(Page $p)
		// Displays the content of a Page
		//
		// $p - a Page object
		//
		// Doesn't return information
		
		function visitPage(Page $p) {
			$posts = $p->getPosts();
			
			echo '<div id="page">';
			
			foreach ($posts as $po) {
				$po->accept($this);
			}
			
			echo '</div><br>';
		}
		
		// visitPost(Post $p)
		// Displays the content of a Post
		//
		// $p - a Post object
		//
		// Doesn't return information
		
		function visitPost(Post $p) {
			$text = $p->getText();
			$title = $p->getTitle();
			
			echo '<div id="post">';
			echo '<h3>'.$title.'</h3>';
			echo $text;
			echo '</div>';
			
		}
	}
?>