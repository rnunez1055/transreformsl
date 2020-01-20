<?php

class Person extends TznUser{
    function Person() {
        parent::TznUser('person');
        $this->addProperties(array(
             'email'             => 'STR',
             'is_admin'          => 'NUM',
             'active'            => 'NUM',
             'firstname'         => 'STR',
             'lastname'          => 'STR',
             'shortname'         => 'STR',
             'title'             => 'STR',
             'birthday'          => 'DTE',
             'lastactivity'      => 'STR',
             'mark'              => 'NUM',
             'schedule'          => 'NUM',
             'avatar'            => 'STR'
        ));
    }
    
	function getShortName($default='') {
		$str = $this->shortname;
		return ($str)?$str:$default;
	}
	
	function getAvatar($default='') {
		if ($this->avatar != ''){
       		$str = "thumb.php?src=images/avatar/".$this->avatar."&w=16&h=16&zc=1";
      	}else{
			$str = "thumb.php?src=images/avatar/noimage.png&w=16&h=16&zc=1";  
      	}		
		$str = $this->firstName.','.$str;		
		return ($str)?$str:$default;
	}
	
	function getFullName() {
		$str = $this->firstName.' '.$this->lastName;
		return $str;
		
	}
	function check($pass1, $pass2, $force=false) {
		if ($this->email) {
            $check1 = !$this->checkUnique('email',$this->email);
            if (!$check1) {
                $this->e('email','An account already exists with this address');
            }
        } else {
            $check1 = true;
        }		
		// check unique login
        $check2 = $this->setLogin($this->username);
        if ($this->enabled || $force) {
            // check and set valid password
            $check3 = $this->setPassword($pass1, $pass2, false, $this->isLoaded());
        } else {
            $check3 = true;
        }
		if ($check1 && $check2 && $check3) {
			return true;
		} else {
			// failed first tests, do not save
			return false;
		}
	}
}
?>