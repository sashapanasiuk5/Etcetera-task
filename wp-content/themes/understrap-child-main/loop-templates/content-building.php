<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>

<article <?php post_class('building-post'); ?> id="post-<?php the_ID(); ?>">

		<div class="building-post-container">
			<a href="<?php echo $args['link']?>">
				<img src="<?php echo $args['image']['url'];?>" alt="">
			</a>
			<div class="title">
				<a href="<?php echo $args['link']?>"><?php echo $args['name'];?></a>
			</div>
		</div>

</article>

