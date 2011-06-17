$.pandaEdit = {
	changed : false,
	factory : function() {
		var editor = ace.edit("editor");
		window.aceEditor = editor;
		editor.setTheme("ace/theme/eclipse");
		var PhpMode = require("ace/mode/php").Mode;
		editor.getSession().setMode(new PhpMode());
		editor.getSession().setTabSize(4);
		editor.getSession().setUseSoftTabs(true);
		editor.setHighlightActiveLine(true);
		editor.getSession().on('change', $.pandaEdit.change);
		return editor;
	},
	save : function(file_path, data) {
		if ($.pandaEdit.changed == false) {
			return;
		}
		$.pandaEdit.changed = false;
		var url = 'save.php';
		jQuery.post(url, {
			auth : 1,
			path : file_path,
			data : data
		}, this.label('save'), 'html')
	},
	change : function() {
		console.log($.pandaEdit.changed);
		if ($.pandaEdit.changed == true) {
			return;
		}
		$.pandaEdit.changed = true;
		$.pandaEdit.label('changed');
	},
	label : function(mode) {
		var label = 'div#lavel.editor_label span.editor_file_save';
		if (mode == 'reset') {
			// reset
			jQuery(label).html('SAVE').css('background-color', 'gray')
		} else if (mode == 'changed') {
			// change
			jQuery(label).html('SAVE').css('background-color', 'red')
		} else if (mode == 'save') {
			jQuery(label).html('Saving...').css('background-color', 'green').fadeOut().fadeIn('slow', function() {
				jQuery(label).html('SAVE').css('background-color', 'gray')
			});
		}
	}
}
