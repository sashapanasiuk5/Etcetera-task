<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       Building Post Type Plugin 
 * Description:       Plugin that creates а new post type - Building and taxonomy - Region
 * Version:           1.0.0
 * Author:            Panasiuk Oleksander
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       building-post-type
 * Domain Path:       /languages
 */
require_once __DIR__."/labels.php";

include "FilterWidget.php";

function register_region_custom_taxonomy() {
	global $region_taxonomy_labels;
	
	$args = array(
		'labels'                     => $region_taxonomy_labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'region', array( 'building'), $args );

}

function register_building_post_type() {
	global $region_post_labels;
	
	$args = array(
		'label'                 => __( 'Building', 'text_domain' ),
		'description'           => __( 'Post Type that describes the building', 'building' ),
		'labels'                => $region_post_labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'category', 'post_tag', 'region'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'building', $args );

}

function register_filter_widget(){
	register_widget( 'FilterWidget' );
}

function filter_shortcode(){
	$regions = get_terms("region");

		echo "<div class=\"post-filter\">
				<div class=\"fields\">
					<select name=\"region\">
						<option value=\"0\">Будь-який</option>";
					foreach($regions as $region){
						$slug = $region->slug;
						$name = $region->name;
						echo "<option value=\"{$slug}\">{$name}</option>";
					}
							

					echo "</select>

					<input type=\"text\" placeholder=\"Кількість приміщень\" name=\"number_of_floors\">
					<select name=\"type\">
						<option value=\"0\">Будь-який</option>
						<option value=\"panel\">Панель</option>
						<option value=\"brick\">Цегла</option>
						<option value=\"foam-block\">Піноблок</option>
					</select>
					<input type=\"text\" name=\"eco-friendliness\" placeholder=\"Екологічність\">
				</div>
				<button>Пошук</button>
			</div>";
}
add_shortcode('filter', "filter_shortcode");
add_action( 'widgets_init', 'register_filter_widget' );
add_action( 'init', 'register_building_post_type', 0 );
add_action( 'init', 'register_region_custom_taxonomy', 0 );
?>