<?php
require (dirname(__DIR__)) . '/vendor/autoload.php';

Panda::init([
    Panda::CONFIG_DEBUG => true,                                                       // debug mode
    Panda::CONFIG_VALID_PATH => array('/'),                                            // valid path (user source code path)
    Panda::CONFIG_LOG_PATH => '/tmp/',                                                 // log directory path
    Panda::CONFIG_HTTP_TPL => dirname(__DIR__) . '/Panda/templates/http.php',    // custom Http error output template
    Panda::CONFIG_FATAL_HTML => dirname(__DIR__) . '/Panda/templates/fatal.php', // fatal error template
    Panda::CONFIG_CATCH_FATAL => true,                                                 // catch fatal error ? (recommend false for debug)
    Panda::CONFIG_PANDA_PATH => '/',                                                   // Panda htdocs base path
    Panda::CONFIG_EDITOR => Panda::EDITOR_BESPIN | Panda::EDITOR_TEXTMATE,             // Text editor link
    Panda::CONFIG_CATCH_STRICT => true
]);
