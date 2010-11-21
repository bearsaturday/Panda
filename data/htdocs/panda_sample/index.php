<?php
include 'panda_ini.php';

/**
 * Main Class - run 'page'
 *
 */
class Test_App_Main
{

    /*
     * Main public val
     */
    public $a = null;

    /**
     * run page
     */
    public function run()
    {
        $page = new Test_App_Page();
        $page->init();
    }
}

/**
 * Page Class
 *
 */
class Test_App_Page
{

    /**
     * Page Const
     */
    CONST APP = 'APP_CONST';

    /**
     * Page Static Val
     */
    static $statcVar = 'this is $statc var';

    /*
     * Page Public Val
     */
    public $pub = 'this is $pub var';

    /**
     * Page private val
     */
    private $private = 'this is $private var';

    /**
     * Paga Init
     */
    public function init()
    {
        $isGood = true;
        $num = 0;
        $str = 'hello panda';
        $this->private = 'new private var';
        // asert
        $this->_assert($a);
        // Strict
        $this->_strict();
        // notice
        $this->_notice();
        //E_Warning
        $this->_warning($num);
        // repeatead error
        $this->_repeatedError();
        // E_USER_ERROR
        trigger_error('*User Error Message Here*', E_USER_WARNING);
    }

    /**
     * assert
     */
    private function _assert($data)
    {
        assert($data === false);
    }

    /**
     * E_Strict
     */
    private function _strict()
    {
        //E_Strict Creating default object from empty value (空の値からデフォルトオブジェクトを作ろうとしている。)
        $main = new Test_App_Main();
        $main->a->b = 1;
    }

    /**
     * E_Notice
     */
    private function _notice()
    {
        return $a[a];
    }

    /**
     * Warning
     */
    private function _warning($denominator)
    {
        $line = __LINE__;
        $local = "you can see in PHP error context";
        echo 1 / $denominator;
    }

    /**
     * Repeated Error
     */
    private function _repeatedError()
    {
        $line = __LINE__;
        $local = "you can see in PHP error context";
        // repeat error (report only once)
        for ($i = 0; $i < 10; $i++) {
            print $a; //notice
        }
    }

    /**
     * Error callback
     */
    public static function onError($heading, $subHeading, $info, $options)
    {
        $userAgent = isset($_GET['HTTP_USER_AGENT']) ? $_GET['HTTP_USER_AGENT'] : 'CLI';
        openlog('PHP', LOG_ODELAY, LOG_LOCAL5);
        syslog(LOG_ERR, "PHP - $heading - $subHeading - {$options['file']} - " . serialize($info) . " - $userAgent");
    }
}

include 'index.view.php';
?>

