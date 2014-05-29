<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));

class ScheduleBlockController extends BlockController {
	
	protected $btTable = 'btSchedule';
	protected $btInterfaceWidth = "550";
	protected $btInterfaceHeight = "400";
	protected $btWrapperClass = 'ccm-ui';
	
	protected $weeks = array();
	protected $flink = '';
		
	public function getBlockTypeDescription() {
		return t("Display a performance schedule.");
	}
	
	public function getBlockTypeName() {
		return t("Performance Schedule");
	}
	
	function loadFullSchedule(){
	
		// Set full schedule link
		$this->set('flink', $this->flink); 
		
		// Get all weeks
		$sql = "SELECT * FROM btScheduleWeek WHERE bID=".intval($this->bID);
		$db = Loader::db();
		$this->weeks=$db->query($sql);
		$weeks = array();
		
		// Convert dates to --/--/---- format
		foreach($this->weeks as $week) {
			$time = strtotime($week['date']);
			$week['date'] = date('m/d/Y', $time);
			array_push($weeks, $week);
		}
		
		// Set weeks for edit
		$this->set('weeks', $weeks);
		
	}
	
	function loadFutureSchedule(){
	
		// Set full schedule link
		$this->set('flink', $this->flink); 
	
		// Get all weeks after last saturday
		$lastdate = date('Y-m-d', strtotime('last Saturday'));
		$sql = "SELECT * FROM btScheduleWeek WHERE bID=".intval($this->bID)." AND date > '".$lastdate."'";
		$db = Loader::db();
		$this->weeks=$db->query($sql);
		
		// Convert dates to --/--/---- format
		$weeks = array();
		foreach($this->weeks as $week) {
			$time = strtotime($week['date']);
			$week['date'] = date('m/d/Y', $time);
			array_push($weeks, $week);
		}
		
		// Set weeks for view
		$this->set('weeks', $weeks);
		
	}
	
	function view() {
		$this->loadFutureSchedule();
	}

	function add() {
		$this->loadEditStyles();
	}
	
	function edit() {
		$this->loadEditStyles();
		$this->loadFullSchedule();
	}

	function save($data) {
		
		$db = Loader::db();
		
		$args['flink'] = isset($data['flink']) ? trim($data['flink']) : '';
			
		//delete existing weeks
		$db->query("DELETE FROM btScheduleWeek WHERE bID=".intval($this->bID));
 
 	    //loop through and add the weeks
 	    $pos=0;
		foreach($data['date'] as $startdate){ 
			
			$date = date('Y-m-d', strtotime(str_replace('-', '/', $startdate))); 
			$vals = array(intval($this->bID),$date, trim($data['sun'][$pos]),trim($data['mon'][$pos]),trim($data['tue'][$pos]),trim($data['wed'][$pos]),trim($data['thu'][$pos]),trim($data['fri'][$pos]),trim($data['sat'][$pos]));
			$db->query("INSERT INTO btScheduleWeek (bID,date,sun,mon,tue,wed,thu,fri,sat) values (?,?,?,?,?,?,?,?,?)",$vals);
			$pos++;
		}
	  parent::save($args); 
	}
	
	public function uninstall(){
		$db = Loader::db();
		$db->query("DELETE * btSchedule");
		$db->query("DELETE * btScheduleWeek");
	   Cache::flush(); 
	   return parent::uninstall(); 
	}
	
	function delete(){
		$db = Loader::db();
		$db->query("DELETE FROM btSchedule WHERE bID=".intval($this->bID));		
		parent::delete();
	}
	
	private function loadEditStyles() {
	   $hh = Loader::helper('html');
	   $this->addHeaderItem($hh->css('/blocks/schedule/css/addedit.css'));
	}
	
}

?>
