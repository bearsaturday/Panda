<?php
require 'Panda.php';

clearstatcache();
$file = $_GET['file'];
$line = isset($_GET['line']) ? $_GET['line'] : 0;
$lan = isset($_GET['lan']) ? $_GET['lan'] : htmlspecialchars(array_pop(explode('.', $file)));
if (!is_readable($file)) {
	trigger_error("File Not Available. [{$file}]");
	exit();
}
// data set
$data =  file_get_contents($file);
$id = md5($_GET['file']);
$moddate = date (DATE_RFC822, filemtime($file));
$ownerInfo = function_exists('posix_getpwuid') ? posix_getpwuid(fileowner($file)) : array('name'=> 'n/a');
$fileperms = substr(decoct(fileperms($file)), 2);;
$isWritable = is_writable($file);
$auth = md5(session_id() . $id);
$save = $isWritable ? '<a href="#" onClick="save(' . "'{$id}'" .', ' . "'{$file}'" .', ' . "'{$auth}'" .')" style="color:blue" id="save' . $id . '">save</a><br />' : '<span style="color:red">Read Only</span>';

include 'view.php';
?>
