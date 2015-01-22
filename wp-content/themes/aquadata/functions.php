<?php

/**
 * Include Advanced Custom Fields.
 */
add_filter('acf/settings/path', 'acfSettingsPath');
function acfSettingsPath( $path ) {
    $path = get_stylesheet_directory() . '/inc/advanced-custom-fields-pro/';
    return $path;
}

add_filter('acf/settings/dir', 'acfSettingsDir');
function acfSettingsDir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/inc/advanced-custom-fields-pro/';
    return $dir;
}

include_once(get_stylesheet_directory() . '/inc/advanced-custom-fields-pro/acf.php' );

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'vendor-style', get_stylesheet_directory_uri() . '/vendor.min.css' );
}

/**
 * Function to add a separator to the admin menu
 */
add_action('admin_menu','admin_menu_separator', 99);

function admin_menu_separator()
{
	global $menu;

	$menu[30] = array(
			0 => '',
			1 => 'read',
			2 => 'separator' . 30,
			3 => '',
			4 => 'wp-menu-separator'
		);
}

/*function add_admin_menu_separator($position)
{
  global $menu;
  $index = 0;
  foreach($menu as $offset => $section) {
    if (substr($section[2],0,9)=='separator')
      $index++;
    if ($offset>=$position) {
      $menu[$position] = array('','read',"separator{$index}",'','wp-menu-separator');
      break;
    }
  }
  ksort( $menu );
}*/

/**
 * Tank Logs Custom Post Type
 */
$logLabels = array(
	'name'                => 'Single Tank Log',
	'singular_name'       => 'Tank Log',
	'menu_name'           => 'Tank Logs',
	'parent_item_colon'   => 'Parent Tank Logs:',
	'all_items'           => 'All Tank Logs',
	'view_item'           => 'View Tank Log',
	'add_new_item'        => 'Add New Tank Log',
	'add_new'             => 'Add New',
	'edit_item'           => 'Edit Tank Log',
	'update_item'         => 'Update Tank Log',
	'search_items'        => 'Search Tank Logs',
	'not_found'           => 'Not found',
	'not_found_in_trash'  => 'Not found in Trash',
);
$logArgs = array(
	'label'               => 'tank-logs',
	'description'         => 'Tank Log Entries',
	'labels'              => $logLabels,
	'supports'            => array( 'revisions' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 32,
	'menu_icon'    		  => 'dashicons-book-alt',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => true,
	'publicly_queryable'  => false,
	'capability_type'     => 'post',
);

register_post_type( 'tank-logs', $logArgs );

/**
 * Tanks Custom Post Type
 */
$tankLabels = array(
	'name'                => 'Single Tank',
	'singular_name'       => 'Tank',
	'menu_name'           => 'Tanks',
	'parent_item_colon'   => 'Parent Tanks:',
	'all_items'           => 'All Tanks',
	'view_item'           => 'View Tank',
	'add_new_item'        => 'Add New Tank',
	'add_new'             => 'Add New',
	'edit_item'           => 'Edit Tank',
	'update_item'         => 'Update Tank',
	'search_items'        => 'Search Tanks',
	'not_found'           => 'Not found',
	'not_found_in_trash'  => 'Not found in Trash',
);
$tankArgs = array(
	'label'               => 'tanks',
	'description'         => 'Tank Entries',
	'labels'              => $tankLabels,
	'supports'            => array( 'title', 'revisions' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 31,
	'menu_icon'    		  => 'dashicons-format-image',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
	'publicly_queryable'  => true,
	'capability_type'     => 'post',
);

register_post_type( 'tanks', $tankArgs );