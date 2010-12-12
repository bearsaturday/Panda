<?php
require 'Panda.php';

clearstatcache();
$file = $_GET['file'];
$line = isset($_GET['line']) ? $_GET['line'] : 0;
$lan = isset($_GET['lan']) ? $_GET['lan'] : htmlspecialchars(array_pop(explode('.', $file)));
if (!is_readable($file)) {
	Panda::message('Pande Editor Error', "File Not Available. [{$file}]");
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
$editorH = $_COOKIE['editorh'] = isset($_GET['editorh']) ? $_GET['editorh'] : (isset($_COOKIE['editorh']) ? $_COOKIE['editorh'] : '500');
$shorter = ($editorH > 300) ? $editorH - 50 : $editorH;
$shorter = "?file={$file}&line={$line}&editorh={$shorter}";
$longer = $editorH + 50;
$longer = "?file={$file}&line={$line}&editorh={$longer}";
setcookie('editorh', $editorH, time()+60*60*24*30, '/__panda/edit/');
include 'view.php';
?>
