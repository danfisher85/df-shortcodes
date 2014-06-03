(function ()
{
	// create zillaShortcodes plugin
	tinymce.create("tinymce.plugins.zillaShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("zillaPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Zilla Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "zilla_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('zilla_button', {
					title: "Insert Zilla Shortcode",
					image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
            });

               btn.onRenderMenu.add(function (c, b)
				{	
					a.addWithPopup( b, "Post List", "recent_posts" );
					a.addWithPopup( b, "Posts Main", "posts" );
					a.addWithPopup( b, "Portfolio Items", "portfolio" );
					a.addWithPopup( b, "Team", "team" );
					a.addWithPopup( b, "Shortbar", "shortbar" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Link", "link" );
					a.addWithPopup( b, "Dropcaps", "dropcap" );
					a.addWithPopup( b, "Blockquote", "blockquote" );
					a.addWithPopup( b, "Rules", "hr" );
					a.addWithPopup( b, "Spacer", "spacer" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "List", "list" );
					a.addWithPopup( b, "Icobox", "icobox" );
					a.addWithPopup( b, "Call to Action", "cta" );
					a.addWithPopup( b, "Tabs", "tabs_new" );
					a.addWithPopup( b, "Carousel", "carousel" );
					a.addWithPopup( b, "Slider", "slider" );
					a.addWithPopup( b, "Pricing Tables", "pricing_tables" );
					a.addWithPopup( b, "Accordion", "accordion" );
					a.addWithPopup( b, "Progress Bar", "bar" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("zillaPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Zilla Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add zillaShortcodes plugin
	tinymce.PluginManager.add("zillaShortcodes", tinymce.plugins.zillaShortcodes);
})();