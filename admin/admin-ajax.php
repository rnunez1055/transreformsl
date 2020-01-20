<?php
$action = strtolower($_REQUEST['action']); if (! $action) return;
$pPageIsPublic = true;
include '../_common.php';


if ($action == 'search') {
	$q = strtolower($_GET["q"]); 
	if (!$q) return;
	
	$items = prepareArray($_GET['object']);
	
	foreach ($items as $key=>$value) {
		if (strpos(strtolower($key), $q) !== false) {
			echo "$key|$value\n";
		}
	}
}

if ($action == 'ordering-records') {
	$updateRecordsArray = $_POST['recordsArray'];
	$class = $_POST['class'];
	
	if (! class_exists($class)) {
		print 'class no found!';
		return;
	} else {
		$listingCounter = 1;
		foreach ($updateRecordsArray as $recordIDValue) {
			$obj = new $class;
			$obj ->getConnection();
			$query = "UPDATE ". $obj ->gTable() .
					 " SET orderId = " . $listingCounter . 
					 " WHERE ". $obj ->getIdKey() ." = " . $recordIDValue;
			$obj ->query($query);
			$listingCounter ++;
		}	
	}
}

if ($action == 'custom-field-add') {
	$id    = intval($_POST['id']);
	$page  = intval($_POST['page']);
	
	$obj = new Custom_Field();
	$obj ->setAuto($_POST);
	if ($id == 0){
		$obj ->page->id = $page;
		$obj ->add();
	} else {
		$obj ->getConnection();
		$obj ->setUid($id);
		$obj ->update('name,value');
	} ?>
	<tr>
		<td ><?php $obj ->qText('name'); ?>
			<p class="itemsubnav" style="background-color:transparent;" >
				<a title="Edit" href="javascript:void(0)" onclick="insertUpdate(this)">Update</a>
				<a id="delrow" title="Delete"  href="javascript:void(0)">Delete</a>
			</p>
		</td>
		<td> <?php $obj ->qTextArea('value');
				   $obj ->qHidden('id') ?></td>
	</tr>	
<?php
}

if ($action == 'custom-field-del') {
	$id  = intval($_POST['id']);
	$obj = new Custom_Field();
	$obj ->setUid($id);
	if (! $obj ->load()) {
		return;
	} else {
		print_r($obj ->delete());	
	}
}

if ($action == 'file-delete') {	
	$files = $_POST['files'];	
	foreach($files as $file) {
		$objFile = new File();
		if (! $objFile->loadByKey($objFile->getIdKey(), $file)) {
			continue;
		} else {
			if ($objFile->delete()) $objFile ->removeFile('target', false);
		}
	}
	echo "items has been removed.";
}

if ($action == 'main-img') {
	$id  = intval($_POST['rdmain']);
	$pid  = intval($_POST['pid']);
	$obj = new File();
	$obj ->setUid($id);
	if (! $obj ->load()) {
		die("Error");
	} else {
		$obj ->getConnection();
		$query = "UPDATE ". $obj ->gTable() .
		" SET isProfile = 0 WHERE pageId='{$pid}'";
		$obj ->query($query);
		$query = "UPDATE ". $obj ->gTable() .
		" SET isProfile = 1 WHERE pageId='{$pid}' And ".$obj ->getIdKey()."={$obj ->id}";
		$obj ->query($query);
		die("Imagen principal seleccionada.");
	}
}

if ($action == 'page-delete') {
	$i = 0;	
	$items = $_POST['pageId'];	
	foreach($items as $item) {
		$objItem = new Page();
		if (! $objItem->loadByKey($objItem->getIdKey(), $item)) {
			continue;
		} else {
			$i++;
			$objItem->delete();
		}
	}
	echo "$i page".($i>9 ? "s" : "")." has been deleted.";
}

if ($action == 'item-delete') {
	$items = $_POST['items'];
	$class = $_POST['class'];
	$i=0;
	if (! class_exists($class)) {
		return;
	} else {
		foreach($items as $item) {
			$objItem = new $class;
			if (! $objItem->loadByKey($objItem->getIdKey(), $item)) {
				continue;
			} else {
				$i++;
				$objItem ->delete();
			}
		}
		echo "$i item".($i>1 ? "s" : "")." has been deleted.";
	}
}

if ($action == 'geo') {
	$tmp = Building::getInstance();
	$tmp ->setUid(base64_decode($_POST['id']));
	if (!$tmp ->load()) {
		die("id invalid");
	} else {
		$tmp ->getConnection();
		$tmp ->setStr('lat', $_POST['lat']);
		$tmp ->setStr('lng', $_POST['lng']);
		$tmp ->update('lat,lng');
		die("has been updated.");
	}
}

if ($action == 'get-param' ) {
	$tmp = Building::getInstance();
	$tmp ->setUid($_POST['id']);
	if ($tmp ->load()) {
		$data = array();
		switch ($_POST['type']) {
			case "sys":
				$data['param1'] = $tmp ->param1;
				$data['param2'] = $tmp ->param2;
				$data['param3'] = $tmp ->param5;
				print json_encode($data);     
				break;
			case "rental": 
				if ((!$tmp ->param3 && !$tmp ->param4 && !$tmp ->param6) && ($tmp ->param1  || $tmp ->param2 || $tmp ->param5  ) ) {
					$data['param1'] = $tmp ->param1;
					$data['param2'] = $tmp ->param2;
					$data['param3'] = $tmp ->param5;
				} else {
					$data['param1'] = $tmp ->param3;
					$data['param2'] = $tmp ->param4;
					$data['param3'] = $tmp ->param6;
				}
				print json_encode($data);
				break;
		}
	}
}

/* private functions   */
function prepareArray($items) {
	$array  = array();
	if (class_exists($items)) {
		$obj   = new $items;				
		$key   = 0;
		$value = 0;
		switch (get_class($obj)) {
			case "Custom_Field" :
				$obj ->addGroup('name');
				$value = "name";
				break;
			case "File" :
				$obj ->addOrder($obj ->gTable().'.type');
				$obj ->addWhere($obj ->gTable().'.status = "Live"');				
				$value = "title";
				$key   = "target";
				break;
		}
		
		$obj ->loadList();
		while($objItem = $obj ->rNext())
			$array [$objItem ->$value] = $key ? $objItem->$key :  $key++;
	} else {			
	}
	return $array;
}
	
?>