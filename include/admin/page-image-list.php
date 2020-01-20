<?php
	if ($objPage){
		if (!$u) $u = 0;
?>
<script type="text/javascript">
Shadowbox.init();  

$().ready(function(){
	var lExts = getFileExts('jpg|jpeg|gif|png').split("&");
	uploadImages('uploadify', {
		'scriptData'  : {'id' : <?php echo $objPage ->id ?>, 'u' : <?= $u ?> },
		'fileDesc'	  : 'Format Images ('+ lExts[1] +')',
        'fileExt'	  : lExts[0],
        'buttonImg'   : '../images/ico/upload-files.png',
        'height'	  : 16,
        'witdh'		  : 102,
        onAllComplete : function(data) {			  
			window.location.href = "<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $objPage ->id ?>&tab=file&msg=Images Added.";
        } 
	});
	
	$('#select-all').checkedToggle("ul.images", "File");
	$('ul.images').admin_sortable("File");

	$('input[name="main-check"]').click(function(){
		ajaxAdmin({
						data: "action=main-img&rdmain=" + this.value + "&pid=<?php echo  $objPage ->id ?> ",
						success: function(response) {
							if (response) {
								Notify(response, 0);
							}	
						}
		});
	});
	
});

</script>			
			<fieldset style="padding-top: 0;" ><legend> Lista de Im&aacute;genes </legend>
				<form action="<?php echo $_SERVER["PHP_SELF"]."?id=". $objPage->id. "&tab=file" ?>" method="post" name="frmFilter" >
					<ul id="subnav" >
						<li class="noleft" ><input type="checkbox" name="select-all" id="select-all" /><label for="select-all" class="first-check" >Seleccionar todos</label></li>
						<li><a href="javascript:void(0);" id="remAll">Eliminar Seleccionados</a></li>
			   			<li class="noborder"  ><?php include("filter.php"); ?></li>
			   			<li class="noborder noright" style="float:right;"   >
			   				<input type="file" name="uploadify" id="uploadify" />
        					<div id="fileQueue" ></div>
			   			</li>
					</ul>
			 	</form>
			 	<div id="list-boxes"  >
            		<ul class="images">
<?php
	$objFile = new File();
    if ($objFile ->loadItems("#orderId ASC", "#status like '". $chkstatus ."%' AND LENGTH(#video)=0   AND #pageId='". $objPage ->id."'". ($u ? " AND #".LBN_VAR2."='{$u}'" : "") )) {
    	while ($objItem = $objFile->rNext()) {    
                ?>                   
						<li id="recordsArray_<?php echo $objItem->id; ?>" class="<?php echo $objItem->status==LBN_ADMIN_STATUS_OFF ? 'draft' : ''; ?>" >
							<div class="pic-drag" >
<?php if ($objPage ->id): ?>							
								<p style="position:relative; display:block; width:140px; text-align:right; height:20px;float:right; "> 
									principal:  <input value="<?php echo $objItem->id; ?>" name="main-check" type="radio" style="margin:0 0 0 6px; float:right;" <?php echo $objItem->isProfile==1 ? 'checked' : '';?>/>
								</p>
<?php endif; ?>								
							
								<?php echo $objItem->getImage(); ?>
								<label for="file-<?php echo $objItem->id ?>" ><input class="checks"   name="items[]" id="file-<?php echo $objItem->id;?>" type="checkbox" value="<?php echo $objItem->id;?>" />
												 <?php echo truncate_string($objItem->title, 12);?></label>
                                <p class="itemsubnav" >
                                	<?php if(strlen($objItem->target)>0){ ?><a rel="shadowbox[items]" title="<?php echo $objItem->title ?>" href="<?php echo TZN_FILE_UPLOAD_URL_ADMIN.$objItem->target ?>">Preview</a><?php } ?>
                                    <a href="file-add.php?id=<?php echo $objItem->id ?>&pid=<?php echo $objItem ->page ->id ?>&u=<?= $u?>" title="Edit" >Edit</a>
                                    <a id="del" href="javascript:void(0);" title="" >Remove</a>
                                </p>
                            </div>
                        </li>	
<?php 	}	unset($objItem);
    } ?>                    					
            		</ul>            		
            		<div class="clear"></div>
  			</div>
			</fieldset>
<?php } ?>