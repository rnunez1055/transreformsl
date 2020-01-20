<?php 
session_start();
$message="";
$message_mode=0;
$objUser = new Person();
// === USER LOGIN ===================================================
if (!$pPageIsPublic) {
	if ($pUserIsLogged = $objUser->isLogged($pLevel)) {	
		if ($objUser->load() != $_SESSION["tznUserId"]) {
			// user is logged in but user ID is not same in session and in cookie
			$objUser->logout();
			$pUserIsLogged = false;		
			Tzn::redirect('login.php');
		}
	} else {
		if ($pUserIsLogged = $objUser->checkAutoLogin()) {
			// user is automatically logged in
		} else {
			// user is not logged in and tries to access private page
			Tzn::redirect('login.php');
		}
	}
}

$config = array();
$config['uiColor'] = '#cccccc';
$config['extraPlugins'] = 'autogrow';
$config['toolbar'] = array(array('Undo','Redo','-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Bold', 'Italic', 'Underline', 'Strike','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','BulletedList','FontSize','Format','-','RemoveFormat','-','Image','Link', 'Unlink','-','HorizontalRule' ,'-', 'Source','ShowBlocks'));
$config['width']= 660;
$config['resize_maxWidth']= 660;
$config['resize_minWidth']= 660;

/*seo generic*/
function initSEO(&$seo) {
	if (!$seo ->metaTitle || (!$seo ->metaDescription || !$seo ->metaKeyword) ) {
		$seo ->metaTitle = !$seo ->metaTitle ? "mudanzas en barcelona | mudanzas económicas | mudanzas en barcelona baratas | mudanzas internacionales barcelona | mudanzas y guardamuebles barcelona | empresas de mudanzas en barcelona" : $seo ->metaTitle;
		$seo ->metaDescription = !$seo ->metaDescription ? "mudanzas en barcelona | mudanzas económicas | mudanzas en barcelona baratas | mudanzas internacionales barcelona | mudanzas y guardamuebles barcelona | empresas de mudanzas en barcelona" : $seo ->metaDescription;
		$seo ->metaKeyword = !$seo ->metaKeyword ? "mudanzas en barcelona | mudanzas económicas | mudanzas en barcelona baratas | mudanzas internacionales barcelona | mudanzas y guardamuebles barcelona | empresas de mudanzas en barcelona" : $seo ->metaKeyword;
	}
}
?>