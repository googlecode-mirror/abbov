<?php
	// Required classes for HTML Visitor
	require_once "engine/visitor.php";
	require_once "engine/visitable.php";
	require_once "engine/blog.php";
	require_once "engine/page.php";
	require_once "engine/post.php";
	
	class HTMLVisitor implements Visitor {
	
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
			
			echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
			echo "<html><head>";
			echo '<meta http-equiv="Content-type" content="text/html;charset=ISO-8859-1">';
			echo "<title>ABBOV TEST</title>";
			echo '<link rel="alternate" type="application/rss+xml" title="RSS" href="http://' . $_SERVER['SERVER_NAME'] . $this->_rootfolder . 'rss.php">';
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
			
			echo '<div class="page">';
			
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
			$id = $p->getID();
			
			echo '<div class="post">';
			echo '<b>'.$title."</b><br>";
			echo $author.' @ '.date("H:i:s - d/m/Y", $time).'<br>';
			echo 'Tags: '.$tags.'<br><br>';
			echo $text;
			echo "<br><br>";
			echo '<a href="deletepost.php?id='.$id.'">Delete post</a>';
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