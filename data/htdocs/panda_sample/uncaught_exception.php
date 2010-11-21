<?php
include 'panda_ini.php';

// any uncaught exception produce 503 error (503 Service Temporarily Unavailable)
$appErrorCode = 100;
throw new Exception('Application Exception', $appErrorCode);