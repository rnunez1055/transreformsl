<?php	
	if($_REQUEST['lng']){
		$_SESSION['lng']=$_REQUEST['lng'];
	}else{
		if($_SESSION['lng']==''){
			$_SESSION['lng']='es';
		}
	}
	include 'include/language/'.$_SESSION['lng'].'/common.php';
?>