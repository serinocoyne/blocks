<div class="amc-cc-block clearfix">
    <?php if($image && $image != '') {
        //Get the image path information
        $f = File::getByID($image);
        $fullPath = $f->getPath();
        $relPath = $f->getRelativePath();
        $size = @getimagesize($fullPath);
    ?>
        <div class="amc-cc-image"><?php echo "<img title='".$name."' alt='".$name."' src='".$relPath."' />"?></div>
    	<div class="amc-cc-text">
    <?php } else { ?>
    	<div class="amc-cc-text-full">
	<?php } ?>
    <?php if($name && $name != ''){echo "<h3><a name='" . preg_replace( '/\s+/', '_', $name ) . "'></a>" . $name . "</h3>";} ?>
    <?php if(isset($bio) && $bio != '') { ?>
        <div class="amc-cc-bio"><?php echo $bio?></div>
    <?php } ?>
    	</div>
</div>