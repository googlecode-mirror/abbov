<?php

	// Required classes for HTML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";

	class PageVisitor implements Visitor {

		private $_id;
		
		function __construct($id) {
			$this->_id = $id;
		}
		
		// visitBlog(Blog $b)
		// Displays the content of a Blog
		//
		// $b - a Blog object
		//
		// Doesn't return information

		function visitBlog(Blog $b) {
			$page = $b->getPage($this->_id);

			echo "<html><head><title>ABBOV TEST</title></head><body>";

			$page->accept($this);

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