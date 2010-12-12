<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Panda Edit - <?php echo $file;?></title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="index.css" type="text/css" media="screen">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.3.2/dojo/dojo.xd.js"></script>
	<script type="text/javascript" src="/__panda/bespin/embed.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="index.js"></script>
</head>
<body>
	<?php echo "<b>File: </b>{$file}&nbsp;{$save}"; ?><a href="<?php echo $shorter;?>">[-]</a><a href="<?php echo $longer;?>">[+]</a>
	<div id="<?php echo $id; ?>" class="beditor"
	    style="background-color:#222222; color:gray; height:<?php echo $editorH;?>px; border: 10px solid #ddd; -moz-border-radius: 10px; -webkit-border-radius: 10px; visibility: visible;">loading...</div>
	<form id="form<?php echo $id; ?>"form style="display: none;">
	<textarea id="data<?php echo $id; ?>"><?php echo htmlspecialchars($data); ?></textarea>
	</form>
	<?php echo "<b>Modified:</b>$moddate <b>Own:</b>{$ownerInfo['name']}({$fileperms})" ?>
	<script>
	makeEditor('<?php echo $id; ?>', <?php echo $line; ?>, 'php');
	</script>
</body>
</html>