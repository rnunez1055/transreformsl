<?php
class Variable extends TznDb {
	const KEY_STATUS_PUB = 'STATUS_PUB';
	const KEY_STATUS_ENT = 'STATUS_ENT';
	const KEY_WEB_CONFIG = 'WEB_CONFIG';

	private $values = null;
	public static function getInstance()  {
        static $instance = null;
        if (null === $instance) {
            $instance = new Variable();
        }
        return $instance;
	}

	public function __construct() {
       	parent::TznDb("variable");
        $this ->addProperties(array(
             'id'     => 'UID'
            ,'codigo' => 'STR'
            ,'iorden' => 'NUM'
            ,'nombre' => 'STR'
            ,'valor'  => 'TXT'
            ,'activo' => 'BOL'
            ,'varname'=> 'STR'
        ));
    }

	public function init() {
		$this ->addOrder("iorden ASC");
		$this ->addWhere("activo='1'");
		$this ->loadList();
		if ($this ->rMore()) {
			while ($item = $this ->rNext())
				$this ->values[$item ->id] = $item;
		}
		return $this;
	}

	public function getValues() {
			return $this ->values;
	} 

	public function getGroupValues($key) {
		$ret = null;
		if ($this ->values == null)
			$this ->init();
		foreach ($this ->values as $value) 
			if ($value ->codigo == $key) 
				$ret[$value ->iorden] = $value;
		return $ret;
	}

	

	
}