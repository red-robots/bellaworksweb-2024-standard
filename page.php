<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
    <div class="pagewrapper default">

		<?php while ( have_posts() ) : the_post(); ?>
			<h1 class="default"><?php the_title(); ?></h1>
			<?php the_content();

		  endwhile; // End of the loop.?>
    
    </div><!-- #primary -->
	</main><!-- #main -->
</div>
<?php
get_footer();
