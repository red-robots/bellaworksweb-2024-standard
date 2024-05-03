<?php
/**
 * Template Name: Services
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>
<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">


            <?php include( locate_template('parts/services.php') ); ?>

        <section class="services">
        <?php
            $wp_query = new WP_Query();
            $wp_query->query(array(
                'post_type'=>'service',
                'posts_per_page' => -1
            ));
            if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

            
                <div class="cube">
                    <div class="">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="">
                        <div class="desc"><?php the_excerpt(); ?></div>
                        <a class="cta" href="<?php the_permalink(); ?>">Learn More</a>
                    </div>
                </div>
            

        <?php endwhile; endif; ?>
        </section>

        </div>
        <?php include( locate_template('three-steps.php') ); ?>
    </main>
</div>

<?php
get_footer();
