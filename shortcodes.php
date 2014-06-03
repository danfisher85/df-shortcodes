<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('grid_column')) {
	function grid_column($atts, $content=null, $shortcodename ="")
	{	
		extract(shortcode_atts(array(
			'class' => ''
		), $atts));
		
		//remove wrong nested <p>
		$content = remove_invalid_tags($content, array('p'));

		// add divs to the content
		$return = '<div class="'.$shortcodename.' '.$class.'">';
		$return .= do_shortcode($content);
		$return .= '</div>';

		return $return;
	}
	add_shortcode('grid_1', 'grid_column');
	add_shortcode('grid_2', 'grid_column');
	add_shortcode('grid_3', 'grid_column');
	add_shortcode('grid_4', 'grid_column');
	add_shortcode('grid_5', 'grid_column');
	add_shortcode('grid_6', 'grid_column');
	add_shortcode('grid_7', 'grid_column');
	add_shortcode('grid_8', 'grid_column');
	add_shortcode('grid_9', 'grid_column');
	add_shortcode('grid_10', 'grid_column');
	add_shortcode('grid_11', 'grid_column');
	add_shortcode('grid_12', 'grid_column');
}

// Clear
if (!function_exists('shortcode_clear')) {
	function shortcode_clear() {
		return '<div class="clear"></div>';
	}

	add_shortcode('clear', 'shortcode_clear');
}




/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('button_shortcode')) {
	function button_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'style' => 'default',
			   'link' => '#',
			   'text' => 'Button',
				'size' => 'normal',
				'target' => '_self'
	   ), $atts));
	    
		$output =  '<a href="'.$link.'" title="'.$text.'" class="btn btn-'.$size.' btn-'.$style.'" target="'.$target.'">';
			$output .= $text;
		$output .= '</a>';

	   return $output;

	}
	add_shortcode('button', 'button_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Link
/*-----------------------------------------------------------------------------------*/

if (!function_exists('link_shortcode')) {
	function link_shortcode($args, $content) {
		return '<span class="link"><span>'.do_shortcode($content).'</span> &nbsp; &rarr;</span>';
	}
	add_shortcode('link', 'link_shortcode');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('alert')) {
	function alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'error'
	    ), $atts));
		
	   return '<div class="alert alert-'.$style.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert', 'alert');
}



/*-----------------------------------------------------------------------------------*/
/*	Horizontal Rules
/*-----------------------------------------------------------------------------------*/

if (!function_exists('hr_shortcode')) {
	function hr_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'default'
	    ), $atts));

		return '<div class="hr hr-'.$style.'"></div>';
	}
	add_shortcode('hr', 'hr_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Spacer
/*-----------------------------------------------------------------------------------*/

if (!function_exists('emotion_spacer_shortcode')) {
	function emotion_spacer_shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
			'size'   => 'default'
	    ), $atts));

		$output = '<div class="spacer spacer__'.$size.'"></div>';
		return $output;
	}
	add_shortcode('spacer', 'emotion_spacer_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Recent Posts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shortcode_recent_posts')) {
	
	function shortcode_recent_posts($atts, $content = null) {
		
		extract(shortcode_atts(array(
				'type' => 'post',											 
				'num' => '5',
				'link_txt' => 'Read More'
		), $atts));

		$output = '<div class="latest-posts-holder">';

		global $post;
		global $emotion_string_limit_words;
		
		$args = array(
			'post_type' => $type,
			'numberposts' => $num,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'suppress_filters' => 0
		);

		$latest = get_posts($args);
		
		foreach($latest as $k => $post) {
			// Unset not translated posts
			if ( function_exists( 'wpml_get_language_information' ) ) {
				global $sitepress;
				$check = wpml_get_language_information( $post->ID );
				$language_code = substr( $check['locale'], 0, 2 );
				if ( $language_code != $sitepress->get_current_language() ) unset( $latest[$k] );

				// Post ID is different in a second language Solution
				if ( function_exists( 'icl_object_id' ) ) $post = get_post( icl_object_id( $post->ID, $type, true ) );
				}

				setup_postdata($post);
				$excerpt = get_the_excerpt();

				$categories = get_the_category();
				$separator = ' / ';
				$display = '';

				if($categories){
					foreach($categories as $category) {
						$display .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "emotion" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
					}
				}

				$output .= '<article class="post clearfix">';


				if ( has_post_thumbnail($post->ID) ){
					$output .= '<figure class="featured-thumb"><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
					$output .= get_the_post_thumbnail($post->ID);
					$output .= '</a></figure>';
				}
				$output .= '<header class="post-header">';
					$output .= '<h3><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
							$output .= get_the_title($post->ID);
					$output .= '</a></h3>';
					$output .= '<p class="post-meta">';
						$output .= '<span class="post-meta-cats"><i class="icon-tag"></i>';
							$output .= trim($display, $separator);
						$output .= '</span>';
						$output .= '<span class="post-meta-author">';
							$output .= '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'"><i class="icon-user"></i>';
								$output .= get_the_author();
							$output .= '</a>';
						$output .= '</span>';
						$output .= '<span class="post-meta-comments">';
							$output .= '<a href="'.get_comments_link($post->ID).'"><i class="icon-comment"></i>';
								$output .= get_comments_number($post->ID);
							$output .= '</a>';
						$output .= '</span>';
					$output .= '</p>';
				$output .= '</header>';
				

				$output .= '<div class="post-excerpt">';
					$output .= '<p>';
						$output .= emotion_string_limit_words($excerpt,25);
					$output .= '</p>';
					$output .= '<a href="'.get_permalink($post->ID).'" class="btn" title="'.get_the_title($post->ID).'">';
						$output .= $link_txt;
					$output .= '</a>';
				$output .= '</div>';
				
			$output .= '</article>';
				
		}
				
		$output .= '</div>';
		return $output;
	}

	add_shortcode('recent_posts', 'shortcode_recent_posts');
}


/*-----------------------------------------------------------------------------------*/
/*	Posts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shortcode_posts')) {

	function shortcode_posts($atts, $content = null) {
			
			extract(shortcode_atts(array(
					'type' => 'post',
					'order' => 'post_date',
					'cat' => '',											 
					'num' => '4'
			), $atts));

			$output = '<ul class="post-loop unstyled clearfix">';

			global $post;
			global $emotion_string_limit_words;
			
			$args = array(
				'post_type' => $type,
				'numberposts' => $num,
				'orderby' => $order,
				'category_name' => $cat,
				'order' => 'DESC',
				'suppress_filters' => 0
			);

			$latest = get_posts($args);
			
			foreach($latest as $k => $post) {
				// Unset not translated posts
				if ( function_exists( 'wpml_get_language_information' ) ) {
					global $sitepress;
					$check = wpml_get_language_information( $post->ID );
					$language_code = substr( $check['locale'], 0, 2 );
					if ( $language_code != $sitepress->get_current_language() ) unset( $latest[$k] );

					// Post ID is different in a second language Solution
					if ( function_exists( 'icl_object_id' ) ) $post = get_post( icl_object_id( $post->ID, $type, true ) );
					}

					setup_postdata($post);

					$categories = get_the_category();
					$separator = ' / ';
					$display = '';

					if($categories){
						foreach($categories as $category) {
							$display .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", "emotion"), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
					}

					$output .= '<li>';

					if ( has_post_thumbnail($post->ID) ){
						$output .= get_the_post_thumbnail($post->ID, 'medium');
					}
					$output .= '<div class="post-caption">';
						$output .= '<span class="post-cats">';
							$output .= trim($display, $separator);
						$output .= '</span>';
						$output .= '<h4><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= get_the_title($post->ID);
						$output .= '</a></h4>';
					$output .= '</div>';
					
				$output .= '</li>';
					
			}
					
			$output .= '</ul>';
			return $output;
			
	}

	add_shortcode('posts', 'shortcode_posts');
}



/*-----------------------------------------------------------------------------------*/
/*	Portfolio
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shortcode_portfolio')) {
	function shortcode_portfolio($atts, $content = null) {
			
			extract(shortcode_atts(array(
					'cat_slug' => '',
					'cols' => '4',							 
					'num' => '4'
			), $atts));

			$output = '<div class="project-feed">';

			global $post;
			global $emotion_string_limit_words;
			
			$args = array(
				'post_type' => 'portfolio',
				'numberposts' => $num,
				'orderby' => 'date',
				'portfolio_category' => $cat_slug,
				'order' => 'DESC',
				'suppress_filters' => 0
			);


			$thumb_size = '';

			if($cols == 2) {
				$cols = "grid_6";
				$thumb_size = "folio-large";
			} elseif($cols == 3) {
				$cols = "grid_4";
				$thumb_size = "folio-medium";
			} else {
				$cols = "grid_3";
				$thumb_size = "folio-small";
			}

			$latest = get_posts($args);
			
			foreach($latest as $k => $post) {
				// Unset not translated posts
				if ( function_exists( 'wpml_get_language_information' ) ) {
					global $sitepress;
					$check = wpml_get_language_information( $post->ID );
					$language_code = substr( $check['locale'], 0, 2 );
					if ( $language_code != $sitepress->get_current_language() ) unset( $latest[$k] );

					// Post ID is different in a second language Solution
					if ( function_exists( 'icl_object_id' ) ) $post = get_post( icl_object_id( $post->ID, $type, true ) );
					}

					setup_postdata($post);

					$output .= '<div class="project-item '.$cols.'">';

						if ( has_post_thumbnail($post->ID) ){
						$output .= '<figure class="project-img">';
							$output .= '<a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
							$output .= get_the_post_thumbnail($post->ID, $thumb_size);;
							$output .= '</a>';
						$output .= '</figure>';
						}


						$output .= '<div class="project-desc">';
						$output .= '<h3><a href="'.get_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
								$output .= get_the_title($post->ID);
						$output .= '</a></h3>';
						$output .= '</div>';
					
				$output .= '</div>';
					
			}
					
			$output .= '</div>';
			return $output;
			
	}

	add_shortcode('portfolio', 'shortcode_portfolio');
}




/*-----------------------------------------------------------------------------------*/
/*	Team
/*-----------------------------------------------------------------------------------*/

if (!function_exists('team_shortcode')) {
	function team_shortcode($atts, $content = null) {

		extract(shortcode_atts(array(
				'num' => '4',
				'item_class' => 'grid_3',
				'offset' => ''
		), $atts));

		$args = array(
			'post_type' => 'team',
			'numberposts' => $num,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'offset' => $offset,
			'suppress_filters' => 0
		);

		$team = get_posts($args);

		$output = '<div class="team-holder clearfix">';
		
		global $post;

		foreach($team as $k => $post) {
			// Unset not translated posts
			if ( function_exists( 'wpml_get_language_information' ) ) {
				global $sitepress;
				$check = wpml_get_language_information( $post->ID );
				$language_code = substr( $check['locale'], 0, 2 );
				if ( $language_code != $sitepress->get_current_language() ) unset( $team[$k] );

				// Post ID is different in a second language Solution
				if ( function_exists( 'icl_object_id' ) ) $post = get_post( icl_object_id( $post->ID, $type, true ) );
				}
				setup_postdata($post);
				$position =  get_post_meta(get_the_ID(), 'emotion_team_role', true);
				$twitter =  get_post_meta(get_the_ID(), 'emotion_team_twitter', true);
				$facebook =  get_post_meta(get_the_ID(), 'emotion_team_facebook', true);
				$googleplus =  get_post_meta(get_the_ID(), 'emotion_team_gplus', true);
				$dribbble =  get_post_meta(get_the_ID(), 'emotion_team_dribbble', true);
				$linkedin =  get_post_meta(get_the_ID(), 'emotion_team_linkedin', true);
				$excerpt = get_the_excerpt();

				$output .= '<div class="item-team '.$item_class.'">';
					if ( has_post_thumbnail($post->ID) ){
						$output .= '<figure class="team-img"><a href="'.get_permalink($post->ID).'">';
							$output .= get_the_post_thumbnail($post->ID, 'medium');
						$output .= '</a></figure>';
					}
					$output .= '<hgroup>';
						$output .= '<h4><a href="'.get_permalink($post->ID).'">';
							$output .= get_the_title($post->ID);
						$output .= '</a></h4>';
						$output .= '<h5>';
							$output .= $position;
						$output .= '</h5>';
					$output .= '</hgroup>';
					
					$output .= '<div class="team-excerpt">';
						$output .= $excerpt;
					$output .= '</div>';

					$output .= '<footer class="team-footer">';
						$output .= '<ul class="social-links unstyled">';
						if($twitter!="") {
							$output .= '<li class="ico-twitter"><a href="'.$twitter.'">Twitter</a></li>';
						}
						if($facebook!="") {
							$output .= '<li class="ico-facebook"><a href="'.$facebook.'">Facebook</a></li>';
						}
						if($googleplus!="") {
							$output .= '<li class="ico-googleplus"><a href="'.$googleplus.'">Google+</a></li>';
						}
						if($dribbble!="") {
							$output .= '<li class="ico-dribbble"><a href="'.$dribbble.'">Dribbble</a></li>';
						}
						if($linkedin!="") {
							$output .= '<li class="ico-linkedin"><a href="'.$linkedin.'">Linkedin</a></li>';
						}
						$output .= '</ul>';
					$output .= '</footer>';
						
				$output .= '</div>';

		}

		$output .= '</div>';

		return $output;

	}

	add_shortcode('team', 'team_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Home Sidebar
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shortbar_sc')) {
	function shortbar_sc( $atts ) {
		ob_start();
		dynamic_sidebar('sidecode');
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	add_shortcode( 'shortbar', 'shortbar_sc' );
}




/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('tabs_new')) {
	function tabs_new( $atts, $content = null ) {
		extract(shortcode_atts(
			array(
				'type' => 'hor',
		 ), $atts));
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		$tabs_type = '';

		if($type == 'ver') {
			$tabs_type = 'tabs__vertical';
		} elseif($type == 'alt') {
			$tabs_type = 'tabs__alt';
		}
		
		if( count($tab_titles) ){
			$output .= '<div id="tabs-'. $i .'" class="tabs clearfix '.$tabs_type.'"><div class="tab-menu">';
			$output .= '<ul>';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
			$output .= '</ul>';
			$output .= '<div class="clear"></div>';
			$output .= '</div><!-- .tab-menu (end) -->';
			$output .= '<div class="tab-wrapper">';
			$output .= do_shortcode( $content );
			$output .= '</div></div>';
		} else {
			$output .= '<div class="tab-wrapper">';
			$output .= do_shortcode( $content );
			$output .= '</div></div>';
		}
		
		return $output;
	}
	add_shortcode( 'tabs_new', 'tabs_new' );
}

if (!function_exists('tab')) {
	function tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="tab-'. sanitize_title( $title ) .'" class="tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'tab', 'tab' );
}




/*-----------------------------------------------------------------------------------*/
/*	Pricing Tables
/*-----------------------------------------------------------------------------------*/

if (!function_exists('pricing_tables_shortcode')) {
	function pricing_tables_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'cols' => '4'
		 ), $atts));

		if($cols=='4') {
			$cols = 'four-cols';
		} else{
			$cols = 'three-cols';
		}

		$output = '<div class="pricing-tables clearfix '.$cols.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';

		return $output;
	}
	add_shortcode('pricing_tables', 'pricing_tables_shortcode');
}


if (!function_exists('pricing_col_shortcode')) {
	// Pricing Column
	function pricing_col_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'name' => '',
				'price' => '$ 0',
				'field_1' => '',
				'field_2' => '',
				'field_3' => '',
				'field_4' => '',
				'field_5' => '',
				'field_6' => '',
				'field_7' => '',
				'field_8' => '',
				'field_9' => '',
				'field_10' => '',
				'field_11' => '',
				'field_12' => '',
				'field_13' => '',
				'field_14' => '',
				'field_15' => '',
				'field_16' => '',
				'field_17' => '',
				'field_18' => '',
				'field_19' => '',
				'field_20' => '',
				'link_txt' => 'Sign Up',
				'link_url' => '#',
				'active' => ''
		), $atts));

		if($active == "yes") {
			$active = "active";
		}

		$output = '<div class="pricing-column">';
			$output .= '<div class="single-pricing-table '.$active.'">';
				$output .= '<header class="pr-head">';
					$output .= '<h4>'.$name.'</h4>';
					$output .= '<h3 class="price">'.$price.'</h3>';
				$output .= '</header>';

				$output .= '<div class="pr-features">';
					$output .= '<ul>';
						if($field_1) {
							$output .= '<li>'.$field_1.'</li>';
						}
						if($field_2) {
							$output .= '<li>'.$field_2.'</li>';
						}
						if($field_3) {
							$output .= '<li>'.$field_3.'</li>';
						}
						if($field_4) {
							$output .= '<li>'.$field_4.'</li>';
						}
						if($field_5) {
							$output .= '<li>'.$field_5.'</li>';
						}
						if($field_6) {
							$output .= '<li>'.$field_6.'</li>';
						}
						if($field_7) {
							$output .= '<li>'.$field_7.'</li>';
						}
						if($field_8) {
							$output .= '<li>'.$field_8.'</li>';
						}
						if($field_9) {
							$output .= '<li>'.$field_9.'</li>';
						}
						if($field_10) {
							$output .= '<li>'.$field_10.'</li>';
						}
						if($field_11) {
							$output .= '<li>'.$field_11.'</li>';
						}
						if($field_12) {
							$output .= '<li>'.$field_12.'</li>';
						}
						if($field_13) {
							$output .= '<li>'.$field_13.'</li>';
						}
						if($field_14) {
							$output .= '<li>'.$field_14.'</li>';
						}
						if($field_15) {
							$output .= '<li>'.$field_15.'</li>';
						}
						if($field_16) {
							$output .= '<li>'.$field_16.'</li>';
						}
						if($field_17) {
							$output .= '<li>'.$field_17.'</li>';
						}
						if($field_18) {
							$output .= '<li>'.$field_18.'</li>';
						}
						if($field_19) {
							$output .= '<li>'.$field_19.'</li>';
						}
						if($field_20) {
							$output .= '<li>'.$field_20.'</li>';
						}
					$output .= '</ul>';
				$output .= '</div>';

				$output .= '<footer class="pr-foot">';
					$output .= '<a href="'.$link_url.'">';
						$output .= $link_txt;
					$output .= '</a>';
				$output .= '</footer>';

			$output .= '</div>';
		$output .= '</div>';

		return $output;

	}
	add_shortcode('pricing_col', 'pricing_col_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Icon Box
/*-----------------------------------------------------------------------------------*/
if (!function_exists('icobox_shortcode')) {
	function icobox_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'icon' => '',
				'title' => '',
			   'text' => ''
	   ), $atts));
	    
		$output =  '<div class="ico-box">';
			$output .= '<div class="ico-holder">';
				$output .= '<i class="'.$icon.'"></i>';
			$output .= '</div>';
			$output .= '<div class="ico-box-content">';
				if($title) {
					$output .= '<h4>';
						$output .= $title;
					$output .= '</h4>';
				}
				$output .= $text;
			$output .= '</div>';
		$output .= '</div>';

	   return $output;

	}
	add_shortcode('icobox', 'icobox_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Call to Action
/*-----------------------------------------------------------------------------------*/

if (!function_exists('cta_shortcode')) {
	function cta_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title' => 'Title',
				'subtitle' => 'Subtitle goes here',
				'text' => 'Click Here',
			   'link' => ''
		), $atts));
	    
		$output =  '<div class="info-box info-box__cta clearfix">';
			$output .= '<div class="cta-inner">';
				$output .= '<h2>';
					$output .= $title;
				$output .= '</h2>';
				$output .= $subtitle;
			$output .= '</div>';
			$output .= '<div class="cta-button-holder">';
				$output .= '<a href="'.$link.'" class="btn btn-large btn-default">';
					$output .= $text;
				$output .= '</a>';
			$output .= '</div>';
		$output .= '</div>';

	   return $output;

	}
	add_shortcode('cta', 'cta_shortcode');
}





/*-----------------------------------------------------------------------------------*/
/*	List Styles
/*-----------------------------------------------------------------------------------*/

if (!function_exists('list_shortcode')) {
	function list_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'checklist'
	    ), $atts));

		if($style == 'none') {
			return '<div class="unstyled">' . do_shortcode($content) . '</div>';
		} else {
			return '<div class="list list-style__'.$style.'">' . do_shortcode($content) . '</div>';
		}
	  
	}
	add_shortcode('list', 'list_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Dropcaps
/*-----------------------------------------------------------------------------------*/

if (!function_exists('dropcap_shortcode')) {
	function dropcap_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'style' => 'style1',
				'size' => 'normal',
				'rounded' => 'no'
		), $atts));

		if($rounded == "yes") {
			$rounded = "rounded";
		}

		$output = '<span class="dropcap dropcap-'.$style.' dropcap-'.$size.' dropcap-'.$rounded.'">';
		$output .= do_shortcode($content);
		$output .= '</span>';

		return $output;
	}
	add_shortcode('dropcap', 'dropcap_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Blockquote
/*-----------------------------------------------------------------------------------*/

if (!function_exists('blockquote_shortcode')) {
	function blockquote_shortcode($atts, $content = null) {

		$output = '<blockquote>';
		$output .= do_shortcode($content);
		$output .= '</blockquote><!-- blockquote (end) -->';

		return $output;
	}
	add_shortcode('blockquote', 'blockquote_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Accordion
/*-----------------------------------------------------------------------------------*/

if (!function_exists('accordion_shortcode')) {
	function accordion_shortcode($atts, $content = null) {

		$output = '<dl class="accordion-wrapper">';
		$output .= do_shortcode($content);
		$output .= '</dl>';

		return $output;
	}
	add_shortcode('accordion', 'accordion_shortcode');
}

if (!function_exists('panel_shortcode')) {
	function panel_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'title' => 'Title goes here',
				'state' => ''
		 ), $atts));

		if($state == 'open') {
			$state = 'active';
		}

		$output = '<dt class="acc-head '.$state.'">';
			$output .= '<a href="#">';
				$output .= $title;
			$output .= '</a>';
		$output .= '</dt>';

		$output .= '<dd class="acc-body">';
			$output .= '<div class="content">';
				$output .= do_shortcode($content);
			$output .= '</div>';
		$output .= '</dd><!-- //.acc-body -->';

		return $output;

	}
	add_shortcode('panel', 'panel_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Progress Bar
/*-----------------------------------------------------------------------------------*/

if (!function_exists('bar_shortcode')) {
	function bar_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'progress' => '10',
				'title' => 'Title'
		), $atts));

		$output = '<div class="progress-bar">';
			$output .= '<h4>';
				$output .= $title . ' (' . $progress . '%)';
			$output .= '</h4>';
			$output .= '<div class="progress-bar-holder">';
				$output .= '<div class="progress-bar-value" style="width:'.$progress.'%">';
					$output .= do_shortcode($content);
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('bar', 'bar_shortcode');
}



/*-----------------------------------------------------------------------------------*/
/*	Carousel
/*-----------------------------------------------------------------------------------*/

if (!function_exists('emotion_carousel_shortcode')) {
	// Carousel Wrapper
	function emotion_carousel_shortcode($atts, $content = null) {

		//Create unique ID for this carousel
		$unique_id = rand();

		$output = '<ul id="carousel-'. $unique_id .'" class="elastislide-list">';
					$output .= do_shortcode($content);
		$output .= '</ul><!-- /es-carousel-wrapper -->';

		$output .= '<script>
		jQuery(document).ready(function() {
			jQuery("#carousel-'. $unique_id .'").elastislide({
				minItems    : 2
			});
		});';
		$output .= '</script>';

		return $output;
	}
	add_shortcode('carousel', 'emotion_carousel_shortcode');
}


if (!function_exists('emotion_carousel_item_shortcode')) {
	// Carousel Item
	function emotion_carousel_item_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'link' => ''
		), $atts));

		$output = '<li>';
			$output .= '<a href="'. $link .'">';
				$output .= do_shortcode($content);
			$output .= '</a>';
		$output .= '</li>';

		return $output;
	}
	add_shortcode('item', 'emotion_carousel_item_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/

if (!function_exists('emotion_slider_shortcode')) {
	function emotion_slider_shortcode($atts, $content = null) {

		extract(shortcode_atts(
			array(
				'animation' => 'fade',
				'nav' => 'true',
				'bullets' => 'true',
			   'speed' => '7000'
	   ), $atts));

		//Create unique ID for this slider
		$unique_id = rand();

		$output = '<div id="flexslider-'. $unique_id .'" class="flexslider loading flexslider__content">';
			$output .= '<ul class="slides">';
				$output .= do_shortcode($content);
			$output .= '</ul>';
		$output .= '</div>';

		$output .= '<script>
		jQuery(window).load(function() {
			jQuery("#flexslider-'.$unique_id.'").flexslider({
				animation: "'.$animation.'",
			  	animationLoop: true,
				directionNav: '.$nav.',
				smoothHeight: true,
				controlNav: '.$bullets.',
				startAt: 0,
				slideshow: true,
				slideshowSpeed: '.$speed.',

				start: function(slider){
					jQuery("#flexslider-'.$unique_id.'").removeClass("loading");
				}
			});
		});';
		$output .= '</script>';

		return $output;
	}
	add_shortcode('slider', 'emotion_slider_shortcode');
}

if (!function_exists('emotion_slide_shortcode')) {
	function emotion_slide_shortcode($atts, $content = null) {

		$output = '<li>';
			$output .= do_shortcode($content);
		$output .= '</li>';

		return $output;
	}
	add_shortcode('slide', 'emotion_slide_shortcode');
}




/*-----------------------------------------------------------------------------------*/
/*	Other old shortcodes (leaved here for compatibility with old version of the theme)
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shortcode_tags')) {
	//Tag Cloud
	function shortcode_tags($atts, $content = null) {

		extract(shortcode_atts(array(
			'color' => 'color1',
			'count' => '0'
	   ), $atts));

		$output = '<div class="tagcloud clearfix tag-'.$color.'">';

		$tags = wp_tag_cloud('smallest=8&largest=8&format=array&number='.$count);
		foreach($tags as $tag){
				$output .= $tag.' ';
		}
		$output .= '</div>';
		return $output;

	}

	add_shortcode('tags', 'shortcode_tags');
}



if (!function_exists('title_shortcode')) {
	// Title
	function title_shortcode($atts, $content = null) {

		$output = '<h4 class="alt-title">';
		$output .= do_shortcode($content);
		$output .= '</h4>';

		return $output;
	}
	add_shortcode('title', 'title_shortcode');
}


if (!function_exists('title_bordered_shortcode')) {
	// Title bordered
	function title_bordered_shortcode($atts, $content = null) {

		$output = '<h2 class="bordered">';
		$output .= do_shortcode($content);
		$output .= '</h2>';

		return $output;
	}
	add_shortcode('title_bordered', 'title_bordered_shortcode');
}


if (!function_exists('emotion_spacer_small_shortcode')) {
	// Spacer Small
	function emotion_spacer_small_shortcode($atts, $content = null) {
		$output = '<div class="spacer spacer__small"></div>';
		return $output;
	}
	add_shortcode('spacer_small', 'emotion_spacer_small_shortcode');
}



if (!function_exists('emotion_box_shortcode')) {
	function emotion_box_shortcode($atts, $content = null) {

		$output = '<div class="info-box">';
		$output .= do_shortcode($content);
		$output .= '</div>';

		return $output;
	}

	add_shortcode('box', 'emotion_box_shortcode');
}


if (!function_exists('frame_left_shortcode')) {
	// Image Frame Left
	function frame_left_shortcode($atts, $content = null) {

	    $output = '<figure class="img-half-width alignleft">';
	    $output .= do_shortcode($content);
	    $output .= '</figure><!-- /frame left -->';

	    return $output;

	}
	add_shortcode('frame_left', 'frame_left_shortcode');
}


if (!function_exists('frame_right_shortcode')) {
	//Image Frame Right
	function frame_right_shortcode($atts, $content = null) {

	    $output = '<figure class="img-half-width alignright">';
	    $output .= do_shortcode($content);
	    $output .= '</figure><!-- /frame right -->';

	    return $output;

	}
	add_shortcode('frame_right', 'frame_right_shortcode');
}


if (!function_exists('tabs_shortcode')) {
	// Tabs
	function tabs_shortcode($atts, $content = null) {

		$output = '<div class="tabs full-w">';
		$output .= '<div class="tab-menu">';
		$output .= '<ul>';

			//Create unique ID for this tab set
			$id = rand();

		//Build tab menu
		$numTabs = count($atts);

		for($i = 1; $i <= $numTabs; $i++){
		  $output .= '<li><a href="#tab-'.$id.'-'.$i.'">'.$atts['tab'.$i].'<i class="l-tab-shad"></i><i class="r-tab-shad"></i></a></li>';
		}

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		$output .= '</div><!-- .tab-menu (end) -->';
		$output .= '<div class="tab-wrapper">';

		//Build content of tabs
		$i = 1;
		$tabContent = do_shortcode($content);
		$find = array();
		$replace = array();
		foreach($atts as $key => $value){
		  $find[] = '['.$key.']';
		  $find[] = '[/'.$key.']';
		  $replace[] = '<div id="tab-'.$id.'-'.$i.'" class="tab">';
		  $replace[] = '</div><!-- .tab (end) -->';
				$i++;
		}

		$tabContent = str_replace($find, $replace, $tabContent);

		$output .= $tabContent;

		$output .= '</div><!-- .tab-wrapper (end) -->';
		$output .= '</div><!-- .tabs (end) -->';

		return $output;

	}

	add_shortcode('tabs', 'tabs_shortcode');
}

if (!function_exists('tabs_vertical_shortcode')) {
	// Tabs Vertical
	function tabs_vertical_shortcode($atts, $content = null) {

		$output = '<div class="tabs tabs__vertical">';
		$output .= '<div class="tab-menu">';
		$output .= '<ul>';

			//Create unique ID for this tab set
			$id = rand();

		//Build tab menu
		$numTabs = count($atts);

		for($i = 1; $i <= $numTabs; $i++){
		  $output .= '<li><a href="#tab-'.$id.'-'.$i.'">'.$atts['tab'.$i].'</a></li>';
		}

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		$output .= '</div><!-- .tab-menu (end) -->';
		$output .= '<div class="tab-wrapper">';

		//Build content of tabs
		$i = 1;
		$tabContent = do_shortcode($content);
		$find = array();
		$replace = array();
		foreach($atts as $key => $value){
		  $find[] = '['.$key.']';
		  $find[] = '[/'.$key.']';
		  $replace[] = '<div id="tab-'.$id.'-'.$i.'" class="tab">';
		  $replace[] = '</div><!-- .tab (end) -->';
				$i++;
		}

		$tabContent = str_replace($find, $replace, $tabContent);

		$output .= $tabContent;

		$output .= '</div><!-- .tab-wrapper (end) -->';
		$output .= '</div><!-- .tabs (end) -->';

		return $output;

	}

	add_shortcode('tabs_ver', 'tabs_vertical_shortcode');
}


if (!function_exists('tabs_alt_shortcode')) {
	// Tabs Alt
	function tabs_alt_shortcode($atts, $content = null) {
		
		$output = '<div class="tabs tabs__alt">';
		$output .= '<div class="tab-menu">';
		$output .= '<ul>';

			//Create unique ID for this tab set
			$id = rand();

		//Build tab menu
		$numTabs = count($atts);

		for($i = 1; $i <= $numTabs; $i++){
		  $output .= '<li><a href="#tab-'.$id.'-'.$i.'">'.$atts['tab'.$i].'<i class="l-tab-shad"></i><i class="r-tab-shad"></i></a></li>';
		}

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';
		$output .= '</div><!-- .tab-menu (end) -->';
		$output .= '<div class="tab-wrapper">';

		//Build content of tabs
		$i = 1;
		$tabContent = do_shortcode($content);
		$find = array();
		$replace = array();
		foreach($atts as $key => $value){
		  $find[] = '['.$key.']';
		  $find[] = '[/'.$key.']';
		  $replace[] = '<div id="tab-'.$id.'-'.$i.'" class="tab">';
		  $replace[] = '</div><!-- .tab (end) -->';
				$i++;
		}

		$tabContent = str_replace($find, $replace, $tabContent);

		$output .= $tabContent;

		$output .= '</div><!-- .tab-wrapper (end) -->';
		$output .= '</div><!-- .tabs (end) -->';

		return $output;

	}

	add_shortcode('tabs_alt', 'tabs_alt_shortcode');
}



/**
 * List styles
 */

if (!function_exists('unstyled_shortcode')) {
	// Unstyled List
	function unstyled_shortcode($atts, $content = null) {
		$output = '<div class="unstyled">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('unstyled', 'unstyled_shortcode');
}


if (!function_exists('checklist_shortcode')) {
	// Check List
	function checklist_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__check list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('checklist', 'checklist_shortcode');
}


if (!function_exists('arrow1_list_shortcode')) {
	// Arrow1 List
	function arrow1_list_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__arrow1 list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('list_arrow1', 'arrow1_list_shortcode');
}


if (!function_exists('arrow2_list_shortcode')) {
	// Arrow2 List
	function arrow2_list_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__arrow2 list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('list_arrow2', 'arrow2_list_shortcode');
}


if (!function_exists('arrow3_list_shortcode')) {
	// Arrow1 List
	function arrow3_list_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__arrow3 list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('list_arrow3', 'arrow3_list_shortcode');
}


if (!function_exists('arrow4_list_shortcode')) {
	// Arrow4 List
	function arrow4_list_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__arrow4 list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('list_arrow4', 'arrow4_list_shortcode');
}


if (!function_exists('star_list_shortcode')) {
	// Star List
	function star_list_shortcode($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'marker_color' => 'primary'
	   ), $atts));

		$output = '<div class="list list-style__star list-color__'.$marker_color.'">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		return $output;
	}
	add_shortcode('list_star', 'star_list_shortcode');
}


//warning
if (!function_exists('shortcode_warning')) {
	function shortcode_warning($args, $content) {
		return '<div class="alert alert-warning">'.do_shortcode($content).'</div>';
	}
	add_shortcode('warning', 'shortcode_warning');
}

//info
if (!function_exists('shortcode_info')) {
	function shortcode_info($args, $content) {
		return '<div class="alert alert-info">'.do_shortcode($content).'</div>';
	}
	add_shortcode('info', 'shortcode_info');
}

//success
if (!function_exists('shortcode_success')) {
	function shortcode_success($args, $content) {
		return '<div class="alert alert-success">'.do_shortcode($content).'</div>';
	}
	add_shortcode('success', 'shortcode_success');
}


if (!function_exists('hr_dashed_shortcode')) {
	// Horizontal Rule Dotted
	function hr_dashed_shortcode($atts, $content = null) {
	   $output = '<div class="hr hr-dashed"></div>';
	   return $output;
	}
	add_shortcode('hr_dashed', 'hr_dashed_shortcode');	
}

?>