<?php
	class SimpleFaqBlockController extends BlockController {

		var $pobj;

		protected $btTable = 'btSimpleFaq';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "400";
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;

		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Adds a FAQ item.");
		}

		public function getBlockTypeName() {
			return t("Simple FAQ");
		}		

		function view(){ 
			$this->set('bID', $this->bID);	
			$this->set('question', $this->question);
			$this->set('answer', $this->answer);
		}

		function save($data) { 
			$args['question'] = isset($data['question']) ? trim($data['question']) : '';
			$args['answer'] = isset($data['answer']) ? trim($data['answer']) : '';
			parent::save($args);
		}
	}
?>