<?php
/**
 * Template Name: FAQ's
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			<section class="faqs">
				<?php if(have_rows('loan_faqs')): ?>
					<?php while(have_rows('loan_faqs')): the_row();
						$question=get_sub_field('question');
						$answer=get_sub_field('answer');
					?>
							<div class="faqrow">
								<div class="question">
									<div class="plus-minus-toggle collapsed"></div>
									<?php the_sub_field('question'); ?>
								</div>
								<div class="answer"><?php the_sub_field('answer'); ?></div>
							</div><!-- faqrow -->
					<?php endwhile; ?>
				<?php endif; ?>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();