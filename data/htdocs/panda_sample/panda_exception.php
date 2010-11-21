<?php
include 'panda_ini.php';

$debugInfo = array('time' => time());
// show status page with specify http code
throw new Panda_Exception('User deleted.', 404, $debugInfo);