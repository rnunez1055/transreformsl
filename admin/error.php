<?php
$pReferer = $_SERVER['HTTP_REFERER'];
$pMessage = stripslashes($_REQUEST['tznMessage']);
$pMessage = preg_replace("/<script[^>]*>[^<]+<\/script[^>]*>/is"
	,"", $pMessage); 
$pMessage = preg_replace("/<\/?(div|span|iframe|frame|input|"
	."textarea|script|style|applet|object|embed|form)[^>]*>/is"
	,"", $pMessage);
?>
<html>
<head>
<title>oooops!!</title>
<style>
body {margin: 0px;padding: 0px;margin-bottom: 6px;background-color: #fff;}
div#horiz {width: 500px;font-family: Arial, Helvetica, sans-serif;font-size: small;text-align: center;}
h1 {font-family: Arial, Helvetica, sans-serif;font-size: large;}
p {font-family: Arial, Helvetica, sans-serif;font-size: medium;}
p.error {color: #c00;}
</style>
</head>
<body>
<div align="center">
  <div id="horiz">
    <p>hubo un conflicto...!</p>
  <?php
  
	if ($_REQUEST['tznMessage']) {
		echo '<p class="error" style="text-align:center">'.$pMessage.'</p>';
		//error_log(stripslashes($_REQUEST['tznMessage']));
	}
    if ($_SERVER['HTTP_REFERER']) {
  ?>
    <p><a href="<?php echo $_SERVER['../HTTP_REFERER']; ?>">Haga clic para regresar y probar nuevamente</a></p>
  <?php
    } else if (!preg_match('/error\.php$/',$_SERVER['PHP_SELF'])) {
  ?>
    <p><a href="javascript:window.location.reload(true)">Haga clic para probar nuevamente</a></p>
  <?php
    }
  ?> 
  </div>
</div>
</body>
</html>
