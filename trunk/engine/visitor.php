<?php
	// Required classes for Visitor
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	interface Visitor {
	
		// visitBlog(Blog $b)
		// Visits a given blog in order to display it's content
		//
		// $b - a Blog object

		function visitBlog(Blog $b);
		
		// visitPage(Page $p)
		// Visits a given page in order to display it's content
		//
		// $p - a Page object

		function visitPage(Page $p);
		
		// visitPost(Post $p)
		// Visits a given post in order to display it's content
		//
		// $p - a Post object

		function visitPost(Post $p);
	}
?>