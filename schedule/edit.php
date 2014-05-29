<?php   
defined('C5_EXECUTE') or die(_("Access Denied."));
?>

<div id="schedule-wrapper">
	<div class="full-link clearfix">
		<p>Link to full schedule</p>
		<input type="text" name="flink" value="<?php echo $flink ?>" />
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
		<?php 
		if(isset($weeks)) {
		foreach($weeks as $week) { ?>
			<div class="week-input clearfix">
				<input class="date" type="text" name="date[]" value="<?php echo $week['date'] ?>" />
				<input type="text" name="sun[]" value="<?php echo $week['sun'] ?>" />
				<input type="text" name="mon[]" value="<?php echo $week['mon'] ?>" />
				<input type="text" name="tue[]" value="<?php echo $week['tue'] ?>" />
				<input type="text" name="wed[]" value="<?php echo $week['wed'] ?>" />
				<input type="text" name="thu[]" value="<?php echo $week['thu'] ?>" />
				<input type="text" name="fri[]" value="<?php echo $week['fri'] ?>" />
				<input type="text" name="sat[]" value="<?php echo $week['sat'] ?>" />
			</div>
		<?php }}?>
	<a id="add-week-btn"></a>
</div>