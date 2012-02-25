<?php
	// Required classes for XML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";

	class RSSVisitor implements Visitor {

		private $_rootfolder; // Folder where ABBOV is running
		
		// __construct($rf): Executed when object is created
		// Fills the internal variables with the given values
		//
		// $rf - folder where ABBOV is running
		//
		// Doesn't return information
		
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
			
			header('Content-type: application/rss+xml');

			echo '<?xml version="1.0" encoding="UTF-8"?>';
			echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">';
			echo '<channel>';
			
			echo '<atom:link href="http://'. $_SERVER['SERVER_NAME'] . $this->_rootfolder . 'rss.php" rel="self" type="application/rss+xml" />';
			echo "<title>" . $b->getTitle() . "</title>";
			echo '<link>http://' . $_SERVER['SERVER_NAME'] . $this->_rootfolder . '</link>';
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
			$id = $p->getID();

			echo '<item>';
			
			echo '<guid isPermaLink="false">' . utf8_encode("ABBOV_ID_".$id) . '</guid>';
			echo '<title>' . utf8_encode($title) . '</title>';
			echo '<description>' . utf8_encode($text) . '</description>';
			echo '<pubDate>'.date("D, d M Y G:i:s O", $time).'</pubDate>';
			echo '<dc:creator>'.$author.'</dc:creator>';
			echo '</item>';
		}
	}
?>