<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));

Loader::model('file_attributes'); 

class ResponsiveVideoBlockController extends BlockController {
	
	var $pobj;
	
	protected $btTable = 'btResponsiveVideo';
	protected $btInterfaceWidth = "550";
	protected $btInterfaceHeight = "400";
	protected $btWrapperClass = 'ccm-ui';
	
	public $videos = array();

	public function getBlockTypeDescription() {
		return t("Display a gallery of responsive videos.");
	}
	
	public function getBlockTypeName() {
		return t("Responsive Video Gallery");
	}
	
	function loadVideos(){
		if(intval($this->bID)==0) {
			$this->videos=array();
			return array();
		}
		$sql = "SELECT * FROM btResponsiveVideoItem WHERE bID=".intval($this->bID);
		$db = Loader::db();
		$this->videos=$db->query($sql); 
		$this->set('videos', $this->videos);
	}
	
	function view() {
		$this->loadVideos();
	}

	function add() {
		$this->loadEditStyles();
		$this->loadVideos();
	}
	
	function edit() {
		$this->loadEditStyles();
		$this->loadVideos();
	}

	public function save($data) {
		$db = Loader::db();

		//delete existing images
		$db->query("DELETE FROM btResponsiveVideoItem WHERE bID=".intval($this->bID));
 
 	    //loop through and add the images
 	    $pos=0;
		foreach($data['input-thumb'] as $fID){ 
			$sanitizedcode = str_replace("\"", "'", $data['input-code'][$pos]);
			$vals = array(intval($this->bID),intval($fID), trim($sanitizedcode),trim($data['input-title'][$pos]));
			$db->query("INSERT INTO btResponsiveVideoItem (bID,fID,code,title) values (?,?,?,?)",$vals);
			$pos++;
		}
	  parent::save($args); 
	}
	
	public function uninstall(){
		$db = Loader::db();
		$db->query("DELETE * btResponsiveVideoItem");
	   Cache::flush(); 
	   return parent::uninstall(); 
	}
	
	function delete(){
		$db = Loader::db();
		$db->query("DELETE FROM btResponsiveVideoItem WHERE bID=".intval($this->bID));		
		parent::delete();
	}
	
	private function loadEditStyles() {
	   $hh = Loader::helper('html');
	   $this->addHeaderItem($hh->css('/blocks/responsive_video/css/addedit.css'));
	}
	
}

?>
