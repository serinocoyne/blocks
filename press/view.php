<?php 
	if($category == 'home') {
	
		if(isset($fontSize)) 
			$fSize = $fontSize;
		else
			$fSize = 20;
			
		echo '<div class="quote">';
			if(isset($pressReview)) 
				echo '<div class="press-home-quote" style="font-size:'.$fSize.'; line-height:'.$fSize.'">'.$pressReview.'</div>';
			echo '<div class="press-sub-quote">';
				if(isset($author)) 
					echo '<span class="pres-home-quote-author">'.$author.' </span>';
				if(isset($publication)) 
					echo '<span class="press-home-quote-pub">'.$publication.'</span>';	
			echo '</div>';				
		echo '</div>';
		
	} else if ($category == 'review') {
	
		if(isset($fontSize)) 
			$fSize = $fontSize;
		else
			$fSize = 20;
		echo '<div class="press-review">';
			if(isset($pressReview) && isset($link)) {echo '<div class="review-summary"><span>' . $pressReview . '</span></div>';}
	    	if(isset($date)) {echo '<span class="review-date">' . date($date) . ' </span>';}
	    	echo '<div class="review-sub">';
		    	if(isset($author)) {echo '<span class="review-author">' . $author . '</span>';}
		    	if(isset($publication)) {echo '<span class="review-publication"> &mdash;' . $publication . '</span>';}
		    echo '</div>';
	  	echo '</div>';
		
	} else if ($category == 'feature') {
		
		echo '<div class="press-feature clearfix">';
		
		if($featureImage && $featureImage != '') {
	        //Get the image path information
	        $f = File::getByID($featureImage);
	        $fullPath = $f->getPath();
	        $relPath = $f->getRelativePath();
	        $size = @getimagesize($fullPath);
    		
    		echo '<div class="feature-image"><img src='. $relPath .' /></div>';
    		echo '<div class="feature-text">';
    	} else {
    		echo '<div class="feature-text-full">';
    	}	
    	
    	if(isset($pressHeadline)) {echo '<h3 class="feature-headline">' . $pressHeadline . '</h3>';}
    	if(isset($date)) {echo '<span class="feature-date">' . date($date) . ' </span>';}
    	if(isset($publication)) {echo '<span class="feature-publication"> &mdash;' . $publication . '</span>';}
    	if(isset($pressReview)) {echo '<div class="feature-summary">' . $pressReview . '</div>';}
    	if(isset($link)) {echo '<div class="feature-link"><a href="' . $link . '" target="_blank">Read More</a></div>';}
  
    	
    			
		echo '</div></div>';
	}  else
		echo 'Please select a category for this press item';
?>
