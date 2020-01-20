<?php
global $chklive, $chkdraft;
?>

<input type="radio" name="rdstatus" <?php if(!$chklive && !$chkdraft){ echo 'checked="checked"';} ?> value="All" onclick="this.form.submit()" />
<span style="font-size:10px" >Todos</span>
<input type="radio" name="rdstatus" <?php if($chklive){ echo 'checked="checked"';} ?> value="<?= LBN_ADMIN_STATUS_ON ?>" onclick="this.form.submit()" />
<span style="font-size:10px" >Activos</span>
<input type="radio" name="rdstatus" <?php if($chkdraft){ echo 'checked="checked"';} ?> value="<?= LBN_ADMIN_STATUS_OFF ?>" onclick="this.form.submit()" />
<span style="font-size:10px" >Inactivos</span>