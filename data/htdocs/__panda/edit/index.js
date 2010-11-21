var _editor = new Object();

/**
 * make Editor
 * 
 * @param id
 *            data id
 * @return void
 */
function makeEditor(id, line, lang) {
	_editor[id] = new bespin.editor.Component(id, {
		autocomplete : true
	});
	_editor[id].setContent(dojo.byId('data' + id).value);
	_editor[id].setLineNumber(line);
	bespin.publish("settings:language", {
		language : lang
	});
}

/**
 * save
 * 
 * @param id
 *            data
 * @param path
 *            path to save
 * @param auth
 *            auth key
 * @return void
 */
function save(id, path, auth) {
	var url = 'save.php';
	var data = _editor[id].getContent();
	jQuery('#save' + id).html('saving...').css('color', 'red');
	_editor[id].setFocus(true);
	jQuery.post(url, {
		auth : auth,
		path : path,
		data : data
	}, function(data, status) {
		jQuery('#save' + id).html('saved').css('color', 'green')
				.fadeOut('slow').fadeIn('slow', function() {
					jQuery('#save' + id).html('save').css('color', 'blue')
				});
	}, 'html')
}