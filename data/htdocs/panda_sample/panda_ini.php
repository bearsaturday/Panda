<?php

ob_start();

/**
 * Panda init
 */
$pandaPath = '/usr/share/bear/';
// required files
include $pandaPath . 'Panda.php';

$config = array(Panda::CONFIG_DEBUG => true,                             // debug mode
Panda::CONFIG_VALID_PATH => array('/'),                                  // valid path (user source code path)
Panda::CONFIG_LOG_PATH => '/tmp/',                                       // fatal error log path
//Panda::CONFIG_ON_ERROR_FIRED => array('Test_App', 'onError'),          // application error callback on fire
//Panda::CONFIG_FATAL_HTML => '',                                        // fatal error template
//Panda::CONFIG_ON_IS_CLI_OUTPUT => false,                               // CLI check logic injection (callback or bool)
Panda::CONFIG_ENABLE_FIREPHP => true,                                    // enable firephp on firefox ?
//Panda::CONFIG_HTTP_TPL => 'Panda/Template/http.php',                   // custom Http error output template
Panda::CONFIG_CATCH_FATAL => true,                                       // catch fatal error ? (recommend false for debug)
Panda::CONFIG_PANDA_PATH => '/',                                         // Panda htdocs base path
Panda::CONFIG_EDITOR => Panda::EDITOR_BESPIN | Panda::EDITOR_TEXTMATE,   // Text editor link
Panda::CONFIG_CATCH_STRICT => true);                                     // catch stric error in compile ?
// init
Panda::init($config);
