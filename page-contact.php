<?php
/**
 * Template Name: Contact
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
						<div class="address">
							Bellaworks Web Design<br>
							436 E 36th Street<br>
							Charlotte, North Carolina 28205<br>
							P 704.375.0831<br>
							M info@bellaworksweb.com<br>
						</div>	
					</div>
					<div class="right contact-contents">


						<div class="c-block">
							<h2>READY TO START A PROJECT?</h2>
							<a class="cta" href="<?php bloginfo('url'); ?>/lets-do-this">Contact Us</a>
						</div>

						<div class="c-block">
							<h2>EXISTING CUSTOMER?</h2>
							<p>Need to submit a work order?</p>
							<a class="cta" href="<?php bloginfo('url'); ?>/work-order-request">Submit Order Here</a>
						</div>

						<div class="c-block">

							<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3259.8223657838435!2d-80.85928404933438!3d35.210893363133515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88569e16fbb217db%3A0xd29b466726585022!2sBellaworks!5e0!3m2!1sen!2sus!4v1499865061569"  height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
						</div>
					</div>
				
				</section>

					
			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
