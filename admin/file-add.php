<?php  
$pPageIsPublic = false;
include '../_common.php';
switch(intval($_REQUEST["u"])) {
	case 1:
		$u = LBN_VAR2_BANNER;break;
	case 2:
		$u = LBN_VAR2_GALLERY;break;
	default:
		$u = 0;
		
}
//$u = intval($_REQUEST["u"]) == LBN_VAR2_BANNER ? LBN_VAR2_BANNER : (intval($_REQUEST["u"]) == LBN_VAR2_GALLERY) ? LBN_VAR2_GALLERY : 0;

if (!$u) {
	$_SESSION["m1"]	= "content";
	$_SESSION["m2"] = 'page-list';	
} else {
	if ($u == LBN_VAR2_BANNER) {
		$_SESSION["m1"]	= "banner";
		$_SESSION["m2"] = 'banner-list';
	} else {
		$_SESSION["m1"]	= "gallery";
		$_SESSION["m2"] = 'gallery-list';
	}
}

$objName="File"; $objUrl="page"; $objTitle="Imagen";

$pTitle  = "Nueva {$objTitle}";
$pButton = 'Guardar';
$action  = 'add';
$id 	 = intval($_REQUEST['id']);
$pid 	 = intval($_REQUEST['pid']);
$seo	 = NULL;

$tmp = Page::getInstance();
$tmp ->setUid($pid);
//if (!$tmp ->load()) Tzn::redirect("page-add.php");;

 
   

$objLoad = new File();
$objLoad ->setUid($id);
if ($objLoad ->load()) {
	$pTitle  = "Editar {$objTitle}";
	$pButton = 'Actualizar';
	$action  = 'edit';
	$pid = $tmp ->id;
	
	if ($_GET['action']=='del') {
		$objLoad ->removeFile();
		$message = "Imagen ha sido eliminado.";
	}
}

if (isset($_POST['submit'])) {
	$objLoad ->setAuto($_POST);
	$objLoad ->page ->id = $_POST["pid"];
	$objLoad ->{LBN_VAR2} = $u;
	$objLoad ->uploadFile();
	if ($_POST['action'] == 'edit') {
		$objLoad ->getConnection();
		$objLoad ->setUid($id);
		$objLoad ->update();
		if (!$pid) Tzn::redirect("banner-list.php", "{$objTitle} ha sido actualizado.");
		Tzn::redirect("page-add.php?id={$objLoad ->page ->id}&tab=file", "{$objTitle} ha sido actualizado.");
		
	} elseif ($_POST['action'] == 'add') {
		$objLoad ->add();
		if (!$pid) Tzn::redirect("banner-list.php", "{$objTitle} ha sido actualizado.");
		Tzn::redirect("page-add.php?id={$objLoad ->page ->id}&tab=file", "{$objTitle} ha sido registrado.");
	}
	if ($u == LBN_VAR2_BANNER)
		Tzn::redirect("banner-list.php", "{$objTitle} se ha guardado correctamente.");
	elseif ($u == LBN_VAR2_GALLERY)
		Tzn::redirect("gallery-list.php", "{$objTitle} se ha guardado correctamente.");
	else
		Tzn::redirect("page-add.php?id={$objLoad ->page ->id}&tab=file", "{$objTitle} se ha guardado correctamente.");
}
?>
<?php include("header.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#frmMain').validate();	
});
</script>
<?php include("sidebar.php"); ?>
<ul id="subnav" >
<?php
	if ($u == 0): 
?>
	<li ><a class="back" href="<?= $objUrl ?>-add.php?id=<?= $pid?>&tab=file" > Atras </a></li>
<?php endif; ?>	
	<li class="noborder" >
		<a class="add" href="<?= $_SERVER["PHP_SELF"] ?>?pid=<?= $pid?>" > Agregar una <?= $objTitle ?> </a>
	</li>
</ul>
<div id="list">
<h2> <?php echo $pTitle;?> </h2>  
<form action="" method="post" name = "frmMain" id = "frmMain" enctype="multipart/form-data"  ><input type="hidden" name="u" value="<?= $_REQUEST["u"] ?>" />
<fieldset><legend> Informaci&oacute;n General </legend>
	<table cellpadding="0" cellspacing="0" class="table-form"  >
		<tr>
			<th>T&iacute;tulo: </th>
					<td><?php $objLoad ->qText('title', '', 'width:548px', 'class="required"');?></td>
				</tr>
				<tr>
					<th>Imagen: </th>
					<td><?php $objLoad ->pFile('ifile', "{$_SERVER['PHP_SELF']}?pid={$objLoad ->page ->id}&id={$objLoad ->id}&action=del&u={$_REQUEST["u"]}") ?></td>
				</tr>
<?php if (!$pid && $u == LBN_VAR2_BANNER): ?>				
				<tr>
					<th>url: </th>
					<td><?php $objLoad ->qText('var1', '', 'width:548px', 'class="url"');?></td>
				</tr>
<?php endif; ?>				
				<tr>
					<th>Estado: </th>
					<td><?php $objLoad ->arrayToSelect($objLoad ->_arrStatus, 'status', $objLoad ->status, false, 'width:100px', '');?></td>
				</tr>
			</table>
	</fieldset>
	<div style="margin-top:10px">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="pid" value="<?php echo $pid; ?>" />
		<input type="hidden" name="action" value="<?php echo $action; ?>" />
                <input type="submit" name="submit"  value="<?php echo $pButton; ?>" /> &nbsp;
                 <?php if (!$pid){
                 	if ($u == LBN_VAR2_BANNER)
                 		print '<input type="reset" value="Cancelar" onClick="window.location.href=\'banner-list.php\'" />';
                 	elseif ($u == LBN_VAR2_GALLERY)
                 		print '<input type="reset" value="Cancelar" onClick="window.location.href=\'gallery-list.php\'" />';
                  ?>
                <?php } else {  ?>
                <input type="reset" value="Cancelar" onClick="window.location.href='page-add.php?id=<?= $pid?>&tab=file'" />
                <?php }   ?>
            </div>
            </form>
</div>
<?php include("footer.php"); ?>