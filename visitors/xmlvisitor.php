<?php
	
	// Required classes for XML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class XMLVisitor implements Visitor {
		
		// visitBlog(Blog $b)
		// Displays the content of a Blog
		//
		// $b - a Blog object
		//
		// Doesn't return information
		
		function visitBlog(Blog $b) {
			$pages = $b->getPages();
			
			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo '<blog>';
			
			foreach ($pages as $pa) {
				$pa->accept($this);
			}
			
			echo '</blog>';
		}
		
		// visitPage(Page $p)
		// Displays the content of a Page
		//
		// $p - a Page object
		//
		// Doesn't return information
		
		function visitPage(Page $p) {
			$posts = $p->getPosts();
			
			echo '<page>';
			
			foreach ($posts as $po) {
				$po->accept($this);
			}
			
			echo '</page>';
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
			$author = $p->getAuthor();
			$time = $p->getTime();
			
			echo '<post>';
			echo '<title>' . utf8_encode($title) . '</title>';
			echo '<author>' . utf8_encode($author) . '</author>';
			echo '<time>' . utf8_encode(date("H:i:s - d/m/Y", $time)) . '</time>';
			echo '<text>' . utf8_encode($text) . '</text>';
			echo '</post>';
		}
	}
?>