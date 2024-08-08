<?php
/**
 * Template Name: Green Background 
 *
 */

get_header(); ?>

<div class="wp-site-blocks green-content">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
    <div class="pagewrapper">

		<?php while ( have_posts() ) : the_post();

			the_content();

		  endwhile; // End of the loop.?>
    
    </div><!-- #primary -->
	</main><!-- #main -->
</div>
<?php
get_footer();
