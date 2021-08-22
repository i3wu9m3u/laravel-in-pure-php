<?php

require_once(__DIR__ . '/ExclusiveValidator.php');

$validator = new ExclusiveValidator($_POST);
if ($validator->run()) {
	echo 'success';
} else {
	echo 'failure';
	echo '<br><pre>';
	var_export($validator->errors());
	echo '</pre>';
}
