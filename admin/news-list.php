<?php 
$pPageIsPublic = false;
include '../_common.php';
$_SESSION["m1"]="news";
$_SESSION["m2"]='news-list';
$objName="Noticia"; $objUrl="news"; $objTitle="Noticias";
?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div id="list">
<!-- p  style="display:inline-block; float:right;"  >
			<b>Filtrar por:</b> 
			<?php 
				$tmp = new Category();
				$tmp->loadItems ( "#orderId ASC", "#parentId='0' AND #status = '" . LBN_ADMIN_STATUS_ON . "' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=1" );
				$tmp ->qSelect('categoryId', 'title', $_REQUEST["cid"], '--- Todas las categor&iacute;as ---', '', "onchange=\"window.location.href='{$_SERVER["PHP_SELF"]}?cid=' + this.value;\"");
				
				print '&nbsp;';
				
				$tmp = new Category();
				$tmp ->loadItems ( "#orderId ASC", "#status = '" . LBN_ADMIN_STATUS_ON . "' AND 
				" . (intval($_REQUEST['cid'])>0 ? "#parentId='". $_REQUEST['cid'] ."'" : "1=2") );
				$tmp ->qSelect('sId', 'title', $_REQUEST["sid"], '--- Todas las sub categor&iacute;as ---', '', "onchange=\"window.location.href='{$_SERVER["PHP_SELF"]}?sid=' + this.value + '&cid={$_REQUEST["cid"]}';\"");
			?>
		</p-->
		
<h2><?= $objTitle ?>s</h2>
<?php Common::hFrmFilterAdmin($objName, $objTitle, $objUrl) ?>
<div id="wrap-list">
<?php
	/*$objLoaded  = new Page();
	$objLoaded ->loadItems("#orderId ASC", "#status like '". $chkstatus ."%' and category.". LBN_ADMIN_CAT_EXCLUDE_1 ."='1'"); */

/*
$join = null;
if (intval($_REQUEST['cid'])>0) {
	$temp = new Category();
	$temp ->loadItems ( "#orderId ASC", "#status = '" . LBN_ADMIN_STATUS_ON . "' AND #parentId='". $_REQUEST['cid'] ."'" );
	$arr;
	while ($item = $temp ->rNext())
		$arr[] = $item ->id;
	if (is_array($arr))
		$join = join(',',$arr);
}

$objLoaded = new Page();
$objLoaded->loadItems (
		"#orderId ASC", "#status like '". $chkstatus ."%' and category.". LBN_ADMIN_CAT_EXCLUDE_1 ."='1'
				AND " . (intval($_REQUEST['sid'])>0 ? "#categoryId='". $_REQUEST['sid'] ."'" :
						(!$join && intval($_REQUEST['cid'])==0 ? "1=1" : ( !$join ? "1=2" : "
								#categoryId In ({$join})
								")
)
	));

	echo Common::hSimpleGridV2($objName, $objTitle, $objUrl,$objLoaded, true,
				array(
					'description' => true,
					'navs' => array (
						0 => array (
							'title' 	=> 'Im&aacute;genes',
							'count'     => 'gImagesCount',
							'objName' 	=> 'File',
							'more'  	=> true
 						)
					) 
				) 
			);*/

// isNoticia ---
$objLoaded  = new Noticia();
$objLoaded ->loadItems("#orderId ASC", "#status like '". $chkstatus ."%' AND #". LBN_ADMIN_PAGE_EXCLUDE_2."=1");
echo Common::hSimpleGridV2($objName, $objTitle, $objUrl,$objLoaded, true,
		array(
				'description' => true,
				'navs' => array (
						0 => array (
								'title' 	=> 'Im&aacute;genes',
								'count'     => 'gImagesCount',
								'objName' 	=> 'File',
								//							'more'  	=> false
						)
				)
		)
);
?>
</div>
</div>
<?php include("footer.php"); ?>