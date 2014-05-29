
    <?php if($image && $image != '') {
    	$addimage = true;
        //Get the image path information
        $f = File::getByID($image);
        $fullPath = $f->getPath();
        $relPath = $f->getRelativePath();
        $size = @getimagesize($fullPath);
    
    ?>
    <div class="amc-cc-block w-image clearfix">
        
    	<div class="amc-cc-text">
    	
    <?php } else { ?>
   	<div class="amc-cc-block clearfix">
    	<div class="amc-cc-text-full">
	<?php } ?>
    <?php if($name && $name != ''){echo "<h3><a name='" . preg_replace( '/\s+/', '_', $name ) . "'></a>" . $name . "</h3>";} ?>
    <?php if($alias && $alias != ''){echo "<h4>" . $alias . "</h4>";} ?>
        <div class="amc-cc-bio">
        	<?php if ($addimage) { ?>
		    	<div class="amc-cc-image">
		        	<?php echo "<img title='".$name."' alt='".$name."' src='".$relPath."' />"?>
		        </div>
		    <?php } ?>	

        	<?php if(isset($bio) && $bio != '') { echo $bio; } ?>
        </div>
    	</div>
	</div>