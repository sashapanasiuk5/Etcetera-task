<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


function filter_buildings(){
	$filter = $_REQUEST['filter'];
	$validated_filter = array();
	foreach ($filter as $key => $property) {

		if(strlen($property) != 0 ) {
			$validated_filter[$key] = $property;
		}
	}
	$query = array();
	$query['relation'] = 'AND';
	$tax_query = array();
	foreach ($validated_filter as $key => $property) {

		switch ($key) {
			case 'number_of_floors':
				array_push($query, array(
					'key'=> 'number_of_floors',
					'value'=> $property,
					'compare'=>"="
				));
				break;
			
			case 'eco-friendliness':
				array_push($query, array(
					'key'=> 'eco-friendliness',
					'value'=> $property,
					'compare'=>">="
				));
				break;
			case 'type':
				array_push($query, array(
					'key'=> 'type',
					'value'=> $property,
					'compare'=>"="
				));
				break;
			case 'region':
				array_push($tax_query, array(
					'taxonomy'=> 'region',
					'field'=> 'slug',
					'terms'=> $property
				));
				break;
		}
	}
	$buildings = get_posts(array(
		"posts_per_page" => 5,
		"post_type" => "building",
		"meta_query" => $query,
		"tax_query" => $tax_query
		));

	$response = "";
	foreach ($buildings as $building) {
		$id = $building->ID;
		$props = array( 'name' => get_field('name', $id),
						'image' => get_field('image', $id),
						'link' => get_permalink($id) );
		
		echo "<div class=\"col-lg-4 col-md-6\">";
		get_template_part('loop-templates/content','building', $props);
		echo "</div>";
	}
	wp_die();
}



add_action("wp_ajax_filter_buildings", "filter_buildings");
add_action("wp_ajax_nopriv_filter_buildings", "filter_buildings");