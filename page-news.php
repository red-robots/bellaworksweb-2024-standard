<?php
/**
 * Template Name: News
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); 
?>
<div class="wp-site-blocks news-page-content news-new-layout">
  <main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="service">
      <div class="intro">
        <h1><?php the_title(); ?></h1>
      </div>
      
      <?php if (get_the_content()) { ?>
      <div class="text-wrap"><?php the_content(); ?></div>
      <?php } ?>

    </section>
    <?php endwhile; endif; ?>
    <?php include( locate_template('parts/news-feeds.php') ); ?>
  </main>
</div>
<?php
get_footer();
