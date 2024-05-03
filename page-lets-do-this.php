<?php
/**
 * Template Name: Let's Do This
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">
        	<section class="big-form">

        		<div class="wrapper a-form">
        			<h1>The Start of Something Big!</h1>
				<?php
				while ( have_posts() ) : the_post();

					the_content();

				endwhile; // End of the loop.
				?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
