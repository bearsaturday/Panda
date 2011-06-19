<?php
//include PEAR before ini
include 'PEAR.php';
include 'panda_ini.php';

//PEAR::raiseError('test PEAR Error', 300);
require 'MDB2.php';
$db = MDB2::connect('mysqli://test:pass@localhost/mydb?charset=utf8');
