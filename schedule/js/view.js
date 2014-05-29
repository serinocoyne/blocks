

$(document).ready(function() {

	$('.active .date').clone().appendTo('#date-wrap').show();

	if($('.week-wrap').length > 1) { $('#next-date-btn a').show(); }
	
	$('#next-date-btn a').click(function() {
		
		$('#prev-date-btn a').show();
		$('#date-wrap .date').fadeOut(200, function() {
			$('#date-wrap').empty();
		});
		
		$('.week-wrap.active').slideUp(200, function() {
			$(this).removeClass('active');
			$(this).next().slideDown(200, function() { 
				$(this).addClass('active');
				$('.active .date').clone().appendTo('#date-wrap').fadeIn();
				if($('.week-wrap.active').next().length == 0) {
					$('#next-date-btn a').hide();
				}
			});
		});
		
	});
	
	$('#prev-date-btn a').click(function() {
		
		$('#next-date-btn a').show();
		$('#date-wrap .date').fadeOut(200, function() {
			$('#date-wrap').empty();
		});
		
		$('.week-wrap.active').slideUp(200, function() {
			$(this).removeClass('active');
			$(this).prev().slideDown(200, function() { 
				$(this).addClass('active');
				$('.active .date').clone().appendTo('#date-wrap').fadeIn();
				if($('.week-wrap.active').prev().length == 0) {
					$('#prev-date-btn a').hide();
				}
			});
		});
		
	});
	
});