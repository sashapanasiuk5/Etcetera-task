<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );



?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">
			<?php get_template_part( 'sidebar-templates/sidebar', 'topfull'); ?>
		</div>
		<div class="row">
			<div class="main-title">
				Об'єкти нерухомості
			</div>
		</div>
		<div class="row">


			<div id="primary">
			<main class="site-main" id="main">
				<div class="row  gy-4">
				<?php
				$buildings = get_posts(array('post_type' => 'building'));
				foreach ($buildings as $building):
					$id = $building->ID;
					$props = array( 'name' => get_field('name', $id),
									'image' => get_field('image', $id),
									'link' => get_permalink($id) );
									?>
					<div class="col-lg-4 col-md-6">
					<?php get_template_part('loop-templates/content','building', $props);?>
					</div>
				
				<?php endforeach;?>
				</div>
			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			//get_template_part( 'global-templates/right-sidebar-check' );
			?>
			</div>
		</div><!-- .row -->
		<div class="homepage-posts-container">
			<div class="row">
				<div class="main-title">
					Пости
				</div>
			</div>
			<div class="row">
				<?php
					if ( have_posts() ) {
						// Start the Loop.
						while ( have_posts() ) {
							the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', get_post_format() );
						}
					} else {
						get_template_part( 'loop-templates/content', 'none' );
					}
					?>
			</div>
		</div>
	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
