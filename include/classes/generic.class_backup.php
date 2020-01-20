<?php
class Generic extends TznDb {
	public $_arrStatus  = array('Activo' => LBN_ADMIN_STATUS_ON, 'Inactivo' => LBN_ADMIN_STATUS_OFF);
    function Generic($table) {
		$this->addProperties(array(
			'id'				=> 'UID',
			'date_create'       => 'DTE',
			'date_update'      	=> 'DTM',
			'id_person_create'	=> 'NUM',
			'title'				=> 'STR',
			'description'      	=> 'TXT',
			'status'			=> 'STR'
		));
		
		$this->_table = $table;
	}
	
	function load() {
		if ($this ->_maxAdded>0 && !$this ->id)
			$this ->topAllowed();
		return parent::load();
	}
	
	function add() {
		if ($this ->_maxAdded>0)
			$this ->topAllowed();
		$this->setDtm('date_create', 'NOW');
		return parent::add();
	}
	
	function update($fields=null,$filter=null) {
		$this->setDtm('date_update','NOW');
		return parent::update($fields,$filter);
	}
	
	function loadItems($orderBy = null, $filter = null) {
		$orderBy = empty($orderBy) ? $this ->getIdKey() ." DESC" 	  
								   : str_replace("#", $this ->gTable(). ".", $orderBy) ;
		$filter  = empty($filter)  ? $this ->gTable() .".status = '". LBN_ADMIN_STATUS_ON  ."'" 
								   : str_replace("#", $this ->gTable(). ".", $filter) ;
		$this 	 ->addOrder($orderBy);
		$this 	 ->addWhere($filter);
		$this 	 ->loadList();
		return $this->rMore();
	}
	
	function qEditor($name, $config = array()) {
		
		$default_config = array(
			'uiColor' 		  => '#cccccc', 
			'extraPlugins'    => 'autogrow', 
			'toolbar' 		  => CKEDITOR_TOOLBAR_BASIC,
			'resize_maxWidth' => "98%",
			'width' 		  => "98%"
		
		);
		$config = array_merge($default_config, $config);		
		
		
		switch (strtolower($config['toolbar'])) {
			case "custom" : $config['toolbar'] = array(array('Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','Source')); break;
			case "multimedia" : $config['toolbar'] = array(array('Undo','Redo','-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Bold', 'Italic', 'Underline', 'Strike','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','BulletedList','-','RemoveFormat','-','Image','Link', 'Unlink','-','HorizontalRule' ,'-', 'Source','ShowBlocks', '-','TextColor','BGColor','FontSize','Format','Styles')); 
			default: break;  
		}
		
		require_once CKEDITOR_PATH.'ckeditor.php';
		require_once CKFINDER_PATH.'ckfinder.php';
		
		$CKEditor = new CKEditor(CKEDITOR_PATH);
		CKFinder::SetupCKEditor( $CKEditor, CKFINDER_PATH ) ;
		return $CKEditor->editor($name, $this ->_value($name), $config);
	}
	
	function arrayToSelect($_arr = array(), $name, $default = null, $optional = false, $style='tznFormSelect', $xtra='') {
		$objCollection = new TznCollection($_arr);
		return $objCollection->qSelect($name, $default, $optional, $style, $xtra);
	}
	
	
	static function gSelect($objClass, $keyval = '', $default = '', $nochoice = '', $style = '', $extra = '', $forceName = false) {
		if (! is_object($objClass)) {
			return false;
		}
		
		if (! $objClass ->isLoaded()) $objClass ->loadItems();
		return $objClass ->qSelect(! $forceName ? $objClass ->_table."Id" : $forceName, ! $keyval ? 'titulo' : $keyval, $default, $nochoice, $style, $extra);
	}
	
	
	function pFile($name = 'ifile', $href = "", $field = 'target', $type='img', $req = true) {
		if ($this ->$field) {
			$p  = '<div class="img-border" style="width:130px;" >';
			switch ($type) {
				case "img" : $p .= $this ->getImage($field); break;
				default    : $p .= $this ->$field . "<br/>"; break;
			}
			$p .= "<a href='$href' title='delete file' >delete file</a></div>";
			print $p;
		} else {
			$req = $req === false ? '' : "required"; 
			$this ->qFile($name, '', '', 'class="'.$req.'"');
		}
	}
	
	    
/*	function uploadFile($inputFile = 'ifile', $field = 'target'){
    	$archivo = new TznFile();
    	if (is_uploaded_file($_FILES[$inputFile]['tmp_name'])) {
    		list($width, $height) = getimagesize($_FILES[$inputFile]['tmp_name']);
			$thumb = ($width > 600) ? array(800,600) : '';
			$this ->$field = $archivo ->upload($inputFile, $thumb) 
										->fileName;
    		return true;
    	} else {
    		return false;
    	}
    }
*/
/*    function uploadFile($field,$c='root_file'){
    	$archivo = new TznFile();	
    	if($archivo ->upload($field)){
				$archivo -> save();
				$this->setStr($field,'');
				$this->$c=$archivo->fileName;					
				return true;
    	}else{
    		return false;
    	}
    }
*///<<< fixed.       
    
    function uploadFile($inputFile = 'ifile', $field = 'target'){
    	$archivo = new TznFile();
    	if (is_uploaded_file($_FILES[$inputFile]['tmp_name'])) {
    		//die(var_dump($archivo ->upload($inputFile, 800, 600, TZN_FILE_UPLOAD_PATH)));
    		//if($archivo ->upload($inputFile, 800, 600, TZN_FILE_UPLOAD_PATH)) {
    		//if($archivo ->upload($inputFile, 1024, 768, TZN_FILE_UPLOAD_PATH)) {
		    if($archivo ->upload($inputFile, 1280, 369, TZN_FILE_UPLOAD_PATH)) {
    			$archivo ->save();
    			$this	 ->setStr($inputFile, '');
    			$this	 ->$field = $archivo->fileName;
    			//$this	 ->type   = @mime_content_type(realpath(TZN_FILE_UPLOAD_PATH).DIRECTORY_SEPARATOR.$archivo->fileName);
    			$this	 ->size   = $archivo->fileSize;
    			return true;
    		}
    		return false;
    	} else {
    		return false;
    	}
    }
    
    
    
	function getImage($field = 'target', $w=130, $h=96, $folder=TZN_FILE_UPLOAD_PATH, $q=90, $extra=""){
    	$str='<img width="'.$w.'" height="'.$h.'" src="'. PRJ_ROOT_PATH  .'thumb.php?src=';
    	$str2='&w='.$w.'&h='.$h.'&zc=1&q='.$q.'" alt="" '.$extra.' />';
    	if(strlen($this ->$field) > 0){
    		$str1=$folder.$this ->$field;
    	}else{
    		$str1='../images/no-image.jpg';
    	}
    	return $str.$str1.$str2;
    }
    
    /**/
    function gMainImageOfPage( $w=130, $h=96, $extra="", &$path = "") {
    	if ($this ->id) {
    		$tmp = new File ();
    		$tmp->loadByFilter ( $tmp->gTable().".pageId='{$this ->id}' and ". $tmp->gTable(). ".isProfile=1 and ". $tmp->gTable(). ".status='" . LBN_ADMIN_STATUS_ON . "'" );
    		$path = $tmp ->target;
    		return $tmp->getImage ( 'target', $w, $h, TZN_FILE_UPLOAD_PATH, 100, $extra );
    	}
    }
    
    function gImagesPath() {
    	if ($this->id) {
    		$tmp = new File ();
    		$tmp->addOrder($tmp ->gTable(). ".isProfile DESC, ". $tmp ->gTable(). ".orderId ASC");
    		$tmp->addWhere( $tmp ->gTable().".pageId='{$this ->id}' and ".$tmp ->gTable().".status='" . LBN_ADMIN_STATUS_ON . "'" );
    		$tmp->loadList();
    		return $tmp ->rMore() ? $tmp : new File();
    	}
    }
    
    function pGallery() {
    	if ($this ->id) {
    		if ($items = $this ->gImagesPath()) {
    			print '<style>@import url(css/plugins/jquery.shadowbox.css);</style>';
    			print '<script type="text/javascript" src="js/plugins/jquery.shadowbox.js"></script>';
    			print '<script>var LBN_PATH_SWF=""; Shadowbox.init();</script>';
    			print '<style>
				  .gen-gallery {list-style:none; margin:0;padding:0; clear:both;}
				  .gen-gallery li { float:left; padding:4px;}
				  .gen-gallery li a img { border:2px solid #ddd;  }
				</style>';
    			
    			print '<ul class="gen-gallery">';
    			while ($item = $items ->rNext()) {
//    				if ($item ->isProfile == 1) continue;
    				print '<li><a rel="shadowbox[items]" href="'. TZN_FILE_UPLOAD_PATH .$item ->target.'">
    						'. $item ->getImage('target', 208, 180) .'
    						</a></li>';
    			}
    			print '</ul>';
    		}
    	}
    }
    
    /**/
    
    
    
	function removeFile($field = 'target', $update = true){
    	if ($this->id) {
    		$archivo = new TznFile();    	
	    	$archivo ->folder = $this->_folder;
			$archivo ->delete($this->$field);
			
			if ($update) {
				$this	 ->setStr($field, '');
				$this	 ->update("$field");				
			}
    	}
    }
    
	function filterById($id, $firstDefault = true) {
		$return = $firstDefault ? $this->rNext() : false;
		$this->rReset();
		while($objItem = $this->rNext()) {
			if ($objItem->id == $id ) {
				$return = $objItem;
				break;
			}
		}
		return $return;	
	}
	
	function printSEO() {
		$this ->seo = $this ->isLoaded() ? json_decode($this ->seo) : NULL;
		?>
	    	<tr >
				<td width="100%"  colspan="2" class="toggle"  ><div><span onclick="$('table#toggle').toggle();"  >Click here to improve pages rank in search engines (SEO)</span>
					<table cellpadding="0" cellspacing="0" class="table-form" width="100%" id="toggle" style="display: block;"       >
						<tr>
							<th width="12%"  >Meta Title: </th>
							<td width="88%" >
								<textarea style="width: 544px; height: 40px;" name="metaTitle"><?php echo $this ->seo ->metaTitle?></textarea>
							</td>
						</tr>
						<tr>
							<th>Meta Description: </th>
							<td>
								<textarea style="width: 544px; height: 40px;" name="metaDescription"><?php echo $this ->seo ->metaDescription ?></textarea>
							</td>
						</tr>
						<tr>
							<th>Meta Keywords: </th>
							<td>
								<textarea style="width: 544px; height: 40px;" name="metaKeyword"><?php echo $this ->seo ->metaKeyword ?></textarea>
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
	    	
<?php
	    } //end prin seo
	
	function topAllowed() {
		if ($this) {
			$clon =& $this;
			//$clon ->addWhere($clon ->gTable().".estado='". LBN_ADMIN_STATUS_ON ."'");
			$clon ->loadList();
			if ($clon ->rMore()) {
				if ($clon ->rCount() >= $clon ->_maxAdded) {
					$redirect = array('url' => PRJ_ADMIN_PATH."index.php", 'msg' => 'Error en archivo de listado.');
					if (basename(dirname($_SERVER["SCRIPT_FILENAME"])) == PRJ_ADMIN_DIRNAME) {
						preg_match("/-add.php/",$_SERVER["SCRIPT_FILENAME"], $f);
						if (sizeof($f)>0) {
							$flist = PRJ_ADMIN_PATH. str_replace($f[0], "", basename($_SERVER["SCRIPT_FILENAME"])) . "-list.php";
							if(file_exists($flist)) {
								$redirect =  array('url' => $flist, 'msg' =>  "El l&iacute;mite de registros es: '{$this ->_maxAdded}'.");
							}
						}
					}
					Tzn::redirect($redirect['url'], $redirect['msg'], 1);
				}
			}
		}
	}
	
	/* v3.0 */
	function ofArray2ArrayTree($items = array(), $parent_id = 0) {
		$children = array();
	
		foreach($items as $item) {
			if ($item['parentId'] == $parent_id) {
				$children[$item[$this ->getIdKey()]] = $item;
				$children[$item[$this ->getIdKey()]]['children'] = $this->ofArray2ArrayTree($items, $item[$this ->getIdKey()]);
			}
	
		}
	
		return($children);
	}
	
	function getRankOptions($items = array(), $selected = '', $step) {
		foreach ($items as $item) {
			echo "<option value=\"". $item[$this ->getIdKey()]."\" ";
			echo (($selected == $item[$this ->getIdKey()]) ? "selected=true " : "").">";
			echo str_repeat('&nbsp;', $step * 3).$item['title'];
			if (count($item['children']) > 0)
				$this ->getRankOptions($item['children'], $selected,  $step+1);
			echo "</option>";
		}
	}
		
	function getSelectWithRankOptions($selected, $name='parentId') {
		if (! $this->rMore()) {
			return false;
		} else {
			echo "<select name='{$name}'>\n";
			echo "<option value=''> -- seleccione una categor&iacute;a -- </option>\n";
			$this ->getRankOptions(
					$this ->ofArray2ArrayTree($this ->RowsArray(MYSQL_ASSOC)), $selected, 0);
			echo "</select>";
		}
	}
	
	
	function getUlWithRankList($jsSorter=true) {
		if (! $this->rMore()) {
			return false;
		} else {
			echo $jsSorter ? "<script type='text/javascript'>\$(document).ready(function() {\$('ul.tree-list').admin_sortable('". ucfirst(str_replace('Id', "", $this ->getIdKey())) ."');});</script>" : "";
			echo "<ul class='tree-list' >\n";
			$this ->getRankList(
					$this ->ofArray2ArrayTree($this ->RowsArray(MYSQL_ASSOC)));
			echo "</ul>";
		}
	}
	
	
	function getRankList($items = array()) {
		foreach ($items as $item) {
			echo "<li id='recordsArray_". $item[$this ->getIdKey()] ."' class='". (($item['status'] == LBN_ADMIN_STATUS_OFF) ? 'draft' : '') ."' ><label for='". $item[$this ->getIdKey()] ."'>
			<input class='". (count($item['children'])>0 ? "parent" : "")  ."'         id='". $item[$this ->getIdKey()] ."' type='checkbox' name='items[]' value='". $item[$this ->getIdKey()] ."'/> ".$item['title'];
			echo "<span class='nav-item' >";
			echo "<a title='edit page' href='". /*str_replace('Id', "", $this ->getIdKey())*/ strtolower(get_class($this)) ."-add.php?id=".$item[$this ->getIdKey()]."'><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_EDIT ."'/> </a>";
			echo "<a title='remove item' href='javascript:void(0);' id='del'  ><img width='16px' height='16px' src='". LBN_ADMIN_IMAGES_ICONS_DELETE ."'/> </a>";
			echo "</span></label>";
				
			if (count($item['children']) > 0) {
				echo "<ul class='tree-list' id='p".$item[$this ->getIdKey()]."'>";
				$this ->getRankList($item['children']);
				echo "</ul>";
			}
			echo "</li>\n";
		}
	}
	
}

?>
