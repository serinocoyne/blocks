<?php
defined('C5_EXECUTE') or die("Access Denied.");
Loader::element('editor_init');
Loader::element('editor_config');
Loader::element('editor_controls');
?>
<?php echo $form->label('question', 'Question');?>
<?php echo $form->text('question', $question, array('style' => 'width: 320px'));?>

<?php echo $form->label('answer', 'Answer');?>
<?php echo $form->textarea('answer', $answer, array('class'=>"ccm-advanced-editor"));?>