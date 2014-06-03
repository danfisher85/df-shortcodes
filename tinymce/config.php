<?php

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'emotion'),
			'desc' => __('Add the button\'s url eg http://example.com', 'emotion')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'emotion'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'emotion'),
			'options' => array(
				'default' => 'Default',
				'style2' => 'Style2',
				'style3' => 'Style3'
			)
		),
		'text' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'emotion'),
			'desc' => __('Add the button\'s text', 'emotion'),
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'emotion'),
			'desc' => __('Select the button\'s size', 'emotion'),
			'options' => array(
				'normal' => 'Normal',
				'large' => 'Large'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'emotion'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'emotion'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		)
		
	),
	'shortcode' => '[button text="{{text}}" link="{{link}}" style="{{style}}" size="{{size}}" target="{{target}}"]',
	'popup_title' => __('Insert Button Shortcode', 'emotion')
);


/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'emotion'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'emotion'),
			'options' => array(
				'error' => 'Error',
				'warning' => 'Warning',
				'info' => 'Info',
				'success' => 'Success'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'emotion'),
			'desc' => __('Add the alert\'s text', 'emotion'),
		)
		
	),
	'shortcode' => '[alert style="{{style}}"] {{content}} [/alert]',
	'popup_title' => __('Insert Alert Shortcode', 'emotion')
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} [clear]', // as there is no wrapper shortcode
	'popup_title' => __('Insert Column Shortcode', 'emotion'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'grid' => array(
				'type' => 'select',
				'label' => __('Column Type', 'emotion'),
				'desc' => __('Select the type, ie width of the column.', 'emotion'),
				'options' => array(
					'grid_1' => 'Grid 1',
					'grid_2' => 'Grid 2',
					'grid_3' => 'Grid 3',
					'grid_4' => 'Grid 4',
					'grid_5' => 'Grid 5',
					'grid_6' => 'Grid 6',
					'grid_7' => 'Grid 7',
					'grid_8' => 'Grid 8',
					'grid_9' => 'Grid 9',
					'grid_10' => 'Grid 10',
					'grid_11' => 'Grid 11',
					'grid_12' => 'Grid 12'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'emotion'),
				'desc' => __('Add the grid content.', 'emotion'),
			)
		),
		'shortcode' => '[{{grid}}] {{content}} [/{{grid}}] ',
		'clone_button' => __('Add Column', 'emotion')
	)
);


/*-----------------------------------------------------------------------------------*/
/*	Horizontal Rules
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['hr'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Rule Style', 'emotion'),
			'desc' => __('Select the rule\'s style', 'emotion'),
			'options' => array(
				'default' => 'Default',
				'dashed' => 'Dashed'
			)
		)
		
	),
	'shortcode' => '[hr style="{{style}}"]',
	'popup_title' => __('Insert Rule Shortcode', 'emotion')
);


/*-----------------------------------------------------------------------------------*/
/*	Spacers
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['spacer'] = array(
	'no_preview' => true,
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => __('Spacer Size', 'emotion'),
			'desc' => __('Select the spacer\'s style', 'emotion'),
			'options' => array(
				'normal' => 'Normal',
				'small' => 'Small'
			)
		)
		
	),
	'shortcode' => '[spacer size="{{size}}"]',
	'popup_title' => __('Insert Spacer Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	Icon Box
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['icobox'] = array(
	'no_preview' => true,
	'params' => array(
		'icon' => array(
			'type' => 'select',
			'label' => __('Icon', 'emotion'),
			'desc' => __('Select the icon', 'emotion'),
			'options' => array(
				'none' => 'none',
				'icon-leaf' => 'icon-leaf',
				'icon-glass' => 'icon-glass',
				'icon-envelope-alt' => 'icon-envelope-alt',
				'icon-star-empty' => 'icon-star-empty',
				'icon-th-large' => 'icon-th-large',
				'icon-ok' => 'icon-ok',
				'icon-zoom-out' => 'icon-zoom-out',
				'icon-cog' => 'icon-cog',
				'icon-file-alt' => 'icon-file-alt',
				'icon-download-alt' => 'icon-download-alt', 
				'icon-inbox' => 'icon-inbox', 
				'icon-refresh' => 'icon-refresh',
				'icon-flag' => 'icon-flag',
				'icon-volume-down' => 'icon-volume-down',
				'icon-barcode' => 'icon-barcode',
				'icon-book' => 'icon-book',
				'icon-camera' => 'icon-camera',
				'icon-italic' => 'icon-italic',
				'icon-align-left' => 'icon-align-left',
				'icon-align-justify' => 'icon-align-justify',
				'icon-indent-right' => 'icon-indent-right',
				'icon-pencil' => 'icon-pencil',
				'icon-tint' => 'icon-tint',
				'icon-check' => 'icon-check',
				'icon-fast-backward' => 'icon-fast-backward',
				'icon-pause' => 'icon-pause',
				'icon-fast-forward' => 'icon-fast-forward',
				'icon-chevron-left' => 'icon-chevron-left',
				'icon-minus-sign' => 'icon-minus-sign',
				'icon-question-sign' => 'icon-question-sign',
				'icon-remove-circle' => 'icon-remove-circle',
				'icon-arrow-left' => 'icon-arrow-left',
				'icon-arrow-down' => 'icon-arrow-down',
				'icon-resize-small' => 'icon-resize-small',
				'icon-asterisk' => 'icon-asterisk',
				'icon-leaf' => 'icon-leaf',
				'icon-eye-close' => 'icon-eye-close',
				'icon-calendar' => 'icon-calendar',
				'icon-magnet' => 'icon-magnet',
				'icon-retweet' => 'icon-retweet',
				'icon-folder-open' => 'icon-folder-open',
				'icon-bar-chart' => 'icon-bar-chart',
				'icon-camera-retro' => 'icon-camera-retro',
				'icon-comments' => 'icon-comments',
				'icon-star-half' => 'icon-star-half',
				'icon-linkedin-sign' => 'icon-linkedin-sign',
				'icon-signin' => 'icon-signin',
				'icon-upload-alt' => 'icon-upload-alt',
				'icon-check-empty' => 'icon-check-empty',
				'icon-twitter' => 'icon-twitter',
				'icon-unlock' => 'icon-unlock',
				'icon-hdd' => 'icon-hdd',
				'icon-certificate' => 'icon-certificate',
				'icon-hand-up' => 'icon-hand-up',
				'icon-circle-arrow-right' => 'icon-circle-arrow-right',
				'icon-globe' => 'icon-globe',
				'icon-filter' => 'icon-filter',
				'icon-group' => 'icon-group',
				'icon-beaker' => 'icon-beaker',
				'icon-paper-clip' => 'icon-paper-clip',
				'icon-reorder' => 'icon-reorder',
				'icon-strikethrough' => 'icon-strikethrough',
				'icon-magic' => 'icon-magic',
				'icon-pinterest-sign' => 'icon-pinterest-sign',
				'icon-money' => 'icon-money',
				'icon-caret-left' => 'icon-caret-left',
				'icon-sort' => 'icon-sort',
				'icon-envelope' => 'icon-envelope',
				'icon-legal' => 'icon-legal',
				'icon-comments-alt' => 'icon-comments-alt',
				'icon-umbrella' => 'icon-umbrella',
				'icon-exchange' => 'icon-exchange',
				'icon-user-md' => 'icon-user-md',
				'icon-bell-alt' => 'icon-bell-alt',
				'icon-file-text-alt' => 'icon-file-text-alt',
				'icon-ambulance' => 'icon-ambulance',
				'icon-beer' => 'icon-beer',
				'icon-double-angle-left' => 'icon-double-angle-left', 
				'icon-double-angle-down' => 'icon-double-angle-down',
				'icon-angle-up' => 'icon-angle-up',
				'icon-laptop' => 'icon-laptop',
				'icon-circle-blank' => 'icon-circle-blank',
				'icon-spinner' => 'icon-spinner',
				'icon-github-alt' => 'icon-github-alt',
				'icon-expand-alt' => 'icon-expand-alt',
				'icon-frown' => 'icon-frown',
				'icon-keyboard' => 'icon-keyboard',
				'icon-terminal' => 'icon-terminal',
				'icon-mail-reply-all' => 'icon-mail-reply-all',
				'icon-crop' => 'icon-crop',
				'icon-question' => 'icon-question',
				'icon-superscript' => 'icon-superscript',
				'icon-puzzle-piece' => 'icon-puzzle-piece',
				'icon-shield' => 'icon-shield',
				'icon-rocket' => 'icon-rocket',
				'icon-chevron-sign-right' => 'icon-chevron-sign-right',
				'icon-html5' => 'icon-html5',
				'icon-unlock-alt' => 'icon-unlock-alt',
				'icon-ellipsis-vertical' => 'icon-ellipsis-vertical',
				'icon-ticket' => 'icon-ticket',
				'icon-level-up' => 'icon-level-up',
				'icon-edit-sign' => 'icon-edit-sign',
				'icon-compass' => 'icon-compass',
				'icon-expand' => 'icon-expand',
				'icon-usd' => 'icon-usd',
				'icon-cny' => 'icon-cny',
				'icon-file' => 'icon-file',
				'icon-sort-by-alphabet-alt' => 'icon-sort-by-alphabet-alt', 
				'icon-sort-by-order' => 'icon-sort-by-order',
				'icon-thumbs-down' => 'icon-thumbs-down',
				'icon-xing' => 'icon-xing',
				'icon-dropbox' => 'icon-dropbox',
				'icon-flickr' => 'icon-flickr',
				'icon-bitbucket-sign' => 'icon-bitbucket-sign',
				'icon-long-arrow-down' => 'icon-long-arrow-down',
				'icon-long-arrow-right' => 'icon-long-arrow-right',
				'icon-android' => 'icon-android',
				'icon-skype' => 'icon-skype',
				'icon-female' => 'icon-female',
				'icon-sun' => 'icon-sun',
				'icon-bug' => 'icon-bug',
				'icon-renren' => 'icon-renren',
				'icon-music' => 'icon-music',
				'icon-heart' => 'icon-heart',
				'icon-user' => 'icon-user',
				'icon-th' => 'icon-th',
				'icon-remove' => 'icon-remove',
				'icon-off' => 'icon-off',
				'icon-trash' => 'icon-trash',
				'icon-time' => 'icon-time',
				'icon-download' => 'icon-download',
				'icon-play-circle' => 'icon-play-circle',
				'icon-list-alt' => 'icon-list-alt',
				'icon-headphones' => 'icon-headphones',
				'icon-volume-up' => 'icon-volume-up',
				'icon-tag' => 'icon-tag',
				'icon-bookmark' => 'icon-bookmark',
				'icon-font' => 'icon-font',
				'icon-text-height' => 'icon-text-height',
				'icon-align-center' => 'icon-align-center',
				'icon-list' => 'icon-list',
				'icon-facetime-video' => 'icon-facetime-video',
				'icon-map-marker' => 'icon-map-marker',
				'icon-edit' => 'icon-edit',
				'icon-move' => 'icon-move',
				'icon-backward' => 'icon-backward',
				'icon-stop' => 'icon-stop',
				'icon-step-forward' => 'icon-step-forward',
				'icon-chevron-right' => 'icon-chevron-right',
				'icon-remove-sign' => 'icon-remove-sign',
				'icon-info-sign' => 'icon-info-sign',
				'icon-ok-circle' => 'icon-ok-circle',
				'icon-arrow-right' => 'icon-arrow-right',
				'icon-share-alt' => 'icon-share-alt',
				'icon-plus' => 'icon-plus',
				'icon-exclamation-sign' => 'icon-exclamation-sign',
				'icon-fire' => 'icon-fire',
				'icon-warning-sign' => 'icon-warning-sign',
				'icon-random' => 'icon-random',
				'icon-chevron-up' => 'icon-chevron-up',
				'icon-shopping-cart' => 'icon-shopping-cart',
				'icon-resize-vertical' => 'icon-resize-vertical',
				'icon-twitter-sign' => 'icon-twitter-sign',
				'icon-key' => 'icon-key',
				'icon-thumbs-up-alt' => 'icon-thumbs-up-alt',
				'icon-heart-empty' => 'icon-heart-empty',
				'icon-pushpin' => 'icon-pushpin',
				'icon-trophy' => 'icon-trophy',
				'icon-lemon' => 'icon-lemon',
				'icon-bookmark-empty' => 'icon-bookmark-empty',
				'icon-facebook' => 'icon-facebook',
				'icon-credit-card' => 'icon-credit-card',
				'icon-bullhorn' => 'icon-bullhorn',
				'icon-hand-right' => 'icon-hand-right',
				'icon-hand-down' => 'icon-hand-down',
				'icon-circle-arrow-up' => 'icon-circle-arrow-up',
				'icon-wrench' => 'icon-wrench',
				'icon-briefcase' => 'icon-briefcase',
				'icon-link' => 'icon-link',
				'icon-cut' => 'icon-cut',
				'icon-save' => 'icon-save',
				'icon-list-ul' => 'icon-list-ul',
				'icon-underline' => 'icon-underline',
				'icon-truck' => 'icon-truck',
				'icon-google-plus-sign' => 'icon-google-plus-sign',
				'icon-caret-down' => 'icon-caret-down',
				'icon-caret-right' => 'icon-caret-right',
				'icon-sort-down' => 'icon-sort-down',
				'icon-linkedin' => 'icon-linkedin',
				'icon-dashboard' => 'icon-dashboard',
				'icon-bolt' => 'icon-bolt',
				'icon-paste' => 'icon-paste',
				'icon-cloud-download' => 'icon-cloud-download',
				'icon-stethoscope' => 'icon-stethoscope',
				'icon-coffee' => 'icon-coffee',
				'icon-building' => 'icon-building',
				'icon-medkit' => 'icon-medkit',
				'icon-h-sign' => 'icon-h-sign',
				'icon-double-angle-right' => 'icon-double-angle-right',
				'icon-angle-left' => 'icon-angle-left',
				'icon-angle-down' => 'icon-angle-down',
				'icon-tablet' => 'icon-tablet',
				'icon-quote-left' => 'icon-quote-left',
				'icon-circle' => 'icon-circle',
				'icon-folder-close-alt' => 'icon-folder-close-alt',
				'icon-collapse-alt' => 'icon-collapse-alt',
				'icon-meh' => 'icon-meh',
				'icon-flag-alt' => 'icon-flag-alt',
				'icon-code' => 'icon-code',
				'icon-star-half-empty' => 'icon-star-half-empty',
				'icon-code-fork' => 'icon-code-fork',
				'icon-info' => 'icon-info',
				'icon-subscript' => 'icon-subscript',
				'icon-microphone' => 'icon-microphone',
				'icon-calendar-empty' => 'icon-calendar-empty',
				'icon-maxcdn' => 'icon-maxcdn',
				'icon-chevron-sign-up' => 'icon-chevron-sign-up',
				'icon-css3' => 'icon-css3',
				'icon-bullseye' => 'icon-bullseye',
				'icon-rss-sign' => 'icon-rss-sign',
				'icon-minus-sign-alt' => 'icon-minus-sign-alt',
				'icon-level-down' => 'icon-level-down',
				'icon-external-link-sign' => 'icon-external-link-sign',
				'icon-collapse' => 'icon-collapse',
				'icon-eur' => 'icon-eur',
				'icon-inr' => 'icon-inr',
				'icon-krw' => 'icon-krw',
				'icon-file-text' => 'icon-file-text',
				'icon-sort-by-attributes' => 'icon-sort-by-attributes',
				'icon-sort-by-order-alt' => 'icon-sort-by-order-alt',
				'icon-youtube-sign' => 'icon-youtube-sign',
				'icon-xing-sign' => 'icon-xing-sign',
				'icon-stackexchange' => 'icon-stackexchange',
				'icon-adn' => 'icon-adn',
				'icon-tumblr' => 'icon-tumblr',
				'icon-long-arrow-up' => 'icon-long-arrow-up',
				'icon-apple' => 'icon-apple',
				'icon-linux' => 'icon-linux',
				'icon-foursquare' => 'icon-foursquare',
				'icon-male' => 'icon-male',
				'icon-moon' => 'icon-moon',
				'icon-vk' => 'icon-vk',
				'icon-search' => 'icon-search',
				'icon-star' => 'icon-star',
				'icon-film' => 'icon-film',
				'icon-th-list' => 'icon-th-list',
				'icon-zoom-in' => 'icon-zoom-in',
				'icon-signal' => 'icon-signal',
				'icon-home' => 'icon-home',
				'icon-road' => 'icon-road',
				'icon-upload' => 'icon-upload',
				'icon-repeat' => 'icon-repeat',
				'icon-lock' => 'icon-lock',
				'icon-volume-off' => 'icon-volume-off',
				'icon-qrcode' => 'icon-qrcode',
				'icon-tags' => 'icon-tags',
				'icon-print' => 'icon-print',
				'icon-bold' => 'icon-print',
				'icon-text-width' => 'icon-text-width',
				'icon-align-right' => 'icon-align-right',
				'icon-indent-left' => 'icon-indent-left',
				'icon-picture' => 'icon-picture',
				'icon-adjust' => 'icon-adjust',
				'icon-share' => 'icon-share',
				'icon-step-backward' => 'icon-step-backward',
				'icon-play' => 'icon-play',
				'icon-forward' => 'icon-forward',
				'icon-eject' => 'icon-eject',
				'icon-plus-sign' => 'icon-plus-sign',
				'icon-ok-sign' => 'icon-ok-sign',
				'icon-screenshot' => 'icon-screenshot',
				'icon-ban-circle' => 'icon-ban-circle',
				'icon-arrow-up' => 'icon-arrow-up',
				'icon-resize-full' => 'icon-resize-full',
				'icon-minus' => 'icon-minus',
				'icon-gift' => 'icon-gift',
				'icon-eye-open' => 'icon-eye-open',
				'icon-plane' => 'icon-plane',
				'icon-comment' => 'icon-comment',
				'icon-chevron-down' => 'icon-chevron-down',
				'icon-folder-close' => 'icon-folder-close',
				'icon-resize-horizontal' => 'icon-resize-horizontal',
				'icon-facebook-sign' => 'icon-facebook-sign',
				'icon-cogs' => 'icon-cogs',
				'icon-thumbs-down-alt' => 'icon-thumbs-down-alt',
				'icon-signout' => 'icon-signout',
				'icon-external-link' => 'icon-external-link',
				'icon-github-sign' => 'icon-github-sign',
				'icon-phone' => 'icon-phone',
				'icon-phone-sign' => 'icon-phone-sign',
				'icon-github' => 'icon-github',
				'icon-rss' => 'icon-rss',
				'icon-bell' => 'icon-bell',
				'icon-hand-left' => 'icon-hand-left',
				'icon-circle-arrow-left' => 'icon-circle-arrow-left',
				'icon-circle-arrow-down' => 'icon-circle-arrow-down',
				'icon-tasks' => 'icon-tasks',
				'icon-fullscreen' => 'icon-fullscreen',
				'icon-cloud' => 'icon-cloud',
				'icon-copy' => 'icon-copy',
				'icon-sign-blank' => 'icon-sign-blank',
				'icon-list-ol' => 'icon-list-ol',
				'icon-table' => 'icon-table',
				'icon-pinterest' => 'icon-pinterest',
				'icon-google-plus' => 'icon-google-plus',
				'icon-caret-up' => 'icon-caret-up',
				'icon-columns' => 'icon-columns',
				'icon-sort-up' => 'icon-sort-up',
				'icon-undo' => 'icon-undo',
				'icon-comment-alt' => 'icon-comment-alt',
				'icon-sitemap' => 'icon-sitemap',
				'icon-lightbulb' => 'icon-lightbulb',
				'icon-cloud-upload' => 'icon-cloud-upload',
				'icon-suitcase' => 'icon-suitcase',
				'icon-food' => 'icon-food',
				'icon-hospital' => 'icon-hospital',
				'icon-fighter-jet' => 'icon-fighter-jet',
				'icon-plus-sign-alt' => 'icon-plus-sign-alt',
				'icon-double-angle-up' => 'icon-double-angle-up',
				'icon-angle-right' => 'icon-angle-right',
				'icon-desktop' => 'icon-desktop',
				'icon-mobile-phone' => 'icon-mobile-phone',
				'icon-quote-right' => 'icon-quote-right',
				'icon-reply' => 'icon-reply',
				'icon-folder-open-alt' => 'icon-folder-open-alt',
				'icon-smile' => 'icon-smile',
				'icon-gamepad' => 'icon-gamepad',
				'icon-flag-checkered' => 'icon-flag-checkered',
				'icon-reply-all' => 'icon-reply-all',
				'icon-location-arrow' => 'icon-location-arrow',
				'icon-unlink' => 'icon-unlink',
				'icon-exclamation' => 'icon-exclamation',
				'icon-eraser' => 'icon-eraser',
				'icon-microphone-off' => 'icon-microphone-off',
				'icon-fire-extinguisher' => 'icon-fire-extinguisher',
				'icon-chevron-sign-left' => 'icon-chevron-sign-left',
				'icon-chevron-sign-down' => 'icon-chevron-sign-down',
				'icon-anchor' => 'icon-anchor',
				'icon-ellipsis-horizontal' => 'icon-ellipsis-horizontal',
				'icon-play-sign' => 'icon-play-sign',
				'icon-check-minus' => 'icon-check-minus',
				'icon-check-sign' => 'icon-check-sign',
				'icon-share-sign' => 'icon-share-sign',
				'icon-collapse-top' => 'icon-collapse-top',
				'icon-gbp' => 'icon-gbp',
				'icon-jpy' => 'icon-jpy',
				'icon-btc' => 'icon-btc',
				'icon-sort-by-alphabet' => 'icon-sort-by-alphabet',
				'icon-sort-by-attributes-alt' => 'icon-sort-by-attributes-alt',
				'icon-thumbs-up' => 'icon-thumbs-up',
				'icon-youtube' => 'icon-youtube',
				'icon-youtube-play' => 'icon-youtube-play',
				'icon-instagram' => 'icon-instagram',
				'icon-bitbucket' => 'icon-bitbucket',
				'icon-tumblr-sign' => 'icon-tumblr-sign',
				'icon-long-arrow-left' => 'icon-long-arrow-left',
				'icon-windows' => 'icon-windows',
				'icon-dribble' => 'icon-dribble',
				'icon-trello' => 'icon-trello',
				'icon-gittip' => 'icon-gittip',
				'icon-archive' => 'icon-archive',
				'icon-weibo' => 'icon-weibo'
			)
		),
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Icon\'s Title', 'emotion'),
			'desc' => __('Add the icoboxe\'s text', 'emotion'),
		),
		'text' => array(
			'std' => 'Main Text',
			'type' => 'text',
			'label' => __('Main Text', 'emotion'),
			'desc' => __('Add some text to describe service', 'emotion'),
		)
	),
	'shortcode' => '[icobox icon="{{icon}}" title="{{title}}" text="{{text}}"]',
	'popup_title' => __('Insert Icobox Shortcode', 'emotion')
);




/*-----------------------------------------------------------------------------------*/
/*	Call to Action
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['cta'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Title', 'emotion'),
			'desc' => __('Add the title of this box', 'emotion'),
		),
		'subtitle' => array(
			'std' => 'Subtitle',
			'type' => 'text',
			'label' => __('Subtitle', 'emotion'),
			'desc' => __('Add the subtitle of this box', 'emotion'),
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'emotion'),
			'desc' => __('Add the button\'s url eg http://example.com', 'emotion')
		),
		'text' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'emotion'),
			'desc' => __('Add the button\'s text', 'emotion'),
		)
	),
	'shortcode' => '[cta title="{{title}}" subtitle="{{subtitle}}" text="{{text}}" link="{{link}}"]',
	'popup_title' => __('Insert Call to Action Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	Recent Posts
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['recent_posts'] = array(
	'no_preview' => true,
	'params' => array(
		'num' => array(
			'std' => '4',
			'type' => 'text',
			'label' => __('Number of Posts', 'emotion'),
			'desc' => __('Change the number of displayed posts', 'emotion'),
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Post Type', 'emotion'),
			'desc' => __('Select the post\'s type', 'emotion'),
			'options' => array(
				'post' => 'Post',
				'portfolio' => 'Portfolio',
				'slides' => 'Slides'
			)
		),
		'link_txt' => array(
			'std' => 'Read More',
			'type' => 'text',
			'label' => __('Button\'s text ', 'emotion'),
			'desc' => __('Change button\'s text', 'emotion'),
		),
	),
	'shortcode' => '[recent_posts num="{{num}}" type="{{type}}" link_txt="{{link_txt}}"]',
	'popup_title' => __('Insert Posts Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	Posts
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['posts'] = array(
	'no_preview' => true,
	'params' => array(
		'num' => array(
			'std' => '4',
			'type' => 'text',
			'label' => __('Number of Posts', 'emotion'),
			'desc' => __('Change the number of displayed posts', 'emotion'),
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order', 'emotion'),
			'desc' => __('Select the post\'s order', 'emotion'),
			'options' => array(
				'date' => 'date',
				'name' => 'name',
				'title' => 'title',
				'modified' => 'modified',
				'parent' => 'parent',
				'rand' => 'rand'
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Post Type', 'emotion'),
			'desc' => __('Select the post\'s type', 'emotion'),
			'options' => array(
				'post' => 'Post',
				'portfolio' => 'Portfolio',
				'slides' => 'Slides'
			)
		)
	),
	'shortcode' => '[posts num="{{num}}" order="{{order}}" type="{{type}}"]',
	'popup_title' => __('Insert Posts Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['portfolio'] = array(
	'no_preview' => true,
	'params' => array(
		'num' => array(
			'std' => '4',
			'type' => 'text',
			'label' => __('Number of Posts', 'emotion'),
			'desc' => __('Change the number of displayed posts', 'emotion'),
		),
		'cat_slug' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Categories', 'babysitter'),
			'desc' => __('Comma separate slugs to limit the portfolio items to certain categories.', 'babysitter'),
		),
		'cols' => array(
			'type' => 'select',
			'label' => __('Number of columns', 'emotion'),
			'desc' => __('Select the number of columns. Note: set Fullwidth page template', 'emotion'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[portfolio num="{{num}}" cat_slug="{{cat_slug}}" cols="{{cols}}"]',
	'popup_title' => __('Insert Portfolio Shortcode', 'emotion')
);


/*-----------------------------------------------------------------------------------*/
/*	Team
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['team'] = array(
	'no_preview' => true,
	'params' => array(
		'num' => array(
			'std' => '4',
			'type' => 'text',
			'label' => __('Number of Posts', 'emotion'),
			'desc' => __('Change the number of displayed posts', 'emotion'),
		),
		'item_class' => array(
			'type' => 'select',
			'label' => __('Item class', 'emotion'),
			'desc' => __('Set item class. grid_3 - 4 columns, grid_4 - 3 columns, grid_6 - 2 columns', 'emotion'),
			'options' => array(
				'grid_3' => 'grid_3',
				'grid_4' => 'grid_4',
				'grid_6' => 'grid_6'
			)
		)
	),
	'shortcode' => '[team num="{{num}}" item_class="{{item_class}}"]',
	'popup_title' => __('Insert Team Shortcode', 'emotion')
);





/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs_new'] = array(
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Type', 'emotion'),
			'desc' => __('Select the tab\'s type', 'emotion'),
			'options' => array(
				'hor' => 'Horizontal',
				'ver' => 'Vertical',
				'alt' => 'Alternative'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[tabs_new type="{{type}}"] {{child_shortcode}} [/tabs_new]',
	'popup_title' => __('Insert Tab Shortcode', 'emotion'),
    
	'child_shortcode' => array(
		'params' => array(
	   	'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Tab Title', 'emotion'),
				'desc' => __('Title of the tab', 'emotion'),
	      ),
	      'content' => array(
				'std' => 'Tab Content',
				'type' => 'textarea',
				'label' => __('Tab Content', 'emotion'),
				'desc' => __('Add the tabs content', 'emotion')
	      )
	  ),
		'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
		'clone_button' => __('Add Tab', 'emotion')
	)
);



/*-----------------------------------------------------------------------------------*/
/* Pricing Tables
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['pricing_tables'] = array(
	'params' => array(
		'cols' => array(
			'type' => 'select',
			'label' => __('Number of Columns', 'emotion'),
			'desc' => __('Select number of columns', 'emotion'),
			'options' => array(
				'4' => '4',
				'3' => '3'
			)
		)
	),
	'no_preview' => true,
	'shortcode' => '[pricing_tables cols="{{cols}}"] {{child_shortcode}} [/pricing_tables]',
	'popup_title' => __('Insert Tab Shortcode', 'emotion'),
    
	'child_shortcode' => array(
		'params' => array(
			'price' => array(
				'std' => '$0.00',
				'type' => 'text',
				'label' => __('Plan Price', 'emotion'),
				'desc' => __('Price of the plan', 'emotion'),
			),
	   	'name' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Plan Title', 'emotion'),
				'desc' => __('Title of the plan', 'emotion'),
			),
			'field_1' => array(
				'std' => 'Field1',
				'type' => 'text',
				'label' => __('Field 1', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_2' => array(
				'std' => 'Field2',
				'type' => 'text',
				'label' => __('Field 2', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_3' => array(
				'std' => 'Field3',
				'type' => 'text',
				'label' => __('Field 3', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_4' => array(
				'std' => 'Field4',
				'type' => 'text',
				'label' => __('Field 4', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_5' => array(
				'std' => 'Field5',
				'type' => 'text',
				'label' => __('Field 5', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_6' => array(
				'std' => 'Field6',
				'type' => 'text',
				'label' => __('Field 6', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_7' => array(
				'std' => 'Field7',
				'type' => 'text',
				'label' => __('Field 7', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_8' => array(
				'std' => 'Field8',
				'type' => 'text',
				'label' => __('Field 8', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_9' => array(
				'std' => 'Field9',
				'type' => 'text',
				'label' => __('Field 9', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_10' => array(
				'std' => 'Field10',
				'type' => 'text',
				'label' => __('Field 10', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_11' => array(
				'std' => 'Field11',
				'type' => 'text',
				'label' => __('Field 11', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'field_12' => array(
				'std' => 'Field12',
				'type' => 'text',
				'label' => __('Field 12', 'emotion'),
				'desc' => __('Fill this field or leave empty', 'emotion'),
			),
			'link_txt' => array(
				'std' => 'Sign Up',
				'type' => 'text',
				'label' => __('Plan Button Text', 'emotion'),
				'desc' => __('Button\'s text of the plan', 'emotion'),
			),
			'link_url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Plan Button URL', 'emotion'),
				'desc' => __('Button\'s url of the plan', 'emotion'),
			),
			'active' => array(
				'type' => 'select',
				'label' => __('Featured Plan?', 'emotion'),
				'desc' => __('If you want to highlight this plan please choose "Yes"', 'emotion'),
				'options' => array(
					'no' => 'No',
					'yes' => 'Yes'
				)
			)
	  ),
		'shortcode' => '[pricing_col name="{{name}}" price="{{price}}" link_txt="{{link_txt}}" link_url="{{link_url}}" active="{{active}}" field_1="{{field_1}}" field_2="{{field_2}}" field_3="{{field_3}}" field_4="{{field_4}}" field_5="{{field_5}}" field_6="{{field_6}}" field_7="{{field_7}}" field_8="{{field_8}}" field_9="{{field_9}}" field_10="{{field_10}}" field_11="{{field_11}}" field_12="{{field_12}}"] [/pricing_col]',
		'clone_button' => __('Add Plan Column', 'emotion')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Link
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['link'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std' => 'Put the link here',
			'type' => 'textarea',
			'label' => __('Link', 'emotion'),
			'desc' => __('Add the link\'s text', 'emotion'),
		)
	),
	'shortcode' => '[link] {{content}} [/link]',
	'popup_title' => __('Insert Link Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	List Styles
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['list'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('List Style', 'emotion'),
			'desc' => __('Select the list\'s style, ie the marker type', 'emotion'),
			'options' => array(
				'none' => 'None',
				'checklist' => 'Check list',
				'arrow1' => 'Arrow1',
				'arrow2' => 'Arrow2',
				'arrow3' => 'Arrow3',
				'arrow4' => 'Arrow4',
				'star' => 'Star List'
			)
		)
		
	),
	'shortcode' => '[list style="{{style}}"] [/list]',
	'popup_title' => __('Insert List Shortcode', 'emotion')
);



/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['dropcap'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Style', 'emotion'),
			'desc' => __('Select the dropcap\'s style, ie the color', 'emotion'),
			'options' => array(
				'style1' => 'Style1',
				'style2' => 'Style2',
				'style3' => 'Style3',
				'style4' => 'Style4'
			)
		),
		'rounded' => array(
			'type' => 'select',
			'label' => __('Rounded?', 'emotion'),
			'desc' => __('Select the dropcap\'s style, ie rounded or not', 'emotion'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Size', 'emotion'),
			'desc' => __('Select the dropcap\'s size', 'emotion'),
			'options' => array(
				'normal' => 'Normal',
				'large' => 'Large'
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Dropcap Letter', 'emotion'),
			'desc' => __('Add the single letter, ie A, B, C etc', 'emotion'),
		)
	),
	'shortcode' => '[dropcap style="{{style}}" size="{{size}}" rounded="{{rounded}}"] {{content}} [/dropcap]',
	'popup_title' => __('Insert Dropcap Shortcode', 'emotion')
);


/*-----------------------------------------------------------------------------------*/
/*	Blockquote
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['blockquote'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Blockquote\'s text', 'emotion'),
			'desc' => __('Add text here', 'emotion'),
		)
	),
	'shortcode' => '[blockquote align="{{align}}"] {{content}} [/blockquote]',
	'popup_title' => __('Insert Blockquote Shortcode', 'emotion')
);




/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['accordion'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[accordion] {{child_shortcode}} [/accordion]',
	'popup_title' => __('Insert Accordion Shortcode', 'emotion'),
    
	'child_shortcode' => array(
		'params' => array(
	   	'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Panel Title', 'emotion'),
				'desc' => __('Title of the panel', 'emotion'),
	      ),
	      'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Panel Content', 'emotion'),
				'desc' => __('Add the panel\'s content', 'emotion')
	      ),
	      'state' => array(
				'type' => 'select',
				'label' => __('Panel State', 'emotion'),
				'desc' => __('Select the state of the toggle on page load', 'emotion'),
				'options' => array(
					'closed' => 'Closed',
					'open' => 'Open'
				)
			)
	  ),
		'shortcode' => '[panel title="{{title}}" state="{{state}}"] {{content}} [/panel]',
		'clone_button' => __('Add Panel', 'emotion')
	)
);



/*-----------------------------------------------------------------------------------*/
/*	Carousel
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['carousel'] = array(
	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[carousel] {{child_shortcode}} [/carousel]',
	'popup_title' => __('Insert Carousel Shortcode', 'emotion'),
    
	'child_shortcode' => array(
		'params' => array(
			'link' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('URL', 'emotion'),
				'desc' => __('Add the item\'s url eg http://example.com', 'emotion')
			),
			'target' => array(
				'type' => 'select',
				'label' => __('Link Target', 'emotion'),
				'desc' => __('_self = open in same window. _blank = open in new window', 'emotion'),
				'options' => array(
					'_self' => '_self',
					'_blank' => '_blank'
				)
			),
	      'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Item Content', 'emotion'),
				'desc' => __('Add the item\'s content', 'emotion')
	      )
	  ),
		'shortcode' => '[item link="{{link}}" target="{{target}}"] {{content}} [/item]',
		'clone_button' => __('Add Item', 'emotion')
	)
);



/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['slider'] = array(
	'params' => array(
		'animation' => array(
			'type' => 'select',
			'label' => __('Animation', 'emotion'),
			'desc' => __('Select animation', 'emotion'),
			'options' => array(
				'fade' => 'Fade',
				'slide' => 'Slide'
			)
		),
		'nav' => array(
			'type' => 'select',
			'label' => __('Show navigation?', 'emotion'),
			'desc' => __('Prev/next buttons', 'emotion'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'bullets' => array(
			'type' => 'select',
			'label' => __('Show pagination?', 'emotion'),
			'desc' => __('Bullets', 'emotion'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'speed' => array(
			'std' => '7000',
			'type' => 'text',
			'label' => __('Animation Speed', 'emotion'),
			'desc' => __('Add the animation speed', 'emotion')
      )
	),
	'no_preview' => true,
	'shortcode' => '[slider animation="{{animation}}" nav="{{nav}}" bullets="{{bullets}}" speed="{{speed}}"] {{child_shortcode}} [/slider]',
	'popup_title' => __('Insert Slider Shortcode', 'emotion'),
    
	'child_shortcode' => array(
		'params' => array(
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Item Content', 'emotion'),
				'desc' => __('Add the item\'s content', 'emotion')
	      )
		),
		'shortcode' => '[slide]{{content}}[/slide]',
		'clone_button' => __('Add Panel', 'emotion')
	)
);




/*-----------------------------------------------------------------------------------*/
/*	Progress Bar
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['bar'] = array(
	'no_preview' => true,
	'params' => array(
		'progress' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Progress Value', 'emotion'),
			'desc' => __('Add the value of the progress (max 100)', 'emotion'),
		),
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Progress Title', 'emotion'),
			'desc' => __('Title of the progress bar', 'emotion'),
      )
	),
	'shortcode' => '[bar progress="{{progress}}" title="{{title}}"]',
	'popup_title' => __('Insert Progress Bar Shortcode', 'emotion')
);


?>