<?php
/**
 * Sidebar setup for footer full
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'topfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper" id="wrapper-top-full" role="complementary">

		<div class="<?php echo esc_attr( $container ); ?>" id="top-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'topfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
