<?php  
$pPageIsPublic = false;
include '../_common.php';
	
$_SESSION["m1"]	= "content";
$_SESSION["m2"] = 'category-list';
$objName="Category"; $objUrl="category"; $objTitle="Categor&iacute;a";

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
	if ($_GET['action']=='del') {
		$objLoad ->removeFile('photo');
		$message = "Imagen ha sido eliminado.";
	}
}

if (isset($_POST['submit'])) {
	$objLoad ->setAuto($_POST);
	$objLoad ->uploadFile('photo', 'photo');
	if ($_POST['action'] == 'edit') {
		$objLoad ->getConnection();
		$objLoad ->setUid($id);
		$objLoad ->update();
		Tzn::redirect("{$objUrl}-list.php", "{$objTitle} ha sido actualizado.");
	} elseif ($_POST['action'] == 'add') {
		$objLoad ->add();
		Tzn::redirect("{$objUrl}-add.php?id=". $objLoad ->id, "{$objTitle} ha sido registrado.");
	}
}
?>
<?php include("header.php"); ?>
<?php
$tabs = array ('subcategory' => 1 );
$selTab = $tabs [$_REQUEST ['tab']] ? $tabs [$_REQUEST ['tab']] : 0;
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#frmMain').validate();
	$('#content-tabs').tabs({
		disabled :[<?php echo !$objLoad ->isLoaded() ? "2" : "" ?>],
		initial  : <?php echo $selTab?>
	});
});
</script>
<?php include("sidebar.php"); ?>
<ul id="subnav" >
	<li ><a class="back" href="<?= $objUrl ?>-list.php" > Atras </a></li>
	<li class="noborder" >
		<a class="add" href="<?= $objUrl ?>-add.php" > Agregar un <?= $objTitle ?> </a>
	</li>
</ul>
<div id="list">
<h2> <?php echo $pTitle;?> </h2>
	<div id="content-tabs">
		<ul>
			<li><a href="#fragment-1"><span>Categor&iacute;a</span></a></li>
			<li><a href="#fragment-2"><span>Sub Categor&iacute;s</span></a></li>
		</ul>
		<div id="fragment-1">  
			<form action="" method="post" name = "frmMain" id = "frmMain"  enctype="multipart/form-data" >
			<fieldset><legend> Informaci&oacute;n General  </legend>
				<table cellpadding="0" cellspacing="0" class="table-form"  >
					<!-- tr>
						<th width="12%"  >Cat. Padre: </th>
						<td>
						<?php
							/*$objParent = new Category();
							$objParent ->loadItems("#parentId, #orderId","#categoryId <>". $objLoad ->id. " and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0");
							$objParent ->getSelectWithRankOptions($objLoad ->parentId); */ ?>
						</td>
					</tr -->
					<tr>
						<th>T&iacute;tulo: </th>
								<td><?php $objLoad ->qText('title', '', 'width:548px', 'class="required"');?></td>
							</tr>
							<!-- tr>
								<th>Imagen: </th>
								<td><?php $objLoad ->pFile('photo', "{$_SERVER['PHP_SELF']}?id={$objLoad ->id}&action=del", 'photo', 'img', false) ?></td>
							</tr-->
							<tr>
								<th>Estado: </th>
								<td><?php $objLoad ->arrayToSelect($objLoad ->_arrStatus, 'status', $objLoad ->status, false, 'width:100px', '');?></td>
							</tr>
						</table>
				</fieldset>
				<div style="margin-top:10px">
					<input type="hidden" name="id" value="<?php echo $id; ?>" />
					<input type="hidden" name="action" value="<?php echo $action; ?>" />
			                <input type="submit" name="submit"  value="<?php echo $pButton; ?>" /> &nbsp; <input type="reset" value="Cancelar" onClick="window.location.href='<?= $objUrl ?>-list.php'" />
			            </div>
			            </form>
		</div>
		<div id="fragment-2">
			<fieldset>
				<legend> Listado de Sub Categor&iacute;as <?= $objLoad ->isLoaded() ? "en {$objLoad ->titulo}" : "" ?>  </legend>
				<?php
				Common::hFrmFilterAdmin ( 'Category', 'Sub Categor&iacute;a', 'subcategory', "pid={$objLoad ->id}" );
				$objChild = new Category ();
				$objChild->loadItems ( "#orderId ASC", "#parentId='{$objLoad ->id}' AND #status like '" . $chkstatus . "%' and ifnull(#". LBN_ADMIN_CAT_EXCLUDE_1.",0)=0" );
				echo "<div id='wrap-list'>" . Common::hSimpleGrid ( 'Category', 'Sub Categor&iacute;a', 'subcategory', $objChild, true ) . '</div>';
				?>
			</fieldset>
		</div>	
	</div>		            
</div>
<?php include("footer.php"); ?>