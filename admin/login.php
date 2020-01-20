<?php
$pPageIsPublic = true;
include '../_common.php';
$pRef = '';
if ($_REQUEST['ref']){$pRef = $_REQUEST['ref'];} else if (!preg_match('/(index|register|registered|log(in|out))\.php/',$_SERVER['HTTP_REFERER'])) {$pRef = $_SERVER['HTTP_REFERER'];}
if ($_REQUEST['forgot']) {Tzn::redirect('user_password.php?username='.urlencode(Tzn::getHttp($_REQUEST['username'])));}

if (isset($_POST["username"])) {
	if ($objUser->login($_POST["username"],$_POST["password"])) {
		if ($pRef) {
			Tzn::redirect($pRef);
		} else {
			if ($_REQUEST['elogin']) { header("Location: index.php?".$_SERVER['QUERY_STRING']); exit; }
			Tzn::redirect('index.php');
		}
	} else {
		$pErrorMessage = $objUser->e('login');
		//$objUser->printErrorList();
	}
}
$pJSonLoad .= 'document.forms[0].username.focus();';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="<?php echo LBN_ADMIN_CSS; ?>login/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="login">
<div id="logoCetres">  
  <div align="center"><a href="login.php"><img src="<?php echo LBN_ADMIN_IMAGES; ?>admin/logo.png" alt=""  border="0" /></a></div>
</div>
<div style="width:300px;margin:0 auto;margin-top:10px;" >
  <?php  
	if ($pErrorMessage) {
		echo '<div class="ui-state-error ui-corner-all" style="padding: 0 .7em; font-size:11px;"> 
				<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
				<strong>Login Failed:</strong> '.$pErrorMessage.'</p>
			</div>';
	}
  ?>
</div>
 <form action="login.php<?php if ($_REQUEST['elogin']) echo "?".$_SERVER['QUERY_STRING']; ?>" method="post">
        <?php //$objUser->qLoginTimeZone(); ?>
  <p>
    <label>User Name:<br/>
    	<?php Tzn::qText('username',$_REQUEST['username'],'input'); ?>
        </label>
  </p>
	<p>
		<label>Password:<br/>
		<input id="password" name="password" class="input" value="" size="20" type="password" />
		</label>
    </p>
	<p class="submit">
    	<input type="submit" value="start session" />
	</p>
</form>
</div>
</body>
</html>

