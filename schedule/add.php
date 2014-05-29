<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<div id="schedule-wrapper">
	<div class="full-link clearfix">
		<p>Link to full schedule</p>
		<input type="text" name="flink" />
	</div>
	<div class="header clearfix">
		<div class="dateheader label">Start Date</div>
		<div class="sun label">Sun</div>
		<div class="mon label">Mon</div>
		<div class="tue label">Tue</div>
		<div class="wed label">Wed</div>
		<div class="thu label">Thu</div>
		<div class="fri label">Fri</div>
		<div class="sat label">Sat</div>
	</div>
	<div class="week-input clearfix">
		<input class="date" type="text" name="date[]" />
		<input type="text" name="sun[]" />
		<input type="text" name="mon[]" />
		<input type="text" name="tue[]" />
		<input type="text" name="wed[]" />
		<input type="text" name="thu[]" />
		<input type="text" name="fri[]" />
		<input type="text" name="sat[]" />
	</div>
	<a id="add-week-btn"></a>
</div>