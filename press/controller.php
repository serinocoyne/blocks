<?php
	class PressBlockController extends BlockController {

		var $pobj;
		
		protected $btDescription = "Block for displaying press items.";
		protected $btName = "Press";
		protected $btTable = 'btPress';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "400";
		

		function view(){ 
			$this->set('bID', $this->bID);	
			$this->set('category', $this->category);
			$this->set('author', $this->author);
			$this->set('publication', $this->publication);
			$this->set('date', $this->date);
			$this->set('link', $this->link);
			$this->set('fontSize', $this->fontSize);
			$this->set('featureImage', $this->featureImage);
			$this->set('pressHeadline', $this->pressHeadline);
			$this->set('pressReview', $this->pressReview);
		}
		
		function add(){	
		     $html = Loader::helper('html');
		}
		
		function edit(){	
		     $html = Loader::helper('html');
		}

		function save($data) { 
			$args['date'] = isset($data['date']) ? trim($data['date']) : '';;
			$args['category'] = isset($data['category']) ? trim($data['category']) : '';
			$args['author'] = isset($data['author']) ? trim($data['author']) : '';
			$args['link'] = isset($data['link']) ? trim($data['link']) : '';
			$args['publication'] = isset($data['publication']) ? trim($data['publication']) : '';
			$args['fontSize'] = isset($data['fontSize']) ? trim($data['fontSize']) : '';
			$args['featureImage'] = isset($data['featureImage']) ? trim($data['featureImage']) : '';
			$args['pressHeadline'] = isset($data['pressHeadline']) ? trim($data['pressHeadline']) : '';	
			$args['pressReview'] = isset($data['pressReview']) ? trim($data['pressReview']) : '';
			parent::save($args);
		}
	}
?>
