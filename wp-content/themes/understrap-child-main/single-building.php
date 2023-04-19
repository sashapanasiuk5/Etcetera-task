<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


$container = get_theme_mod( 'understrap_container_type' );
$image_src = get_field("image")['url'];
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div id="primary">
				<main class="site-main building-page" id="main">

					<div class="row">
						<div class="building-title">
							<?php the_title();?>
						</div>
						<div class="col-lg-7">
							<img src="<?php echo $image_src?>" alt="">
						</div>
						<div class="col-lg-5">
							<div class="building-info">
								<div>
									<i class="fas fa-map-marker-alt"></i>
									Місцезнаходження:  <?php the_field('location');?>
								</div>
								<div>
									Кількість поверхів:  <?php the_field('number_of_floors');?>
								</div>
								<div>
									Тип будівлі:  <?php the_field('type');?>
								</div>
								<div>
									Екологічність:  <?php the_field('eco-friendliness');?>
								</div>
							</div>
						</div>
						<div class="building-title">
							Приміщення
						</div>
						<div class="rooms-container">
							<div class="row">
								<?php  while( have_rows('rooms') ) : the_row();
									$image = get_sub_field('image');?>
									<div class="room-card col-lg-3">
										<img src="<?php echo $image['url']?>" alt="">
										<div class="room-card_info">
											<div>
												Площа - <?php echo get_sub_field('square');?>
											</div>
											<div>
												Кількість кімнат - <?php echo get_sub_field('number_of_rooms');?>
											</div>
											<div>
												Балкон - <?php echo get_sub_field('balcony') ? "Є" : "Немає";?>
											</div>
											<div>
												Санвузол - <?php echo get_sub_field('toilet')? "Є" : "Немає";?>
											</div>
										</div>
									</div>
								<?php endwhile;?>
							</div>
						</div>
					</div>

				</main>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
