<?php
	class HonorsController extends BlockController {

		var $pobj;

		protected $btTable = 'btHonors';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "600";
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;

		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Adds a Honors entry.");
		}

		public function getBlockTypeName() {
			return t("Honors");
		}		

		function view(){ 
			$this->set('bID', $this->bID);	
			$this->set('name', $this->name);
			$this->set('image', $this->image);
			$this->set('bio', $this->bio);
		}

		function save($data) { 
			$args['name'] = isset($data['name']) ? trim($data['name']) : '';
			$args['image'] = isset($data['image']) ? trim($data['image']) : '';
			$args['bio'] = isset($data['bio']) ? trim($data['bio']) : '';		
			parent::save($args);
		}
	}
?>