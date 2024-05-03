<?php
/**
 * Template Name: About
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
			while ( have_posts() ) : the_post(); ?>
				<section class="about">
					<div class="left">
						<figure>
							<img src="<?php bloginfo('template_url'); ?>/images/triangles.svg">
						</figure>
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="right">
						<?php the_content(); ?>
					</div>
				
				</section>

					<div class="section-title">
						<h2>OUR TEAM</h2>
					</div>

				<section class="services">
					
					<?php 
						$bios = get_field('bios');

						foreach( $bios as $b ) {
							$name = $b['name'];
							$pic = $b['pic'];
							$bio = $b['bio'];

					 ?>
						<div class="cube">
							<h3><?php echo $name; ?></h3>
							<div class="pic">
								<img src="<?php echo $pic['url']; ?>">
							</div>
							<div class="desc">
								<?php echo $bio; ?>
							</div>
						</div>
					<?php } ?>
				</section>
			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
