<?php

require_once 'testcase.php';
require_once 'PHPUnit.php';
$suite  = new PHPUnit_TestCase("StringTest");
$result = PHPUnit::run($suite);

echo $result -> toString();
?>