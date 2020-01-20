<?php  
$pPageIsPublic = false;
include '../_common.php';
	
$_SESSION["m1"]	= "content";
$_SESSION["m2"] = 'category-list';
$objName="Category"; $objUrl="category"; $objTitle="Sub Categor&iacute;a";

$pTitle  = "Nuevo {$objTitle}";
$pButton = 'Guardar';
$action  = 'add';
$id 	 = intval($_REQUEST['id']);
$seo	 = NULL;


$objLoad = new Category();
$objLoad ->setUid($id);
if ($objLoad ->load()) {
	$pTitle  = "Editar {$objTitle}";
	$pButton = 'Actualizar';
	$action  = 'edit';	
} else {
	$objLoad ->setNum('parentId', $_GET["pid"]);
}

if (isset($_POST['submit'])) {
	$objLoad ->setAuto($_POST);
	if ($_POST['action'] == 'edit') {
		$objLoad ->getConnection();
		$objLoad ->setUid($id);
		$objLoad ->update();
		Tzn::redirect("{$objUrl}-add.php?id=" . $objLoad ->parentId . "&tab=subcategory", "{$objTitle} ha sido actualizado.");
	} elseif ($_POST['action'] == 'add') {
		$objLoad ->add();
		Tzn::redirect("{$objUrl}-add.php?id=" . $objLoad ->parentId. "&tab=subcategory", "{$objTitle} ha sido registrado.");
	}
}
?>
<?php include("header.php"); ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#frmMain').validate({
		rules: {
			parentId: "required"
		},
		messages: {
			parentId: "*"
		}
	});	
});
</script>
<?php include("sidebar.php"); ?>
<ul id="subnav" >
	<li ><a class="back" href="<?= $objUrl ?>-add.php?id=<?= $objLoad ->parentId ?>&tab=subcategory" > Atras </a></li>
	<li class="noborder" >
		<a class="add"   href="<?= $objUrl ?>-add.php?id=<?= $objLoad ->parentId ?>&tab=subcategory" > Agregar un <?= $objTitle ?> </a>
	</li>
</ul>
<div id="list">
<h2> <?php echo $pTitle;?> </h2>  
<form action="" method="post" name = "frmMain" id = "frmMain"  enctype="multipart/form-data" >
<fieldset><legend> Informaci&oacute;n General  </legend>
	<table cellpadding="0" cellspacing="0" class="table-form"  >
		<tr>
			<th width="12%"  >Cat. Padre: </th>
			<td>
			<?php
				$objParent = new Category();
				$objParent ->loadItems("#parentId, #orderId","#parentId='0' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0");
				$objParent ->getSelectWithRankOptions($objLoad ->parentId); ?>
			</td>
		</tr>
		<tr>
			<th>T&iacute;tulo: </th>
					<td><?php $objLoad ->qText('title', '', 'width:548px', 'class="required"');?></td>
				</tr>
				<tr>
					<th>Estado: </th>
					<td><?php $objLoad ->arrayToSelect($objLoad ->_arrStatus, 'status', $objLoad ->status, false, 'width:100px', '');?></td>
				</tr>
			</table>
	</fieldset>
	<div style="margin-top:10px">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<input type="hidden" name="action" value="<?php echo $action; ?>" />
                <input type="submit" name="submit"  value="<?php echo $pButton; ?>" /> &nbsp; <input type="reset" value="Cancelar" onClick="window.location.href='<?= $objUrl ?>-add.php?id=<?= $objLoad ->parentId ?>&tab=subcategory'" />
            </div>
            </form>
</div>
<?php include("footer.php"); ?>