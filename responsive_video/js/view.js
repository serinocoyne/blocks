$(document).ready(function() {
	$('.thumb-link').click(function(){
		var video = $('.hidden-code', this).html();
		$('.embed-container').html(video);
	});
});