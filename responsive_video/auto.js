$(document).ready(function(){
  $(".videos").sortable(
	{ items : '.sortable_row',
	  handle: '.sort_handle'
  });
  $('.remove_row').live('click',function(){
	$(this).closest('.sortable_row').remove();
  });
  $('.add-video').click(function(){
	var newVid = $('.new-video .sortable_row').clone();
	$(newVid).prependTo('.videos');
	$('.input-thumb', newVid).attr('name', 'input-thumb[]'); 
	$('.input-code', newVid).attr('name', 'input-code[]'); 
	$('.input-title', newVid).attr('name', 'input-title[]'); 
  });
});

$('.choose-link').live('click',function(){
	$(this).parent().addClass('current-pick');
	$(this).parent().next().addClass('current-input');
	ccm_chooseAsset=false;
	ccm_alLaunchSelectorFileManager('ccm-b-file');
});

$('.clear-thumb').live('click',function(){
	$(this).parent().next().attr('value', '');
	$(this).parent().html('<a href="javascript:void(0)" class="choose-link">Choose an Image</a>');
});

ccm_triggerSelectFile = function(fID) {
	//alert(obj);
	$('.current-input').attr('value', fID);
	$('.current-input').removeClass('current-input');
	ccm_alGetFileData(fID, function(data) {
		$('.current-input').attr('value', fID);
		$('.current-pick').html('<img src="' + data[0].filePathDirect + '" /><br/><a href="#" class="clear-thumb">Clear Thumbnail</a>');
		$('.current-pick').removeClass('current-pick');
	});
}