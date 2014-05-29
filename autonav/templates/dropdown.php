<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	$aBlocks = $controller->generateNav();
	$c = Page::getCurrentPage();
	$containsPages = false;
	
	$nh = Loader::helper('navigation');
	
	//this will create an array of parent cIDs 
	$inspectC=$c;
	$selectedPathCIDs=array( $inspectC->getCollectionID() );
	$parentCIDnotZero=true;	
	while($parentCIDnotZero){
		$cParentID=$inspectC->cParentID;
		if(!intval($cParentID)){
			$parentCIDnotZero=false;
		}else{
			$selectedPathCIDs[]=$cParentID;
			$inspectC=Page::getById($cParentID);
		}
	} 	
	$insub = false;
	foreach($aBlocks as $ni) {
		$_c = $ni->getCollectionObject();
		if (!$_c->getCollectionAttributeValue('exclude_nav')) {
			
			
			$target = $ni->getTarget();
			if ($target != '') {
				$target = 'target="' . $target . '"';
			}

			
			$thisLevel = $ni->getLevel();
			
			if ($thisLevel > $lastLevel) {
				echo("<div class='sub'>");
				$insub = true;
			} else if ($thisLevel < $lastLevel) {
				echo("</div></div>");
				$insub = false;
			} else if ($thisLevel == $lastLevel && !$insub) {
				echo("</div>");
			}

			$pageLink = false;
			
			if ($_c->getCollectionAttributeValue('replace_link_with_first_in_nav')) {
				$subPage = $_c->getFirstChild();
				if ($subPage instanceof Page) {
					$pageLink = $nh->getLinkToCollection($subPage);
				}
			}
			
			if (!$pageLink) {
				$pageLink = $ni->getURL();
			}

			if ($c->getCollectionID() == $_c->getCollectionID() && ($_c->getCollectionID() != HOME_CID)) { 
				
				if(!$insub){
					echo('<div class="main"><a class="nav-selected nav-path-selected" ' . $target . ' href="' . $pageLink . '">' . $ni->getName() . '</a>');
				} else {
					echo('<a class="nav-selected nav-path-selected" ' . $target . ' href="' . $pageLink . '">' . $ni->getName() . '</a>');
				}
				
			} elseif ( in_array($_c->getCollectionID(),$selectedPathCIDs) && ($_c->getCollectionID() != HOME_CID)) { 
				
				if(!$insub){
					echo('<div class="main"><a class="nav-path-selected" href="' . $pageLink . '" ' . $target . '>' . $ni->getName() . '</a>');
				} else {
					echo('<a class="nav-path-selected" href="' . $pageLink . '" ' . $target . '>' . $ni->getName() . '</a>');
				}
				
			} else {
			
				if(!$insub){
					echo('<div class="main"><a href="' . $pageLink . '" ' . $target . ' >' . $ni->getName() . '</a>');
				} else {
					echo('<a href="' . $pageLink . '" ' . $target . ' >' . $ni->getName() . '</a>');
				}
				
			}	
			$lastLevel = $thisLevel;
			$i++;
			
			
		}
	}
	


?>