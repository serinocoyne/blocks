<style>
	#fontSize {display:none;}
	div.ccm-pane-controls label {margin: 20px 0 5px !important;}
</style>
<?php
defined('C5_EXECUTE') or die("Access Denied.");
Loader::element('editor_init');
Loader::element('editor_config');

$al = Loader::helper('concrete/asset_library');
?>
<?php echo $form->label('category', 'Category');?>
<?php echo $form->select('category', array('feature' => 'Feature', 'review' => 'Review', 'home' => 'Homepage Quote'), $category);?>

<?php echo $form->label('author', 'Author');?>
<?php echo $form->text('author', array());?>

<?php echo $form->label('publication', 'Publication');?>
<?php echo $form->text('publication', $publication,  array());?>

<?php echo $form->label('date', 'Date');?>
<?php echo $form->text('date', array('class'=>"date-picker"));?>

<?php echo $form->label('link', 'Link');?>
<?php echo $form->text('link', array());?>

<?php echo $form->label('fontSize', 'Font Size - Only For Homepage Quotes');?>
<?php echo $form->select('fontSize', array('default' => 'Default', '8px' => '8px', '10px' => '10px', '12px' => '12px', '14px' => '14px', '16px' => '16px', '18px' => '18px', '20px' => '20px', '24px' => '24px', '26px' => '26px', '28px' => '28px', '30px' => '30px', '34px' => '34px', '38px' => '38px'), $fontSize);?>

<?php echo $form->label('featureImage', 'Feature Image');?>
<?php echo $al->file('ccm-b-file', 'featureImage', t('Choose an Image')); ?>

<?php echo $form->label('pressHeadline', 'Feature Headline');?>
<?php echo $form->textarea('pressHeadline', array());?>

<?php echo $form->label('pressReview', 'Review');?>
<?php echo $form->textarea('pressReview',  array());?>

<script>
	
	function categoryChange() {
		var category = $("#category option:selected").text();
		if(category == 'Feature') {
			$("label[for='pressReview']").text('Feature Summary');
			$("label[for='featureImage']").show();
			$("#ccm-b-file-fm-display").show();
			$("label[for='pressHeadline']").show();
			$('#pressHeadline').show();
		} else {
			$("label[for='featureImage']").hide();
			$("#ccm-b-file-fm-display").hide();		
			$("label[for='pressHeadline']").hide();
			$("#pressHeadline").hide();}
		if(category == 'Homepage Quote') {
			$("label[for='pressReview']").text('Homepage Quote');
			$("label[for='fontSize']").show();
			$("#fontSize").show();
			$("label[for='link']").hide();
			$("#link").hide();
			$("label[for='date']").hide();
			$("#date").hide();
		} else {
			$("#fontSize").hide();
			$("label[for='fontSize']").hide();
			$("label[for='link']").show();
			$("#link").show();
			$("label[for='date']").show();
			$("#date").show();
		}
		if(category == 'Review') {
			$("label[for='fontSize']").show();
			$("#fontSize").show();
			$("label[for='pressReview']").text('Review or Quote');
		} 
	}
	
	$( ".date-picker" ).datepicker();
	$('#category').change(function () {categoryChange();});
	categoryChange();
	
</script>
