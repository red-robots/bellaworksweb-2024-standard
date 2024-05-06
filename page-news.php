<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">

			<?php
			$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'post',
				'posts_per_page' => 16
			));
				if ($wp_query->have_posts()) :  ?>
				<section class="news about">
					<div class="left">
						<figure>
							<img src="<?php bloginfo('template_url'); ?>/images/circles.svg">
						</figure>
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="right">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

					<div class="post">
						<a href="<?php the_permalink(); ?>">
							<div class="img">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<div class="desc">
								<h2><?php the_title(); ?></h2>
							</div>
						</a>
					</div>

				<?php endwhile; ?>
					<?php pagi_posts_nav(); ?>
				</div>
				</section>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
