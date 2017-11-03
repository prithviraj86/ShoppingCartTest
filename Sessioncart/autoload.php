<?php
session_start();
function __autoload($classname) {
    $filename = "classes/".$classname .".php";
    include_once($filename);
}

?>