<?php
class Common {
	private static $instance;
	public function getInstance() {
		if($instance === null) {
			$instance = new Common();
		}
		return $instance;
	}
	
	static function hFrmFilterAdmin($objName, $objTitle, $objUrl, $paramsUrl = null) {  ?>
<script type="text/javascript">
$(document).ready(function() {
	$('#select-all').checkedToggle("ul.tree-list", "<?= $objName ?>");
});
</script>
<form method="post" name="frmFilter" >
<ul id="subnav" style="padding-top:0; padding-bottom: 0; " >
<li ><label for="select-all" class="first-check" ><input type="checkbox" name="select-all" id="select-all" />Seleccionar Todos</label></li>
<li ><a href="javascript:void(0);" id="remAll"  >Eliminar Seleccionados</a></li>
<li ><?php include(PRJ_ADMIN_PATH."filter.php"); ?></li>
	<li class="noborder" >
		<a class="add" href="<?= $paramsUrl ? Tzn::concatURL($objUrl."-add.php", $paramsUrl) : $objUrl."-add.php";   ?>" > Agregar <?= $objTitle ?> </a>
	</li>
</ul>
</form>
<?php 	
	}

	/* how use?
	 * echo Common::hSimpleGrid($objName, $objTitle, $objUrl,$objLoaded, false,
				array(
					'description' => true,
					'navs' => array(
						0 => array (
							'title' 	=> 'Zona',
							'count'     => '10',
							'url-count' => 'http://www.google.com',
							'url-new'   => 'http://www.youtube.com'
						),
						1 => array (
							'title' 	=> 'Zona1',
							'count'     => '101',
							'url-count' => 'http://www.google.com',
							'url-new'   => 'http://www.youtube.com'
						)
					) 
				) 
			);
	 * 
	 * */
	static function hSimpleGrid($objName, $objTitle, $objUrl, $objLoaded, $jsSorter=true, $extra=null) {
		$ret = "";
		if (is_object($objLoaded)) {
			if (method_exists($objName,'rMore')) {
				if ($objLoaded ->rMore()) {
					$ret = $jsSorter ? "<script type='text/javascript'>\$(document).ready(function() {\$('ul.tree-list').admin_sortable('{$objName}');});</script>" : "";
					$ret .= "<ul class='tree-list' >\n";
					while ($item = $objLoaded ->rNext()) {
						$ret .=  "<li id='recordsArray_". $item ->id ."' class='". (($item ->status == LBN_ADMIN_STATUS_OFF) ? 'draft' : '') ."' ><label for='". $item ->id ."'>
								  	<input id='". $item ->id ."' type='checkbox' name='items[]' value='". $item ->id ."'/> ".$item ->title."<br/>";
						if (is_array($extra)) {
							if (array_key_exists('description', $extra) ) 
								if ($item ->getStr($item ->descripcion))
									$ret .= '<p class="desc"> '. truncate_string($item ->getStr($item ->descripcion), 100)  .' </p> ';
							if (array_key_exists('navs', $extra) ) {
								if (is_array($extra["navs"])) {
									foreach ($extra["navs"] as $nav) {
										if (array_key_exists('title', $nav) && array_key_exists('count', $nav) && array_key_exists('objName', $nav)) {
											$ret .= "<p class='sub-nav'>&raquo; {$nav["title"]}: <a href='".
														PRJ_ADMIN_PATH. str_replace("-list.php", "", basename($_SERVER["SCRIPT_FILENAME"])) . "-add.php?id={$item ->id}&tab=". strtolower($nav["objName"])
											    	."'>(". $item ->$nav["count"]() .")</a> | <a href='". PRJ_ADMIN_PATH.strtolower($nav["objName"])."-add.php?pid={$item ->id}"."' >agregar ". strtolower($nav["objName"]) ."</a>   </p>".PHP_EOL;
										}
									}
								}
							}
						}
						
						
						
						$ret .= "<span class='nav-item' >";
						$ret .= "<a title='modificar {$objTitle}' href='{$objUrl}-add.php?id=".$item ->id."'><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_EDIT ."'/> </a>";
						$ret .= "<a title='eliminar {$objTitle}' href='javascript:void(0);' id='del'  ><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_DELETE ."'/> </a>";
						$ret .= "</span></label>";
						$ret .= "</li>\n";
					}
					$ret .= "</ul>";
				}
			}
		}
		return $ret;
	}
	
	static function hSimpleGridV2($objName, $objTitle, $objUrl, $objLoaded, $jsSorter=true, $extra=null) {
		$ret = "";
		if (is_object($objLoaded)) {
			if (method_exists($objName,'rMore')) {
				if ($objLoaded ->rMore()) {
					$ret = $jsSorter ? "<script type='text/javascript'>\$(document).ready(function() {\$('ul.tree-list').admin_sortable('{$objName}');});</script>" : "";
					$ret .= "<ul class='tree-list' >\n";
					while ($item = $objLoaded ->rNext()) {
						$ret .=  "<li id='recordsArray_". $item ->id ."' class='". (($item ->status == LBN_ADMIN_STATUS_OFF) ? 'draft' : '') ."' ><label for='". $item ->id ."'>
						<input id='". $item ->id ."' type='checkbox' name='items[]' value='". $item ->id ."'/> ";
						$ret .= '<table class="item">
									<tr><td width="50"><div class="photo">'. $item ->gImage() .'</div> </td>
										<td><table class="desc"><tr><td>'. truncate_string($item ->title, 60) ."</td></tr>". PHP_EOL;
						if (is_array($extra)) {
							if (array_key_exists('description', $extra) )
								if ($item ->getStr($item ->description))
								$ret .= '<tr><td><i>'. truncate_string($item ->getStr($item ->description), 90)  .'</i></td></tr>';
							if (array_key_exists('navs', $extra) ) {
								if (is_array($extra["navs"])) {
									foreach ($extra["navs"] as $nav) {
										if (array_key_exists('title', $nav) && array_key_exists('count', $nav) && array_key_exists('objName', $nav)) {
											$ret .= "<tr><td><p class='sub-nav'>&raquo; {$nav["title"]}: <a href='".
													PRJ_ADMIN_PATH. str_replace("-list.php", "", basename($_SERVER["SCRIPT_FILENAME"])) . "-add.php?id={$item ->id}&tab=". strtolower($nav["objName"])
													."'>(". $item ->$nav["count"]() .")</a> | <a href='". PRJ_ADMIN_PATH.strtolower($nav["objName"])."-add.php?pid={$item ->id}"."' >agregar</a></p>";
											$ret .= array_key_exists('more', $nav) ? (method_exists($item, 'pCustomCategory') ? $item ->pCustomCategory() : '') : '';													
											$ret .=  "</td></tr>".PHP_EOL;
										}
									}
								}
							}
						}
						$ret .= "</table><span class='nav-item' >";
						$ret .= "<a title='modificar {$objTitle}' href='{$objUrl}-add.php?id=".$item ->id."'><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_EDIT ."'/> </a>";
						$ret .= "<a title='eliminar {$objTitle}' href='javascript:void(0);' id='del'  ><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_DELETE ."'/> </a>";
						$ret .= "</span>";
						$ret .= "</td></tr></table></label>";
						$ret .= "</li>\n";
					}
					$ret .= "</ul>";
				}
			}
		}
		return $ret;
	}
}
?>