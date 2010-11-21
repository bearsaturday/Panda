<?php
include 'panda_ini.php';

echo 'start'; // not print
$a = 'no_panda';
//  fatal error - Call to undefined function
$a();
// fatal error - Cannot use string offset as an array
$isSet = isset($a['0']['0']['0']);
echo 'unreachable'; // not print