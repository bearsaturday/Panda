<?php
/**
 * Panda
 *
 * PHP versions 5
 *
 * @category  Panda
 * @package   Panda
 * @author    Akihito Koriyama <koriyama@users.sourceforge.jp>
 * @copyright 2008 Akihito Koriyama  All rights reserved.
 * @license   http://opensource.org/licenses/bsd-license.php BSD
 * @version   SVN: Release: $Id$
 */

/**
 * Panda_End_Exception
 *
 * throw this exception instead of exit()
 *
 */
class Panda_End_Exception extends Exception
{
    /**
     * BEAR Resource Object
     *
     * @var BEAR_Ro
     */
    private $_ro;

    /**
     * Constructor
     *
     * @param int    $httpStatus HTTP code
     * @param string $message    messsage
     * @param int    $severity   severity
     *
     * @return void
     */
    public function __construct(BEAR_Ro $ro = null)
    {
        $this->_ro = $ro;
    }

    /**
     * get Resource Object
     * 
     */
    public function getRo(){
        return $this->_ro;
    }
}