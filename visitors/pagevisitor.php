<?php
	// Required classes for HTML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";

	class PageVisitor implements Visitor {

		private $_id; // ID of the page
		private $_rootfolder; // Folder where ABBOV is running
		
		// __construct($id, $rf): Executed when object is created
		// Fills the internal variables with the given values
		//
		// $rf - folder where ABBOV is running
		//
		// Doesn't return information
		
		function __construct($rf) {
			$this->_id = 1;
			$this->_rootfolder = $rf;
		}
		
		// setPage($id)
		// Sets the page ID to visualize
		//
		// $id - ID of the requested page
		//
		// Doesn't return information
		
		function setPage($id) {
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

			echo "<html><head><title>ABBOV TEST</title>";
			echo '<link rel="alternate" type="application/rss+xml" title="RSS" href="http://' . $_SERVER['SERVER_NAME'] . $this->_rootfolder . 'rss.php">';
			echo "</head><body>";

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
			$author = $p->getAuthor();
			$time = $p->getTime();
			$tags = $this->tagsToString($p->getTags());
			
			echo '<div id="post">';
			echo '<b>'.$title."</b><br>";
			echo $author.' @ '.date("H:i:s - d/m/Y", $time).'<br>';
			echo 'Tags: '.$tags.'<br><br>';
			echo $text;
			echo "<br><br>";
			echo '</div>';
			
		}
		
		// tagsToString($tagsArray) 
		// Converts an array of tags into a string
		//
		// $tagsArray - an array of strings (tags)
		//
		// Returns a string of tags
		
		function tagsToString($tagsArray) {
			$tags = "";
			
			for ($i = 0; $i < sizeof($tagsArray); $i++) {
				$tags .= $tagsArray[$i];
				if ($i < (sizeof($tagsArray) - 1)) {
					$tags .= ", ";
				}
			}
			
			return $tags;
		}
	}
?>