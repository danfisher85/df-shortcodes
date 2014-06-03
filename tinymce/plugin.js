(function($) {
"use strict";
			
	//Shortcodes
   tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {
	
	editor.addCommand("zillaPopup", function ( a, params )
	{
		var popup = params.identifier;
		tb_show("Insert Zilla Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
	});

		editor.addButton( 'zilla_button', {
			type: 'splitbutton',
			icon: false,
			title:  'Zilla Shortcodes',
			onclick : function(e) {},
			menu: [

				{
					text: 'Posts',
					menu: [
						{text: 'Post List',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Post List',identifier: 'recent_posts'})
						}},
						{text: 'Posts Main',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Posts Main',identifier: 'posts'})
						}},
						{text: 'Portfolio',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Portfolio',identifier: 'portfolio'})
						}},
						{text: 'Team',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Team',identifier: 'team'})
						}},
						{text: 'Shortbar',onclick:function(){
							editor.execCommand("mceInsertContent", false, '[shortbar]')
						}},
					]
				},
				{text: 'Columns',onclick:function(){
					editor.execCommand("zillaPopup", false, {title: 'Columns',identifier: 'columns'})
				}},

				{
					text: 'Typography',
					menu: [
						{text: 'Buttons',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Buttons',identifier: 'button'})
						}},
						{text: 'Link',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Link',identifier: 'link'})
						}},
						{text: 'Dropcaps',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Dropcaps',identifier: 'dropcap'})
						}},
						{text: 'Blockquote',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Blockquote',identifier: 'blockquote'})
						}},
						{text: 'Rules',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Rules',identifier: 'hr'})
						}},
						{text: 'Spacers',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Spacers',identifier: 'spacer'})
						}},
						{text: 'Lists',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Lists',identifier: 'list'})
						}},
					]
				},

				
				{text: 'Alerts',onclick:function(){
					editor.execCommand("zillaPopup", false, {title: 'Alerts',identifier: 'alert'})
				}},

				{
					text: 'Elements',
					menu: [
						{text: 'Icobox',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Icobox',identifier: 'icobox'})
						}},
						{text: 'Call to Action',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Call to Action',identifier: 'cta'})
						}},
						{text: 'Tabs',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Tabs',identifier: 'tabs_new'})
						}},
						{text: 'Carousel',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Carousel',identifier: 'carousel'})
						}},
						{text: 'Slider',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Slider',identifier: 'slider'})
						}},
						{text: 'Pricing Tables',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Pricing Tables',identifier: 'pricing_tables'})
						}},
						{text: 'Accordion',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Accordion',identifier: 'accordion'})
						}},
						{text: 'Progress Bar',onclick:function(){
							editor.execCommand("zillaPopup", false, {title: 'Progress Bar',identifier: 'bar'})
						}},
					]
				}
			]
	});

 });
         

 
})(jQuery);
