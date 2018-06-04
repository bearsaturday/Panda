<?php

class PandaTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $config = [
            Panda::CONFIG_DEBUG => false,
            Panda::CONFIG_VALID_PATH => ['/'],
            Panda::CONFIG_LOG_PATH => '/tmp',
            Panda::CONFIG_ON_ERROR_FIRED => false,
            Panda::CONFIG_ON_FATAL_ERROR => 'Panda/template/fatal.html',
            Panda::CONFIG_ENABLE_FIREPHP => true,
            Panda::CONFIG_FATAL_HTML => 'Panda/template/fatal.html',
            Panda::CONFIG_HTTP_TPL => 'Panda/template/http.php',
            Panda::CONFIG_CATCH_FATAL => false,
            Panda::CONFIG_CATCH_STRICT => true,
            Panda::CONFIG_PANDA_PATH => '/',
            Panda::CONFIG_EDITOR => 0
        ];
        Panda::init($config);
    }

    public function testGetConfig()
    {
        $config = Panda::getConfig();
        $this->assertTrue(isset($config[Panda::CONFIG_DEBUG]));
        $this->assertFalse($config[Panda::CONFIG_DEBUG]);
    }
}
