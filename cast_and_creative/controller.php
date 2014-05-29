<?php
	class CastAndCreativeBlockController extends BlockController {

		var $pobj;

		protected $btTable = 'btCastAndCreative';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "600";
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;

		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Adds a Cast and Creative entry.");
		}

		public function getBlockTypeName() {
			return t("Cast and Creative");
		}		

		function view(){ 
			$this->set('bID', $this->bID);	
			$this->set('name', $this->name);
			$this->set('alias', $this->alias);
			$this->set('image', $this->image);
			$this->set('bio', $this->bio);
		}

		function save($data) { 
			$args['name'] = isset($data['name']) ? trim($data['name']) : '';
			$args['alias'] = isset($data['alias']) ? trim($data['alias']) : '';
			$args['image'] = isset($data['image']) ? trim($data['image']) : '';
			$args['bio'] = isset($data['bio']) ? trim($data['bio']) : '';		
			parent::save($args);
		}
	}
?>