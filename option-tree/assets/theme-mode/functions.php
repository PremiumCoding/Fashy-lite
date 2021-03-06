<?php
/**
 * Theme Mode
 */
 add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Child Theme Mode
 */
# add_filter( 'ot_child_theme_mode', '__return_false' );

/**
 * Show Settings Pages
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Show Theme Options UI Builder
 */
 add_filter( 'ot_show_options_ui', '__return_true' );

/**
 * Show Settings Import
 */
 
add_filter( 'ot_show_settings_import', '__return_true' );

/**
 * Show Settings Export
 */
 
add_filter( 'ot_show_settings_export', '__return_true' );

/**
 * Show New Layout
 */

add_filter( 'ot_show_new_layout', '__return_true' );

/**
 * Show Documentation
 */
# add_filter( 'ot_show_docs', '__return_true' );

/**
 * Custom Theme Option page
 */

 add_filter( 'ot_use_theme_options', '__return_true' );

/**
 * Meta Boxes
 */
# add_filter( 'ot_meta_boxes', '__return_true' );

/**
 * Allow Unfiltered HTML in textareas options
 */
# add_filter( 'ot_allow_unfiltered_html', '__return_false' );

/**
 * Loads the meta boxes for post formats
 */
add_filter( 'ot_post_formats', '__return_true' );

/**
 * OptionTree in Theme Mode
 */
require( get_template_directory()  . '/option-tree/ot-loader.php' );

/**
 * Theme Options
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/assets/theme-mode/theme-options.php' );


		
function fashy_background_filter( ) {
    // Maybe modify $example in some way.
    return array( 
          'background-color',
          'background-image'
        );
}
add_filter( 'ot_recognized_background_fields', 'fashy_background_filter' );

function fashy_typography_filter(){

return array( 
          'color',
          'face', 
          'size', 
          'style', 
        );

}
add_filter( 'ot_recognized_typography_fields', 'fashy_typography_filter' );


function fashy_dimension_filter(){

return array( 
          'width',
          'unit'
        );

}
add_filter( 'ot_recognized_dimension_fields', 'fashy_dimension_filter' );

/*
function fashy_update_old_options(){
	
	if(get_option('IMPORT_OLD_OPTIONS') == 'false'){
		$fashy_data = get_option(OPTIONS);
		$font_array = $font_array_face_body = $font_array_face_qoute = $font_array_face_heading = $font_array_face_menu = $font_heading_array = $font_menu_array  = $font_quote_array  = array();
		if(!empty($fashy_data['google_body_custom'])){
			$font_body = fashy_check_google_font($fashy_data['google_body_custom']);
			$font_array_body =  array('family' => $font_body, 'variants' => array('300','700','regular'));
			$font_array_face_body = array('face' => $font_body, 'size' => $fashy_data['body_font']['size'], 'color' => $fashy_data['body_font']['color'] ,'style' => 'normal');
			array_push($font_array, $font_array_body);
		}
		if(!empty($fashy_data['google_heading_custom'])){
			$font_heading = fashy_check_google_font($fashy_data['google_heading_custom']);
			$font_heading_array = array('family' => $font_heading, 'variants' => array('300','700','regular'));
			$font_array_face_heading = array('face' => $font_heading ,'style' => $fashy_data['heading_font']['style']);
			if(!fashy_in_multi_array($font_heading, $font_array)){
				array_push($font_array, $font_heading_array);
			}			
		}
		if(!empty($fashy_data['google_menu_custom'])){
			$font_menu = fashy_check_google_font($fashy_data['google_menu_custom']);
			$font_menu_array = array('family' => $font_menu, 'variants' => array('300','700','regular'));
			$font_array_face_menu = array('face' => $font_menu, 'size' => $fashy_data['menu_font']['size'], 'color' => $fashy_data['menu_font']['color'] ,'style' => $fashy_data['menu_font']['style'] );
		
			if(!fashy_in_multi_array($font_menu, $font_array)){	
				array_push($font_array, $font_menu_array);
			
			}		
		}	
		if(!empty($fashy_data['google_quote_custom'])){
			$font_quote = fashy_check_google_font($fashy_data['google_quote_custom']);
			$font_quote_array = array('family' => $font_quote, 'variants' => array('300','700','regular'));
			$font_array_face_qoute = array('face' => $font_quote ,'style' => 'normal');
			if(!fashy_in_multi_array($font_quote, $font_array)){
				array_push($font_array, $font_quote_array);
				
			}
		}
			

		//$font_releway =  array('family' => 'raleway', 'variants' => array('300','700'));
		//array_push($font_array, $font_releway);
		//$font_oswald =  array('family' => 'oswald', 'variants' => array('400','700'));
		//array_push($font_array, $font_oswald);
		//print_r($fashy_data['body_font']);

		$add =  array('load_google_fonts' => $font_array ,
					   'body_font' => $font_array_face_body,
					   'heading_font' => $font_array_face_heading,
					   'menu_font' => $font_array_face_menu,
					   'qoute_typography_settings' => $font_array_face_qoute,
					   'excpert_lenght' => 27,
					   'display_scroll' => 1,
					   'single_display_share_select' => array(0 => 'facebook_share',
															  1 => 'twitter_share' ,
															  2 => 'google_share' ,
															  3 => 'pinterest_share' ,
															  4 => 'stumbleupon',
															  )
					   );

		//$new = get_option('of_options_pmc');
		$new_add = array_merge($fashy_data , $add);
		update_option('of_options_pmc', $new_add );
		update_option('IMPORT_OLD_OPTIONS', 'true' );
	}


}
fashy_update_old_options();
*/


function fashy_check_google_font($string){
	if (strpos($string, ':') !== false) {
		$string = explode(':', $string );
		$string = $string[0];

	} 
	
	return preg_replace('/\s+/', '',strtolower($string));

}

function fashy_in_multi_array($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && fashy_in_multi_array($needle, $item, $strict))) {
            return true;
        }
    }
    return false; 
}

function fashy_custom_layout(){
	$fashy_data = get_option(OPTIONS);
	if(!empty($fashy_data['use_builder'])){
		/*build layout*/
		$layouts = $fashy_data['test2'];
		echo '<div class="custom-layout"><div class="custom-layout-inner">';
		foreach($layouts as $layout){
		$title = str_replace(' ', '', esc_attr($layout['title']));
		?>
			<?php if(!empty($layout['use_sidebar'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php dynamic_sidebar( esc_attr($layout['sidebar_select']) ); ?>
				</div>
			<?php } ?>
			<?php if(!empty($layout['use_category'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php 
					global $post;
					$args = array( 'category' => $layout['category_select'] );
					$layout_posts = get_posts( $args );
					foreach( $layout_posts as  $key => $post ) : 
						if($key == $layout['category_select_number']) {break;}
						setup_postdata($post); ?>
						<div class="blogpostcategory list">
							<div class="topBlog">	
								<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'fashy' ) ) . '</em>'; ?> </div>
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','fashy')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<?php if(fashy_globals('display_post_meta')) { ?>
									<div class = "post-meta">
										<?php 
										$day = get_the_time('d');
										$month= get_the_time('m');
										$year= get_the_time('Y');
										?>
										<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','fashy'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>			
									</div>
									<?php } ?> <!-- end of post meta -->
							</div>	
						</div>
					<?php endforeach; 
					wp_reset_postdata(); 
					?>		
				</div>
			<?php } ?>		
			<?php if(!empty($layout['use_post'])){ ?>
				<div class="layout-sidebar <?php echo esc_attr($title) ?>">	
					<?php 
					global $post;
					$args = array( 'include' => $layout['single_post'] );
					$layout_posts = get_posts( $args );
					foreach( $layout_posts as $post ) :
						setup_postdata($post); ?>
						<div class="blogpostcategory">
							<div class="topBlog">	
								<div class="blog-category"><?php echo '<em>' . get_the_category_list( esc_html__( ', ', 'fashy' ) ) . '</em>'; ?> </div>
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title=<?php esc_attr_e('Permanent Link to','fashy')?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<?php if(fashy_globals('display_post_meta')) { ?>
									<div class = "post-meta">
										<?php 
										$day = get_the_time('d');
										$month= get_the_time('m');
										$year= get_the_time('Y');
										?>
										<?php echo '<a class="post-meta-time" href="'.get_day_link( $year, $month, $day ).'">'; ?><?php the_date() ?></a> <a class="post-meta-author" href="<?php echo  the_author_meta( 'user_url' ) ?>"><?php esc_html_e('by ','fashy'); echo get_the_author(); ?></a> <a href="<?php echo the_permalink() ?>#commentform"><?php comments_number(); ?></a>			
									</div>
									<?php } ?> <!-- end of post meta -->
							</div>	
							<div class="post-layout-content"><?php the_content(__('<div class="pmc-read-more">Continue reading</div>','fashy')) ?></div>
						</div>
					<?php endforeach; 
					wp_reset_postdata(); 
					?>				

				</div>
			<?php } ?>
		<?php
		}
		echo '</div></div>'; 
	} else {	
	?>
	
	<div class="sidebars-wrap top">
		<div class="sidebars">
			<div class="sidebar-left-right">
				<div class="left-sidebar">
					<?php dynamic_sidebar( 'dremscape-sidebar-under-header-left' ); ?>
				</div>
				<div class="right-sidebar">
					<?php dynamic_sidebar( 'fashy-sidebar-under-header-right' ); ?>
				</div>
			</div>					
			<div class="sidebar-fullwidth">
				<?php dynamic_sidebar( 'fashy-sidebar-under-header-fullwidth' ); ?>
			</div>				
		</div>
	</div>	
	<?php
	}
}

function fashy_custom_layout_style(){
	$fashy_data = get_option(OPTIONS);
	if(isset($fashy_data['test2'])){
		$layout_style = '';
		$layouts = $fashy_data['test2'];
		$slider_height = 0;
		if(is_array($layouts)){
		foreach($layouts as $layout){
			$top = $left = $right = $bootom = '';
			if(isset($layout['margin_select']['top'])) $top = esc_attr($layout['margin_select']['top']);
			if(isset($layout['margin_select']['left'])) $left = esc_attr($layout['margin_select']['left']);
			if(isset($layout['margin_select']['bottom'])) $bottom = esc_attr($layout['margin_select']['bottom']);
			if(isset($layout['margin_select']['right'])) $right = esc_attr($layout['margin_select']['right']);
			$title = str_replace(' ', '', esc_attr($layout['title']));
			$layout_style .= '.layout-sidebar.'.$title .'{width:'.esc_attr($layout['dimension_select']['width']).esc_attr($layout['dimension_select']['unit']).';  margin-top:'.$top .esc_attr($layout['dimension_select']['unit']).'; margin-right:'.$right.esc_attr($layout['dimension_select']['unit']).'; margin-bottom:'.$bottom.esc_attr($layout['dimension_select']['unit']).'; margin-left:'.$left.esc_attr($layout['dimension_select']['unit']).'}

		
			';	
			
		}
		$layout_style = $layout_style;
		wp_add_inline_style( 'style', $layout_style );
	}
	}
}

add_action( 'wp_enqueue_scripts', 'fashy_custom_layout_style' );

function fashy_custom_sidebars(){
	$fashy_data = get_option(OPTIONS);
	/*build sidebars*/
	if(isset($fashy_data['sidebar_builder'])){
		if(is_array($fashy_data['sidebar_builder'])){
			$sidebars = $fashy_data['sidebar_builder'];
			$sidebarOut = '';
				foreach($sidebars as $sidebar){
					$id = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $sidebar['title']);
					$id = strtolower(str_replace(' ', '' , $id));
					register_sidebar(array(
						'id' => 'fashy-'.$id,
						'name' => esc_attr($sidebar['title']),
						'description' => esc_attr($sidebar['sidebar_description']),
						'before_widget' => '<div class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3>',
						'after_title' => '</h3>'
					));			
				}
			}
	}
}

add_action( 'widgets_init', 'fashy_custom_sidebars' );

if ( ! function_exists( 'fashy_decode' ) ) {

	function fashy_decode( $value ) {

	  $func = 'base64' . '_decode';
	  return $func( $value );
	  
	}
}

if ( ! function_exists( 'fashy_options' ) ) {

	function fashy_options($option){
		$add = array('active_layout' => $option  );
		$new = get_option('option_tree_layouts');
		$new_add = array_merge($new , $add);
		update_option('option_tree_layouts', $new_add );
		$new_options =  get_option('option_tree_layouts');
		$new_options = unserialize( fashy_decode($new_options[$new_options['active_layout']]));
		update_option('of_options_pmc', $new_options);	
	}
}

add_action( 'admin_init', 'fashy_import' );
    
function fashy_import(){
	if(isset($_GET["pmc_import"]) && $_GET["pmc_import"] == 'start'){   
		/*import setup*/
		define('ADMIN_PATH', get_stylesheet_directory() . '/option-tree/');
		defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );
		global $wpdb;

		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
		

			$class_wp_import = get_template_directory() . '/option-tree/import/plugins/wordpress-importer.php';
			if ( file_exists( $class_wp_import ) ) {
			include $class_wp_import;

			}
		

		
		$class_widget_import = get_template_directory() . '/option-tree/import/plugins/class-widget-data.php';
		if ( file_exists( $class_widget_import ) ) {
			include $class_widget_import;
		}		

		if($_GET['import_content'] == 'all') { 

			/*import xml*/

			$importer = new PMC_import_WP();
			$theme_xml = get_template_directory() . '/option-tree/import/fashy.xml';
									
			$importer->fetch_attachments = true;
			ob_start();
			$importer->import($theme_xml);
			ob_end_clean();					


			$locations = get_theme_mod( 'nav_menu_locations' ); 
			$menus = wp_get_nav_menus(); 
			
			if( is_array($menus) ) {

				foreach($menus as $menu) { // assign menus to theme locations
				
					$menu_items = wp_get_nav_menu_object($menu->term_id);		
					
					switch($menu_items->name){
						case 'Main menu':
							$locations['fashy_respmenu'] = $menu->term_id;
							$locations['fashy_mainmenu'] = $menu->term_id;
							$locations['fashy_scrollmenu'] = $menu->term_id;										
							break;																			
					}					
				}
			}
			set_theme_mod( 'nav_menu_locations', $locations );		
			
			update_option( 'posts_per_page', 4 );
			
					
		/*import sliders*/
		if($_GET['import_content'] == ('all' || 'revslider') ) { 
		
		}

			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure('/%postname%/');
			$wp_rewrite->flush_rules();		

			
			/*widgets+options*/
			if($_GET['import_demo'] == 'default') {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('default-layout');
			} else if($_GET['import_demo'] == 'default-layout-sidebar')  {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('default-layout-sidebar');			
			} else if($_GET['import_demo'] == 'grid-layout-sidebar')  {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('grid-layout-sidebar');		
			} else if($_GET['import_demo'] == 'default-layout-sidebar-boxed')  {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('default-layout-sidebar-boxed');		
			} else if($_GET['import_demo'] == 'magazine-layout-sidebar')  {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('magazine-layout-sidebar');		
			} else if($_GET['import_demo'] == 'grid-slider-dark-layout')  {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('grid-slider-dark-layout]');	
			}else {
				$file_widget = get_template_directory() . '/option-tree/import/widget.json';
				fashy_options('default-layout');
			}
			$class_widget_import = new Widget_Data_PMC();
			$class_widget_import->ajax_import_widget_data($file_widget);
		
		}
		

		
		wp_redirect( admin_url( 'themes.php?page=ot-theme-options&pmc_import=true#section_import' ) );
	}


}
 

?>