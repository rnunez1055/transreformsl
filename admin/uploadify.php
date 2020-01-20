<?php
	$pPageIsPublic = true;
	include '../_common.php';
	
	$objPage  = new Page();
	$objImage = new File();

if (!empty($_FILES)) {
	
 	$objPage ->setUid(intval($_REQUEST[id]));
// 	if (! $objPage ->load()) {
// 		return;
// 	} else {
			$objImage ->{LBN_VAR2} = $_REQUEST["u"];
			$objImage ->uploadFile('Filedata');
			$fileName = str_replace(' ', '_', $_FILES['Filedata']['name']);
			$fileName = substr($fileName, 0, strrpos($fileName, '.'));
			
			$objImage -> title    = $fileName ;
			$objImage -> status   = LBN_ADMIN_STATUS_ON;
			$objImage -> page->id = $objPage->id;
			$objImage -> add();
// 	}
	echo "1";
}
?>