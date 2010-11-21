<?php
/**
 * Panda - package script
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

require '../../Panda.php';
$config['package'] = 'Panda';
$config['channel'] = 'pear.bear-project.net';
$config['release_ver'] = Panda::VERSION;
$config['api_ver'] = $config['release_ver'];
$config['stability'] = 'beta';
$config['summery'] = 'Panda PHP Error handler';
$config['description'] = 'Panda is PHP Error handler and debug/trace print utility.';
$config['note'] = 'Initial release';
$config['dep_php'] = '5.1.3';
$config['pear_ver'] = '1.6.0';
/**
 * This is the only setup function needed
 */
require_once 'PEAR/PackageFileManager2.php';
// recommended - makes PEAR_Errors act like exceptions (kind of)
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2();
//$packagexml->specifySubpackage($p2, false, true);
$packagexml->setOptions(array('filelistgenerator' => 'file',
      'packagedirectory' => dirname(dirname(dirname(__FILE__))),
      'baseinstalldir' => '/',
      'ignore' => array('CVS/', '.svn/', 'package/', ),
'exceptions' => array('BEAR/BEAR/bin/bear.sh' => 'script'),
'installexceptions' => array('BEAR/BEAR/bin/bear.sh' => '/'),
'installas' => array('BEAR/BEAR/bin/bear.sh' => 'bear'),
'dir_roles' => array('data'=>'data', 'bin'=>'script', 'inc'=>'php'),
      'simpleoutput' => true));


$packagexml->setPackageType('php');
$packagexml->addRelease();
$packagexml->setPackage($config['package']);
$packagexml->setChannel($config['channel']);
$packagexml->setReleaseVersion($config['release_ver']);
$packagexml->setAPIVersion($config['api_ver']);
$packagexml->setReleaseStability($config['stability']);
$packagexml->setAPIStability($config['stability']);
$packagexml->setSummary($config['summery']);
$packagexml->setDescription($config['description']);
$packagexml->setNotes($config['note']);
$packagexml->setPhpDep($config['dep_php']);
$packagexml->setPearinstallerDep($config['pear_ver']);
$packagexml->addMaintainer('lead', 'koriyama' , 'Koriyama', 'koriyama@users.sourceforge.jp');
$packagexml->setLicense('The BSD License', 'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->addRole('sh', 'script');
$packagexml->addRole('conf', 'php');
$packagexml->addRole('yml', 'php');
$packagexml->addRole('css', 'php');

$packagexml->addGlobalReplacement('pear-config', '@PEAR-DIR@', 'php_dir');
$packagexml->addGlobalReplacement('pear-config', '@DATA-DIR@', 'data_dir');
$packagexml->addGlobalReplacement('pear-config', '@PHP-BIN@', 'bin_dir');



$packagexml->generateContents();
//$pkg = &$packagexml->exportCompatiblePackageFile1();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
//    $pkg->writePackageFile();
    $packagexml->writePackageFile();
//    $packagexml->debugPackageFile();
} else {
//    $pkg->debugPackageFile();
//    $packagexml->writePackageFile();
    $packagexml->debugPackageFile();
}
?>
