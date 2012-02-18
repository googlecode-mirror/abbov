<?php

	// Required classes for HTML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class HTMLVisitor implements Visitor {
	
		// visitBlog(Blog $b)
		// Displays the content of a Blog
		//
		// $b - a Blog object
		//
		// Doesn't return information
		
		function visitBlog(Blog $b) {
			$pages = $b->getPages();
			
			echo "<html><head><title>ABBOV TEST</title></head><body>";
			
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
			
			echo '<div id="post">';
			echo $text;
			echo '</div>';
			
		}
	}
?>