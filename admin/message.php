  	<?php 
	// filter
		$chklive="";
		global $chkdraft;	
		global $chklive;
		$chkdraft=$chklive="";
//		die(var_dump($_POST['rdstatus']==LBN_ADMIN_STATUS_ON));	
		switch ($_POST['rdstatus']) {
			case LBN_ADMIN_STATUS_ON:
				$chklive="1";
				$chkstatus=$_POST['rdstatus'];
				break;
			case LBN_ADMIN_STATUS_OFF:
				$chkdraft="1";
				$chkstatus=$_POST['rdstatus'];			
				break;
		}
	// message	
  		if($_REQUEST["msg"]){$message=$_REQUEST["msg"];}
		if($_REQUEST["m"]){$message_mode=$_REQUEST["m"];}
		if($message){			
	?>		
    <script type="text/javascript">
		$(document).ready(function() {
			<?php if($message_mode){	?>					   
			$.jGrowl("<?php echo $message; ?>", { header: '<span class="ui-icon ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><b>Alert :</b>', themeClass:'ui-state-error' });
			<?php } else { ?>
				$.jGrowl("<?php echo $message; ?>", { header: '<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span><b>Notification :</b>'});
			<?php }?>
		});	
    </script>
	<?php }	?>