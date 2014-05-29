<?php
defined('C5_EXECUTE') or die("Access Denied.");
Loader::element('editor_init');
Loader::element('editor_config');

$al = Loader::helper('concrete/asset_library');

?>
<?php echo $form->label('name', 'Name');?>
<?php echo $form->text('name', array('style' => 'width: 320px'));?>

<?php echo $form->label('alias', 'Alias');?>
<?php echo $form->text('alias', array('style' => 'width: 320px'));?>

<?php echo $form->label('image', 'Image');?>
<?php echo $al->file('ccm-b-file', 'image', t('Choose an Image')); ?>

<?php echo $form->label('bio', 'Bio');?>
<?php echo $form->textarea('bio', array('class'=>"ccm-advanced-editor"));?>