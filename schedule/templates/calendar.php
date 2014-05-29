<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>


<div id="perf-schedule" class="clearfix">
	
	<div id="header" class="clearfix">
		<h3>Performance Schedule</h3>
		<div id="controls" class="clearfix">
			<div id="prev-date-btn"><a>&laquo;</a></div>
			<div id="date-wrap"></div>
			<div id="next-date-btn"><a>&raquo;</a></div>
		</div>
		<div id="full-link">
			<a href="<?php echo $flink ?>" target="_blank">View Full Schedule</a>
		</div>
	</div>
	
	<div id="weeks">
		<?php $setactive = false; foreach($weeks as $week) { ?>
		
		<div class="week-wrap <?php if(!$setactive) {echo 'active'; $setactive = true;} ?>">
			<div class="date">
				<span class="start"><?php echo date('m/d', strtotime($week['date'])); ?></span>
				<span> - </span>
				<span class="end"><?php echo date('m/d', (strtotime($week['date']) + 561600)); ?></span>
			</div>
			
			<div class="week">
				<div class="days clearfix">
					<div class="day sun">
						<div>SUN</div>
						<div class="time"><?php echo ($week['sun'] != '' ? $week['sun'] : 'DARK') ?></div>
					</div>
					<div class="day mon">
						<div>MON</div>
						<div class="time"><?php echo ($week['mon'] != '' ? $week['mon'] : 'DARK') ?></div>
					</div>
					<div class="day tue">
						<div>TUE</div>
						<div class="time"><?php echo ($week['tue'] != '' ? $week['tue'] : 'DARK') ?></div>
					</div>
					<div class="day wed">
						<div>WED</div>
						<div class="time"><?php echo ($week['wed'] != '' ? $week['wed'] : 'DARK') ?></div>
					</div>
					<div class="day thu">
						<div>THU</div>
						<div class="time"><?php echo ($week['thu'] != '' ? $week['thu'] : 'DARK') ?></div>
					</div>
					<div class="day fri">
						<div>FRI</div>
						<div class="time"><?php echo ($week['fri'] != '' ? $week['fri'] : 'DARK') ?></div>
					</div>
					<div class="day sat">
						<div>SAT</div>
						<div class="time"><?php echo ($week['sat'] != '' ? $week['sat'] : 'DARK') ?></div>
					</div>
				</div>
			</div>
		</div>
		
		<?php } ?>
	</div>
		
</div>