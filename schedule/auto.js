var duplicate_week = function() {
			
	// Duplicate week only if the previous week has the date set
	
	var last_date = $('.week-input:last input.date').val();
	
	if(last_date == '') { 
		alert( "Last week's date must not be empty" );
		return null;	
	}
	
	var new_week = $('.week-input:last').clone()
	
	
	// Replace date in clone with next week's date
	
	last_date = new Date(last_date);
	
	var d = new Date(last_date.getTime() + 7 * 26 * 60 * 60 * 1000);
	
	console.log(d);
	
	var next_weeks_date = ("0" + (d.getMonth() + 1)).slice(-2) + '/' + ("0" + d.getDate()).slice(-2) + '/' + d.getFullYear();
	
	$('input.date', new_week).val(next_weeks_date);
	
	
	
	// Remove previous datepicker attributes in clone
	
	$('input.date', new_week).removeAttr('id');
	$('input.date', new_week).removeClass('hasDatepicker');
	
	
	// Insert new week into DOM
	
	new_week.insertAfter('.week-input:last');
	
	
	// Re-bind date picker 
	
	$('input.date').datepicker();
}


$('input.date').datepicker();
$('#add-week-btn').click( duplicate_week );
