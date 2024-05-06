<?php get_header(); ?>
<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">
        <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>

            <section class="service">
                <div class="intro">
                    <figure>
                        <img src="<?php bloginfo('template_url'); ?>/images/CIRCLES.svg">
                    </figure>
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="content">
                    <?php the_content(); ?>

                    <?php 
                        $section_title = get_field('section_title');
                        $faqs = get_field('faqs');

                        if( $faqs ) {
                     ?>

                     <section class="faqs">
                         <h2><?php echo $section_title; ?></h2>
                         <?php foreach( $faqs as $f ) { ?>
                            <div class="faqrow">
                               <div class="question"><div class="question-image"></div><?php echo $f['question']; ?></div>
                               <div class="answer"><?php echo $f['answer']; ?></div>
                            </div>
                         <?php } ?>
                     </section>

                    <?php } ?>

                </div>
            </section>


        <?php endwhile; endif; ?>
        </div>
        <?php include( locate_template('three-steps.php') ); ?>
    </main>
</div>

<?php
get_footer();
