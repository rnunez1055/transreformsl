<?php
class Category extends Generic {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new Category() ;
		}

		return self::$myInstance;
	}


	function __construct() {
		parent::Generic('category');
		$this->addProperties(array(
				'seo'  		   => 'STR',
				'parentId'     => 'NUM',
				'allowPages'   => 'NUM'
				,'photo'   => 'STR'
				, 'isNews'   => 'NUM'

		));
	}

	function delete() {
		if (parent::delete()) {
			$tmp = new Page();
			if ($tmp ->loadItems(null, "#categoryId = {$this->id}"))
				while ($it = $tmp ->rNext())
				$it ->delete();
		}
	}

	function add() {
		$this->setNum('allowPages', 1);
		return parent::add();
	}
	
	
	function gSubCats($status=LBN_ADMIN_STATUS_ALL) {
		if ($this->id) {
			$tmp = new Category();
			$tmp->addOrder ( $tmp ->gTable().'.orderId ASC' );
			$tmp->addWhere ( $tmp ->gTable().".parentId='{$this ->id}' AND ifnull(". $tmp ->gTable().".". LBN_ADMIN_CAT_EXCLUDE_1.", 0)=0" );
			if ($status != LBN_ADMIN_STATUS_ALL) $tmp->addWhere ( $tmp ->gTable().".status='". $status  ."'" );
			$tmp->loadList ();
			return $tmp->rMore () ? $tmp : false;
		}
	}
	
	function gSubCatsCount() {
		$ret = 0;
		if ($tmp = $this->gSubCats ())
			$ret = $tmp->rCount ();
		return $ret;
	}
	
	
	
	function gItems($status=LBN_ADMIN_STATUS_ALL) {
		if ($this->id) {
			$tmp = new Page();
			$tmp->addOrder ( $tmp ->gTable().'.orderId ASC' );
			$tmp->addWhere ( $tmp ->gTable().".categoryId='{$this ->id}' AND ifnull(category.". LBN_ADMIN_CAT_EXCLUDE_1.", 0)=0 AND ifnull(".$tmp ->gTable().".". LBN_ADMIN_PAGE_EXCLUDE_1.",0)=0  " );
			if ($status != LBN_ADMIN_STATUS_ALL) $tmp->addWhere ( $tmp ->gTable().".status='". $status  ."'" );
			$tmp->loadList ();
			return $tmp->rMore () ? $tmp : false;
		}
	}
	
	function gItemsCount() {
		$ret = 0;
		if ($tmp = $this->gItems ())
			$ret = $tmp->rCount ();
		return $ret;
	}
	
	function gTree(&$cat,&$scat) {
		$ret = array();
		$tmp = new Category();
		if ($tmp ->loadItems("#orderId ASC", "#status='". LBN_ADMIN_STATUS_ON  ."' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0 AND #parentId='0'")) {
			while ($item = $tmp ->rNext()) {
				$cat[$item ->id] = array('title' => $item ->title, 'item' => $s_item) ;
				
				$s_items = new Category();
				
				if ($s_items ->loadItems("#orderId ASC", "#status='". LBN_ADMIN_STATUS_ON  ."' AND #parentId='{$item->id}'")) 
				{
					while ($s_item = $s_items ->rNext()) {
						$scat[$item ->id][$s_item ->id] = array('title' => $s_item ->title, 'url' => 'interior.php') ;
					}
				}
			}
		}
		return $ret;
	}
	
	function gFirstItem(/*$id*/) {
		/*$ret = new Page();
		$cat = new Category(); 
		$cat ->loadByKey($cat ->getIdKey(), $id);
		if ($cat ->isLoaded()) {
			if ($items = $cat ->gItems(LBN_ADMIN_STATUS_ON)) {
				$ret = $items ->rNext();
			}
		}
		return $ret;*/
		$ret = new Page();
		if ($this ->isLoaded()) {
			if ($items = $this ->gItems(LBN_ADMIN_STATUS_ON)) {
				$ret = $items ->rNext();
			}
		}
		return $ret;
		
	}  
	
	function gFirstSubItem() {
		if ($this ->id && $this ->parentId==0) {
			$tmp = new Category();
			if ($tmp ->loadItems("#orderId ASC", "#parentId='{$this ->id}' AND #status='". LBN_ADMIN_STATUS_ON ."'")) {
				return $tmp ->rNext();
			}
		}
		return false;
	}
	
	function photo() {
		if ($this ->id) {
			$obj = new Category();
			if ($this ->parentId>0) 
				$obj ->loadByKey($obj ->getIdKey(), $this ->parentId);
			else
				$obj = $this;
			if ($obj ->isLoaded())
				if ($obj ->photo)
					return $obj ->getImage("photo", 960, 120);
		}
		return false;
	}
	
}

class NewsCategory extends Category {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new Page() ;
		}

		return self::$myInstance;
	}
	function __construct() {
		return parent::__construct();
	}
	
	
	function gTree(&$cat,&$scat) {
		$ret = array();
		$tmp = new NewsCategory();
		if ($tmp ->loadItems("#orderId ASC", "#parentId>0 AND #status='". LBN_ADMIN_STATUS_ON  ."' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=1 ")) {
			while ($item = $tmp ->rNext()) {
				$cat[$item ->id] = $item ->title;
				if ($s_items = $item ->gItems(LBN_ADMIN_STATUS_ON)) {
					while ($s_item = $s_items ->rNext()) {
						$scat[$item ->id][$s_item ->id] = array('title' => $s_item ->title, 'url' => 'noticia.php') ;
					}
				}
			}
		}
		return $ret;
	}
	
	
	function gItems($status=LBN_ADMIN_STATUS_ALL) {
		
		if ($this->id) {
			$tmp = new Page();
			$tmp->addOrder ( $tmp ->gTable().'.orderId ASC' );
			$tmp->addWhere ( $tmp ->gTable().".categoryId='{$this ->id}'  " );
			if ($status != LBN_ADMIN_STATUS_ALL) $tmp->addWhere ( $tmp ->gTable().".status='". $status  ."'" );
			$tmp->loadList ();
			return $tmp->rMore () ? $tmp : false;
		}
	}
	
}

class Page extends Generic {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new Page() ;
		}

		return self::$myInstance;
	}


	function __construct() {
		parent::Generic('page');
		$this->addProperties(array(
				'seo'  		   => 'STR',
				'parentId'     => 'NUM',
				'category'     => 'OBJ',
				'featured'	   => 'NUM',
		));
	}

	function delete() {
		if ($this->id) {
			if (parent::delete()) {
				$this->query('DELETE FROM ' .$this->gTable('file').			 ' WHERE pageId='.$this->id);
				$this->query('DELETE FROM ' .$this->gTable('page').  		 ' WHERE parentId='.$this->id);
				return true;
			}
		} return false;
	}
	
	function gImages() {
		if ($this ->id) {
			$tmp = new File();
			$tmp ->addOrder($tmp ->gTable() . '.orderId ASC');
			$tmp ->addWhere($tmp ->gTable() . ".pageId='{$this ->id}' and ". $tmp ->gTable() .".isProfile=0");
			$tmp ->loadList();
			return $tmp ->rMore() ? $tmp : false;
		}
	}

	function gImagesCount() {
		$ret = 0;
		if ($tmp = $this ->gImages())
			$ret = $tmp ->rCount();
		return $ret;
	}

	function gImage($w=50,$h=50, $extra='') {
		if ($this ->id) {
			$tmp = new File();
			if ($tmp ->loadByFilter($tmp ->gTable() .".pageId='{$this ->id}' and ".$tmp ->gTable() .".isProfile=1 and ". $tmp ->gTable() .".status='". LBN_ADMIN_STATUS_ON. "'"))
				return $tmp ->getImage('target', $w, $h, TZN_FILE_UPLOAD_PATH, 100, $extra);
		}
		return false;
	}
	
	function gObjImage() {
		if ($this ->id) {
			$tmp = new File();
			if ($tmp ->loadByFilter($tmp ->gTable() .".pageId='{$this ->id}' and ".$tmp ->gTable() .".isProfile=1 and ". $tmp ->gTable() .".status='". LBN_ADMIN_STATUS_ON. "'"))
				return $tmp;
		}
		return false;
	}
	
	
	function qSelectCustom($default = true) {
		$ret = '<select name="categoryId" class="required" >' . PHP_EOL;
		$ret .= $default ? '<option value="">-- seleccione una categor&iacute;a --</option>' . PHP_EOL : '';
		$tmp = new Category();
		if ($tmp->loadItems ( "#orderId ASC", "#parentId='0' AND #status = '" . LBN_ADMIN_STATUS_ON . "' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0" )) {
			while ( $cat = $tmp->rNext () ) {
				$ret .= "<optgroup label='{$cat ->title}'>" . PHP_EOL;
				if ($items = $cat ->gSubCats()) {
					while ( $item = $items->rNext () ) {
						$ret .= "<option value='{$item ->id}' " . ($this->category ->id == $item->id ? "selected" : "") . ">{$item ->title}</option>" . PHP_EOL;
					}
				}
				$ret .= "</optgroup>" . PHP_EOL;
			}
		}
		$ret .= "</select>";
		return $ret;
	}
	
	function pCustomCategory() {
		if ($this ->id) {
			$c = new Category();
			$c ->setUid($this ->category ->parentId);
			$c ->load();
			$s = '<p class="sub-nav">&raquo; Categor&iacute;a: <strong>'. truncate_string($c ->title,11)  .'</strong></p>';
			$s .= '<p class="sub-nav">&raquo; Sub Cat: <strong>'. truncate_string($this ->category ->title, 14)  .'</strong></p>';
			return $s;
		}
	}
	
	function photo() {
		if ($this ->id) {
			$obj = new Category();
			if (!$this ->category ->{LBN_ADMIN_CAT_EXCLUDE_1} && !$this ->{LBN_ADMIN_PAGE_EXCLUDE_1N}) 
				return $this ->category ->photo();
		}
		return false;
	}
}

class Testimonio extends Page {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new Testimonio() ;
		}

		return self::$myInstance;
	}


	function __construct() {
		
		$this->addProperties(array(
				'isTestimonio'   => 'NUM'
		));
		return parent::__construct();
	}
}

class Noticia extends Page {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new Noticia() ;
		}

		return self::$myInstance;
	}


	function __construct() {

		$this->addProperties(array(
				'isNoticia'   => 'NUM'
		));
		return parent::__construct();
	}
}

class File extends Generic {
	private static $myInstance = NULL;
	public static function getInstance() {
		if (!self::$myInstance) {
			self::$myInstance = new File() ;
		}

		return self::$myInstance;
	}

	function __construct() {
		parent::Generic('file');
		$this->addProperties(array(
				'type'	  => 'STR',
				'target'  => 'STR',
				'size'    => 'STR',
				'page'    => 'OBJ',
				'isProfile'  => 'NUM',
				'var1'  => 'STR',
				'var2'  => 'STR',
		));
	}

	 
	function delete() {
		if (parent::delete()) {
			$this ->removeFile('target', false);
		}
	}
}


class Test extends TznDb {
	function __construct() {
		parent::TznDb('test');
		$this ->addProperties(array(
			'id' 	 => 'NUM',
			'nombre' => 'STR',
			'edad'   => 'NUM'
		));
	}
}



?>
