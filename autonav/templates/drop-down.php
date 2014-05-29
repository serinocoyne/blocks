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

	foreach($aBlocks as $ni) {
		$_c = $ni->getCollectionObject();
		if (!$_c->getCollectionAttributeValue('exclude_nav')) {


			$target = $ni->getTarget();
			if ($target != '') {
				$target = 'target="' . $target . '"';
			}
			if (!$containsPages) {
				// this is the first time we've entered the loop so we print out the UL tag
				echo("<ul id=\"nav\" class=\"drop clearfix\">");
			}

			$containsPages = true;

			$thisLevel = $ni->getLevel();
			if ($thisLevel > $lastLevel) {
                echo("<div class='drop'>");
				echo("<div class='drop-holder'>");
                echo("<ul>");
			} else if ($thisLevel < $lastLevel) {
				for ($j = $thisLevel; $j < $lastLevel; $j++) {
					if ($lastLevel - $j > 1) {
						echo("</li></ul></div></div>");
					} else {
						echo("</li></ul></div></div></li>");
					}
				}
			} else if ($i > 0) {
				echo("</li>");
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

			if ($c->getCollectionID() == $_c->getCollectionID()) {
				echo('<li class="active"><a class="active '.$_c->getCollectionHandle().'" ' . $target . ' href="' . $pageLink . '">' . $ni->getName() . '</a>');
			} elseif ( in_array($_c->getCollectionID(),$selectedPathCIDs) ) {
				echo('<li class=" "><a class="active '.$_c->getCollectionHandle().'" href="' . $pageLink . '" ' . $target . '>' . $ni->getName() . '</a>');
			} else {
				echo('<li><a class=" '.$_c->getCollectionHandle().' " href="' . $pageLink . '" ' . $target . ' >' . $ni->getName() . '</a>');
			}
			$lastLevel = $thisLevel;
			$i++;


		}
	}

	$thisLevel = 0;
	if ($containsPages) {
		for ($i = $thisLevel; $i <= $lastLevel; $i++) {
			if($i < $lastLevel)
				echo("</li></ul></div><div class='drop-b'>&nbsp;</div></div>");
			else
				echo("</li></ul>");
		}
	}

?>