<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $view['file_path'] . " ({$view['mod_date']})" . " {$view['is_writable_label']}" ?></title>
    <link href="../css/debug.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="pandaEdit.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="ace/theme-eclipse.js" type="text/javascript" charset="utf-8"></script>
    <script src="ace/mode-php.js" type="text/javascript" charset="utf-8"></script>
	<!--    <script src="ace/keybinding-vim.js" type="text/javascript" charset="utf-8"></script>-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="jquery.keybind/jquery.keybind.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="pandaEdit.js"></script>
</head>
<body>
    <div id="lavel" class="editor_label"><span class="editor_file"><?php echo $view['file_path']?></span><span class="editor_file_save">SAVE</span></div>
    <pre id="editor"><?php echo $view['file_contents']; ?></pre>
    <script>
    $(function(){
    	editor = $.pandaEdit.factory();
		// var vim = require("ace/keyboard/keybinding/vim").Vim;
		// editor.setKeyboardHandler(vim)
        editor.gotoLine(<?php echo $view['line'];?>);
        editor.setReadOnly(<?php echo ($view['is_writable'] ? 'false' : 'true');?>);
        $('#editor').keybind('keyup', {
        	  'C-s': function() {$.pandaEdit.save("<?php echo $view['file_path'] ?>", editor.getSession().getValue());
     	}});
    });
    </script>
</body>
</html>