(function ($) {
// VERTICALLY ALIGN FUNCTION
$.fn.vAlign = function() {
	return this.each(function(i){
	var ah = $(this).height();
	var ph = $(this).parent().height();
	var mh = Math.ceil((ph-ah) / 2);
	$(this).css('top', mh);
	});
};
})(jQuery);

function setupQuoteRotator() {
	if($('.quote').length == 1) {
		$('.quote:first').addClass('current').fadeIn(1000).vAlign();
	} else if($('.quote').length > 0) {
		$('.quote:first').addClass('current').fadeIn(1000).vAlign();
		setInterval('textRotate()', 6000);
	}
}

function textRotate() {
	var current = $('.current');
	if(current.next().length == 0) {
		current.removeClass('current').fadeOut(1000, function () {
			$('.quote:first').addClass('current').fadeIn(1000).vAlign();
		});
	}
	else {
		current.removeClass('current').fadeOut(1000, function () {
			current.next().addClass('current').fadeIn(1000).vAlign();
		});
	}
}

