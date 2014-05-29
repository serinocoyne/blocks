<?php    defined('C5_EXECUTE') or die(_("Access Denied.")); 

	$im = Loader::helper('image');

?>

<div class="res-video-block">
<?php 
	$pastfirst = false; 
	if(isset($videos)) {
		foreach($videos as $video) { 
			if(!$pastfirst) { 
				echo '<div class="embed-container">'.$video['code'].'</div>';
				echo '<div class="thumb-grid clearfix">';
				$pastfirst = true; 
			}
			echo '<div class="thumb">';
			echo '<a href="#" class="thumb-link">';
			$img = File::getByID($video['fID']);
			$im->output($img);
			echo '<span>'.$video['title'].'</span>';
			echo '<div class="hidden-code">'.$video['code'].'</div>';
			echo '</a>';
			echo '</div>';
	 }
	 echo '</div>'; // end thumb-grid
} else {
	echo "Empty Video Set";
}
?>
</div>