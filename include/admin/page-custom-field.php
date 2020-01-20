<?php
	if ($objPage ->isLoaded()){
?>		
			<fieldset style="padding-top: 0; margin-bottom:1em;" id="container-list"  ><legend> List Custom Fields </legend>
				<table cellpadding="0" cellspacing="0" id="table-fields" >
					<thead>
						<tr>
							<th width="45%" >Name</th>
							<th width="55%" >Value</th>
						</tr>
					</thead>
					<tbody>
<?php
		$objCField = new Custom_Field();
		$objCField ->addWhere($objCField ->gTable(). '.pageId ='.$objPage->id);
		$objCField ->loadList();
		if ($objCField ->rMore()) {
			while ($objItem = $objCField ->rNext()) {
?>					
						<tr>
							<td ><?php $objItem ->qText('name'); ?>
								<p class="itemsubnav" style="background-color:transparent;" >
                                	<a title="Edit" href="javascript:void(0)" onclick="insertUpdate(this)">Update</a>
                                    <a id="delrow" title="Delete"  href="javascript:void(0)">Delete</a>
                                </p>
							</td>
							<td> <?php $objItem ->qTextArea('value');
									   $objItem ->qHidden('id'); ?></td>
						</tr>
<?php		}	
			unset($objItem);
		} else {
			echo "<script>$('fieldset#container-list').css('display','none');</script>";
		}
?>		
					</tbody>
				</table>
			</fieldset>
<script type="text/javascript">
	$().ready(function(){
		var v = $('#myForm').validate();
		$("#name").autocomplete("admin-ajax.php", {
			width	     : 270,
			selectFirst  : false,
			extraParams  : {
	  	      action	 : "search",
	  	      object	 : "Custom_Field"
			} 
		});

	/*	$("#value").autocomplete("admin-ajax.php", {
			multiple: true,
			scroll: true,
			scrollHeight: 300,
			extraParams  : {
	  	      action	 : "search",
	  	      object	 : "File"
			},
			formatItem: function(data, i, n, value) {
				return "<img src='../thumb.php?src=../upload/" + data[1] + "&w=25&h=25&zc=1'/> " + data[0].split(".")[0];
			},
			formatResult: function(data, value) {
				return data[0].split(".")[0];
			} 
		});*/
		
		$('#myForm').submit(function(){
			if (v.form()) {
				insertUpdate("a#addrow");
			} 
			return false;	
		});

		$('a#delrow').live('click', function(){
			if (confirm('Remove this Custom Field?')) {
				var row = $(this).parent().parent().parent(); 
				var id  = row.find('input[name="id"]').val() || 0;
				ajaxAdmin({
					data: "action=custom-field-del&id="+id,
					success: function(response) {
						if (response) {
							row.effect('highlight', {color: '#FF5F5F'}, 600)
							   .fadeOut(300, function(){$(this).remove();});
						}	
					}
				});
			}	
		});
		
	});	
	
	function insertUpdate(btn) {
		var row = $(btn).parent().parent().parent(); 
		var id  = row.find('input[name="id"]').val() || 0;
		var name  = row.find('input[name="name"]').val();
		var value  = row.find('textarea[name="value"]').val();
		var page   = <?php echo $objPage ->id ?>;
		
		ajaxAdmin({
			data: "action=custom-field-add&name="+ name +"&value="+ value +"&page="+page+"&id="+id,
			success: function(response) {
				if (response) {
					if (id == 0) {
						$('fieldset#container-list').css('display','block');
						if ($('fieldset#container-list > table > tbody tr').length > 0)
							$('fieldset#container-list > table > tbody tr:last').after(response)
								.next().effect('highlight', {color: '#FFFF00'}, 1000);
						else
							$('fieldset#container-list > table > tbody').html(response)
								.effect('highlight', {color: '#FFFF00'}, 1000);
					} else {
						row.effect('highlight', {color: '#FFFF00'}, 1000);
					}
				}	
			}
		});
	} 
	
</script>

			<fieldset style="padding-top: 0; " ><legend> Add a New Custom Field </legend>
				<form action="" method="post" name="myForm" id="myForm">
				<table cellpadding="0" cellspacing="0" id="table-fields" >
					<thead>
						<tr>
							<th width="45%">Name</th>
							<th width="55%">Value</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>							 
								<input type="text" name="name" id="name" class="required"   />
								<p class="itemsubnav" style="background-color:transparent; padding-top: 6px; " >
                                	<a onclick="$('#myForm').submit()" id="addrow"    title="Add Custom Field" href="javascript:void(0)">Add Custom Field</a>
                                </p>
							</td>
							<td><textarea name="value" id="value" class="required" ></textarea> </td>
						</tr>
					</tbody>
				</table>
				</form>
			</fieldset>

<?php } ?>