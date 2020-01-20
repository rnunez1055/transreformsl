<?php  
$pPageIsPublic = false;
include '../_common.php';
	
$_SESSION["m1"]="test";
$_SESSION["m2"]="test-list";
$objName="Testimonio"; $objUrl="testimonio"; $objTitle="Testimonios";

$pTitle  = "Nueva {$objTitle}";
$pButton = 'Guardar';
$action  = 'add';
$id 	 = intval($_REQUEST['id']);
$seo	 = NULL;


$objLoad = new Testimonio();
$objLoad ->setUid($id);
if ($objLoad ->load()) {
	$pTitle  = "Editar {$objTitle}";
	$pButton = 'Actualizar';
	$action  = 'edit';
}

if (isset($_POST['submit'])) {
	$objLoad ->setAuto($_POST);
	$objLoad ->category ->id = $_POST["categoryId"];
	$objLoad ->featured = 1; //!$_POST["featured"] ? 0 : 1;
	$objLoad ->{LBN_ADMIN_PAGE_EXCLUDE_1} = 1;
	
	if ($_POST['action'] == 'edit') {
		$objLoad ->getConnection();
		$objLoad ->setUid($id);
		$objLoad ->update();
		Tzn::redirect("{$objUrl}-list.php", "{$objTitle} ha sido actualizado.");
	} elseif ($_POST['action'] == 'add') {
		$objLoad ->add();
		Tzn::redirect("{$objUrl}-list.php", "{$objTitle} ha sido registrado.");
	}
}
?>
<?php include("header.php"); ?>
<?php
$tabs 	= array('file' => 1);
$selTab = $tabs[$_REQUEST['tab']] ? $tabs[$_REQUEST['tab']] : 0;
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#frmMain").validate({
		rules: {
			categoryId: "required"
		},
		messages: {
			categoryId: "*"
		}
	});
	
	$('#content-tabs').tabs({
		disabled :[<?php echo !$objLoad ->isLoaded() ? "2" : "" ?>],
		initial  : <?php echo $selTab ?>
	});
});
</script>
<?php include("sidebar.php"); ?>
<ul id="subnav" >
	<li ><a class="back" href="<?= $objUrl ?>-list.php" > Atras </a></li>
	<li class="noborder" >
		<a class="add" href="<?= $objUrl ?>-add.php" > Agregar <?= $objTitle ?> </a>
	</li>
</ul>
<div id="list">
<h2> <?php echo $pTitle;?> </h2>
<div id="content-tabs">
		<ul>
			<li><a href="#fragment-1" ><span>Testimonio</span></a></li>
			<li><a href="#fragment-2"><span>Im&aacute;genes</span></a></li>
		</ul>
		<div id="fragment-1" >
			<form action="" method="post" name = "frmMain" id = "frmMain" >
				<fieldset><legend> Informaci&oacute;n General </legend>
					<table cellpadding="0" cellspacing="0" class="table-form"  >
						<!-- tr>
							<th>Categor&iacute;a: </th>
							<td>
							<?php
								$tmp = new Category();
								$tmp ->loadItems("#parentId, #orderId");
								$tmp ->getSelectWithRankOptions($objLoad ->category ->id, "categoryId"); ?>
							</td>
						</tr-->
						<tr>
							<th>T&iacute;tulo: </th>
								<td>
								<?php $objLoad ->qText('title', '', 'width:548px', 'class="required"');?></td>
							</tr>
							<tr>
								<th>Descripcion: </th>
								<td><?php $objLoad ->qEditor('description', array('toolbar' => 'multimedia', 'stylesSet' => 'custom')); ?></td>
							</tr>
							<?php $objLoad ->printSEO();  ?>
							<!--tr>
								<th>Destacado? : </th>
								<td><?php //$objLoad ->qCheckbox('featured'); ?></td>
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
		<div id="fragment-2" >
			<?php
				$objPage = clone $objLoad;   
				include PRJ_INCLUDE_PATH.'admin/page-image-list.php'; 
			?>
		</div>
</div>
</div>
<?php include("footer.php"); ?>