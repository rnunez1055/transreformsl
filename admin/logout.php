<?php

$pPageIsPublic=true;
include '../_common.php';

if ($objUser->isLogged()) {
	$objUser->load();
}
$userTimeZone = $_SESSION['tznUserTimeZone'];
$objUser->logout();
$pUserIsLogged = false;

Tzn::redirect('index.php');

?>
