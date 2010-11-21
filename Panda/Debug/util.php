<?php
/**
 * Panda
 *
 * PHP versions 5
 *
 * p - print var
 *
 * <code>
 * p($mixed);
 * p($mixed, 'fire');
 * p($mixed, 'syslog');
 * p($mixed, 'var');
 * </code>
 *
 * t - trace
 *
 * <code>
 * t();
 * tr($a == 1);
 * </code>
 *
 * @category  Panda
 * @package   Panda
 * @author    Akihito Koriyama <koriyama@users.sourceforge.jp>
 * @copyright 2009 Akihito Koriyama  All rights reserved.
 * @license   http://opensource.org/licenses/bsd-license.php BSD
 * @version   SVN: Release: $Id$
 * @link      n/a
 *
 * debuglib for PHP5
 * Thomas Schüßler <debuglib at atomar dot de>
 * http://phpdebuglib.de/
 *
 * FireBug
 * http://www.getfirebug.com/
 *
 * FirePHP
 * http://www.christophdorn.com/
 * https://addons.mozilla.org/ja/firefox/addon/6149
 * http://www.firephp.org/
 */

/**
 * Panda Debug Utility
 *

 /**
 * Prints human-readable information about a variable with print location and variable name
 *
 * @param mixed   $mixed   variables
 * @param formart $formart 'var' | 'export' | 'printa' | 'fire' | 'syslog'
 * @param array   $options
 */
function p($mixed = null, $formart = 'dump', array $options = array())
{
    $config = Panda::getConfig();
    if ($config[Panda::CONFIG_DEBUG] !== true) {
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error('p() is called in no debug mode in ' . $file . ' on line ' .$line, E_USER_WARNING);
        return;
    }
    $options['trace'] = debug_backtrace();
    Panda_Debug::p($mixed, $formart, $options);
}

/**
 * Prints human-readable trace information's link on screen
 *
 * @param bool $condition
 *
 * @return void
 */
function t($condition = true)
{
    if (!$condition) {
        return;
    }
    $config = Panda::getConfig();
    if ($config[Panda::CONFIG_DEBUG] !== true) {
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error('t() is called in no debug mode in ' . $file . ' on line ' .$line, E_USER_WARNING);
        return;
    }
    $colorCycle = true;
    ob_start();
    debug_print_backtrace();
    $bt = ob_get_clean();
    $bt = str_replace("\n#", "\n##", $bt);
    $btArr = explode("\n#", $bt);
    $bt = '';
    unset($btArr[count($btArr) - 1]);
    foreach ($btArr as $row) {
        $color = $colorCycle ? '#f0f4fc' : "white";
        //          $color = $colorCycle ? '#eaeef6' : "white";
        $colorCycle = !$colorCycle;
        $row = str_replace("\n", '', $row);
        $bt .= '<div style="border-bottom:1px solid #CCCCCC; height:3.25ex; background-color:' . $color . '">' . htmlspecialchars($row) . '</div>';
    }
    echo '<pre><div style="font-size:small;border-color:#e3ecfd;border-width:4px; border-style: solid; -moz-border-radius:4px; -webkit-border-radius
        :4px;">' . $bt . '</div></pre>';
    return;
}

/**
 * Prints human-readable trace information's link on link
 *
 * @param bool $condition
 *
 * @return void
 */
function tr($condition = true)
{
    if (!$condition) {
        return;
    }
    if (function_exists('fb')) {
        fb("tr()", FirePHP::TRACE);
    }
    $config = Panda::getConfig();
    if ($config[Panda::CONFIG_DEBUG] !== true) {
        $trace = debug_backtrace();
        $file = $trace[0]['file'];
        $line = $trace[0]['line'];
        trigger_error('tr() is called in no debug mode in ' . $file . ' on line ' .$line, E_USER_WARNING);
        return;
    }
    Panda_Debug::trace(false, debug_backtrace());
}

/**
 * リフレクション
 *
 * @param unknown_type $target
 * @param unknown_type $cehckParent
 *
 * @return void
 */
function r($target, $cehckParent = false)
{
    Panda_Debug::reflect($target, $cehckParent);
}
