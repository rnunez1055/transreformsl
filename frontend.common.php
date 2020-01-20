<?php
	function t($key) {
		if (array_key_exists($key, $GLOBALS["langFront"]))
			return $GLOBALS["langFront"][$key];
	}
?>
