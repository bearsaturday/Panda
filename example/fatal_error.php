<?php
include 'panda_ini.php';

error_reporting(E_ALL);

echo 'start'; // no display
$a = 'no_function';
//  fatal error - Call to undefined function
$a();
// fatal error - Cannot use string offset as an array
$isSet = isset($a['0']['0']['0']);
echo 'unreachable'; // not print
ob_flush();