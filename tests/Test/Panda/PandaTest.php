<?php

class PandaTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        error_reporting(E_ALL & ~E_DEPRECATED);
        require_once 'PEAR.php';
        $config = array(Panda::CONFIG_DEBUG => false,
        Panda::CONFIG_VALID_PATH => array('/'),
        Panda::CONFIG_LOG_PATH => '/tmp',
        Panda::CONFIG_ON_ERROR_FIRED => false,
        Panda::CONFIG_ON_FATAL_ERROR => 'Panda/template/fatal.html',
        Panda::CONFIG_ENABLE_FIREPHP => true,
        Panda::CONFIG_FATAL_HTML => 'Panda/template/fatal.html',
        Panda::CONFIG_HTTP_TPL => 'Panda/template/http.php',
        Panda::CONFIG_CATCH_FATAL => false,
        Panda::CONFIG_CATCH_STRICT => true,
        Panda::CONFIG_PANDA_PATH => '/',
        Panda::CONFIG_EDITOR => 0);
        Panda::init($config);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     */
    public function testGetConfig()
    {
        $config = Panda::getConfig();
        $this->assertTrue(isset($config[Panda::CONFIG_DEBUG]));
    }

    public function testInit()
    {
        $config = Panda::getConfig();
        $config[Panda::CONFIG_DEBUG] = true;
        Panda::init($config);
        $config = Panda::getConfig();
        $this->assertTrue($config[Panda::CONFIG_DEBUG] === true);
    }

    public function testOnPearError()
    {
        if (version_compare(PHP_VERSION, '5.5', '>=')) {
            $last_handler = set_exception_handler(null);
            $this->assertSame('Panda', $last_handler[0]);
            $this->assertSame('onException', $last_handler[1]);
        }
    }

}
