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
					a.addWithPopup( b, "Animation", "animate" );
					a.addWithPopup( b, "Post List", "posts_list" );
					a.addWithPopup( b, "Recent Posts", "recent_posts" );
					a.addWithPopup( b, "Portfolio Boxed", "portfolio_boxed" );
					a.addWithPopup( b, "Portfolio Items", "portfolio" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Table", "table" );
					a.addWithPopup( b, "Dropcaps", "dropcap" );
					a.addWithPopup( b, "Pullquote", "pullquote" );
					a.addWithPopup( b, "Horizontal Rule", "hr" );
					a.addWithPopup( b, "Spacer", "spacer" );
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "List", "list" );
					a.addWithPopup( b, "Icon", "icon" );
					a.addWithPopup( b, "Icobox", "icobox" );
					a.addWithPopup( b, "Box", "box" );
					a.addWithPopup( b, "Section", "section" );
					a.addWithPopup( b, "Video in Monitor", "video_in_monitor" );
					a.addWithPopup( b, "Call to Action", "cta" );
					a.addWithPopup( b, "Intro section", "cta_block" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Carousel", "carousel" );
					a.addWithPopup( b, "Partners", "partners" );
					a.addWithPopup( b, "Pricing Tables", "pricing_table" );
					a.addWithPopup( b, "Accordion", "accordion" );
					a.addWithPopup( b, "Progress Bar", "progress" );
					a.addWithPopup( b, "Testimonial", "testimonial" );
					a.addWithPopup( b, "Timeline", "timeline" );
					a.addWithPopup( b, "Team Member", "member" );
					a.addWithPopup( b, "List Group", "lgroup" );
					a.addWithPopup( b, "Join Buttons", "social_btns" );
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