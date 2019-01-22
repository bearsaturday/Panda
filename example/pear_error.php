<?php
//include PEAR before ini
include 'PEAR.php';
require __DIR__ . '/panda_ini.php';

PEAR::raiseError('test PEAR Error', 300);
