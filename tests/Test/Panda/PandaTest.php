<?php

class PandaTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        Panda::init([
            Panda::CONFIG_DEBUG => false,
            Panda::CONFIG_VALID_PATH => ['/'],
            Panda::CONFIG_LOG_PATH => '/tmp',
            Panda::CONFIG_ON_FATAL_ERROR => dirname(__DIR__, 2) .'/Panda/template/fatal.html',
            Panda::CONFIG_FATAL_HTML => dirname(__DIR__, 2) . '/Panda/template/fatal.html',
            Panda::CONFIG_HTTP_TPL => dirname(__DIR__, 2) . '/Panda/template/http.php',
            Panda::CONFIG_CATCH_FATAL => false,
            Panda::CONFIG_CATCH_STRICT => true,
            Panda::CONFIG_PANDA_PATH => '/',
            Panda::CONFIG_EDITOR => 0
        ]);
    }

    public function testGetConfig()
    {
        $config = Panda::getConfig();
        $this->assertTrue(isset($config[Panda::CONFIG_DEBUG]));
        $this->assertFalse($config[Panda::CONFIG_DEBUG]);
    }

    public function testP()
    {
        $result = p('debug');
        $this->assertNull($result);
    }
}
