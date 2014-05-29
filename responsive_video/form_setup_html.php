<?php   defined('C5_EXECUTE') or die(_("Access Denied."));

	$im = Loader::helper('image');
	$form = Loader::helper('form');
	$sort_icon = '<img src="'.ASSETS_URL_IMAGES.'/icons/up_down.png" class="sort_handle" height="14" width="14" style="cursor:move;">';
	$remove_icon = '<img src="'.ASSETS_URL_IMAGES.'/icons/remove.png" class="remove_row" height="14" width="14" style="cursor:pointer;">';

?>

<a class="add-video">ADD VIDEO</a>
<div class="new-video">
	<div class="sortable_row">
  	  <div class="thumb">
	  	<span>Thumbnail: </span>
	  	<div class="ccm-file-manager-select" id="ccm-b-file-fm-display" ccm-file-manager-field="ccm-b-file" style="display: block">
	  		 <a href="javascript:void(0)" class="choose-link">Choose an Image</a>
	  	</div>
	  	<input id="ccm-b-file-fm-value" class="input-thumb" type="hidden" value="0">
	  </div>
	  <div class="text-inputs">
	  	<div>
	  		<span>Embed Code: </span>
	  		<input class="input-code" type="text" value="" >
	  	</div>
	  	<div>
	  		<span>Title: </span>
	  		<input class="input-title" type="text" value="" >
	  	</div>
	  	<div class="clear"></div>
	  </div>
	  <div class="form-controls"><?php echo $remove_icon; echo $sort_icon;?></div>
	  <div class="clear"></div>
  </div>
</div>

<div class="videos">
<?php 
if(isset($videos)) {
foreach($videos as $video) { ?>
  <div class="sortable_row">
  	  <div class="thumb">
	  	<span>Thumbnail: </span>
	  	<div class="ccm-file-manager-select" id="ccm-b-file-fm-display" ccm-file-manager-field="ccm-b-file" style="display: block">
	  		<?php
	  			$img = File::getByID($video['fID']);
	  			$im->output($img);
	  		?>
	  		 <a href="#" class="clear-thumb">Clear Thumbnail</a>
	  	</div>
	  	<input id="ccm-b-file-fm-value" name="input-thumb[]" type="hidden" value="<?php echo $video['fID'] ?>">
	  </div>
	  <div class="text-inputs">
	  	<div>
	  		<span>Embed Code: </span>
	  		<input name="input-code[]" type="text" value="<?php  echo $video['code'] ?>" >
	  	</div>
	  	<div>
	  		<span>Title: </span>
	  		<input name="input-title[]" type="text" value="<?php  echo $video['title'] ?>" >
	  	</div>
	  	<div class="clear"></div>
	  </div>
	  <div class="form-controls"><?php echo $remove_icon; echo $sort_icon;?></div>
	  <div class="clear"></div>
  </div><?php  
}}?>
</div>
