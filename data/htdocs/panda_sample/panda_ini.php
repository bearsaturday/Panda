<?php
ob_start();

/**
 * Panda init
 */
// required files
include 'Panda.php';

$config = array(
    Panda::CONFIG_DEBUG => true,                                                    // debug mode
    Panda::CONFIG_VALID_PATH => array('/'),                                         // valid path (user source code path)
    Panda::CONFIG_LOG_PATH => '/tmp/',                                              // log directory path
    Panda::CONFIG_HTTP_TPL => __DIR__ . '/../../../Panda/templates/http.php',       // custom Http error output template
    Panda::CONFIG_FATAL_HTML => __DIR__ . '/../../../Panda/templates/fatal.php',    // fatal error template
    Panda::CONFIG_ON_ERROR_FIRED => array('Panda_App_Error_Handler', 'onError'),    // application error callback on fire
    Panda::CONFIG_ENABLE_FIREPHP => true,                                           // enable firephp on firefox ?
    Panda::CONFIG_CATCH_FATAL => true,                                              // catch fatal error ? (recommend false for debug)
    Panda::CONFIG_PANDA_PATH => '/',                                                // Panda htdocs base path
    Panda::CONFIG_EDITOR => Panda::EDITOR_BESPIN | Panda::EDITOR_TEXTMATE,          // Text editor link
    Panda::CONFIG_CATCH_STRICT => true
);                                            // catch stric error in compile ?
Panda::init($config);

/**
 * Application error handler
 *
 * @param string $headering
 * @param string $subheading
 * @param array  $info
 * @param array  $options
 *
 * @return void
 */
class Panda_App_Error_Handler
{
    public static function onError($heading, $subheading, $info, $options)
    {
    }
}