<?php

	// Required classes for XML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";

	class RSSVisitor implements Visitor {

		// visitBlog(Blog $b)
		// Displays the content of a Blog
		//
		// $b - a Blog object
		//
		// Doesn't return information

		function visitBlog(Blog $b) {
			$pages = $b->getPages();

			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo '<rss version="2.0">';
			echo '<channel>';
			
			echo '<title>ABBOV TEST</title>';
			echo '<link>http://192.168.1.69/abbov/</link>';
			echo '<description>ABBOV test page</description>';
			echo '<language>pt-pt</language>';

			foreach ($pages as $pa) {
				$pa->accept($this);
			}

			echo '</channel>';
			echo '</rss>';
		}

		// visitPage(Page $p)
		// Displays the content of a Page
		//
		// $p - a Page object
		//
		// Doesn't return information

		function visitPage(Page $p) {
			$posts = $p->getPosts();

			foreach ($posts as $po) {
				$po->accept($this);
			}
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

			echo '<item>';
			
			echo '<title>' . utf8_encode($title) . '</title>';
			echo '<description>' . utf8_encode($text) . '</description>';
			echo '<pubDate>'.date("D, d M Y G:i:s O", $time).'</pubDate>';
			echo '<author>'.$author.'</author>';
			echo '</item>';
		}
	}
?>