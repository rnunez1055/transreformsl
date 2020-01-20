<?php
function gMenuFooter() {
	$ret = "";
	$cats = new Category();
	if ($cats ->loadItems("#orderId ASC", "#status='". LBN_ADMIN_STATUS_ON  ."' AND #parentId=0")) {
		$len = $cats ->rCount();
		$ret .= '<div class="footer_menu">'. PHP_EOL;
		while ($cat = $cats ->rNext()) {
			$first = null;
			$sm = gSubMenu($cat, $first);
			$len--;
			$ret .= '<a href="'. (!empty($sm) ? "category.php?id={$first ->id}" : "category.php?id={$cat ->id}") .'"><div class="footer_link">'. strtoupper($cat ->title) .'</div></a>';
			$ret .= ( $len > 0 ? '<div class="sep_fot_link">|</div>' : ""). PHP_EOL;
		}
		$ret .= '</div>';
	}
	return $ret;
}

function gMenu() {
	$ret = "";
	$cats = new Category();
	if ($cats ->loadItems("#orderId ASC", "#status='". LBN_ADMIN_STATUS_ON  ."' AND #parentId=0")) {
		$ret .= '<ul id="topnav">'. PHP_EOL;  
		while ($cat = $cats ->rNext()) {
			$first = null;
			$sm = gSubMenu($cat, $first);
			$ret .= '<li><a href="'. (!empty($sm) ? "category.php?id={$first ->id}" : "category.php?id={$cat ->id}") .'">'. strtoupper($cat ->title) .'</a>';
			$ret .= $sm. "</li>". PHP_EOL;
		}
		$ret .= '</ul>
				<div class="clear"></div>
				<div class="franja_buscar"></div>';
	}
	return $ret;
}  

function gSubMenu($cat, &$first=null) {
	$ret = "";
	if ($cat ->id) {
		$scats = new Category();
		if ($scats ->loadItems("#orderId ASC", "#status='". LBN_ADMIN_STATUS_ON  ."' AND #parentId='{$cat ->id}'")) {
			$ret .= "<span>". PHP_EOL;
			$len = $scats ->rCount();
			$first = $scats ->rNext();
			$scats ->rReset();
			while ($scat = $scats ->rNext()) {
				$len--;
				$ret .= "<a href=\"category.php?id={$scat ->id}\" >". strtoupper($scat ->title) ."</a>" . ( $len > 0 ? " | " : "");
			}
			
			$ret .= "</span>". PHP_EOL;
		}
	}
	return $ret;
}