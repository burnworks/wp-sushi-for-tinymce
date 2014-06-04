(function(tinymce) {
	tinymce.create('tinymce.plugins.SushiPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceSushi', function() {
				ed.windowManager.open({
					file : url + '/sushi.html',
					width : 580 + parseInt(ed.getLang('sushi.delta_width', 0)),
					height : 400 + parseInt(ed.getLang('sushi.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('sushi', {
        title: '\u5bff\u53f8\u3086\u304d',
				cmd : 'mceSushi',
				image : url + '/sushiyuki/sushiyukicon_toro.png'
			});
		},

		getInfo : function() {
			return {
				longname : 'TinyMCE Sushiyuki Plugin',
				author : 'Yoshiki kato',
				authorurl : 'http://hyper-text.org/',
				infourl : 'https://github.com/burnworks/wp-sushi-for-tinymce',
				version : '1.0'
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('SushiForTinyMCE', tinymce.plugins.SushiPlugin);
})(tinymce);