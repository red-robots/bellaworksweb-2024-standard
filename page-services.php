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
    <?php 
    $row1_title = get_field('row1_title');
    $row1_blocks = get_field('row1_blocks');
    if($row1_title || $row1_blocks) { ?>
    <section class="service-title-block">
      <div class="flexwrap">
        <?php if($row1_title) { ?>
        <div class="left">
            <h1><?php echo $row1_title ?></h1>
        </div>
        <?php } ?>

        <?php if($row1_blocks) { ?>
        <div class="right service-blocks">
          <div class="flexwrap">
          <?php $i=1; foreach ($row1_blocks as $b) { 
            $name = $b['name'];
            $link = $b['link'];
            $openLink = ($link) ? '<a href="'.$link.'" class="inner">':'<div class="inner">';
            $closeLink = ($link) ? '</a>':'</div>';
            if($name) { ?> 
            <div class="square square-<?php echo $i ?>" data-aos="flip-left">
              <?php echo $openLink ?>
                <span class="name"><?php echo trim($name) ?></span>
              <?php echo $closeLink ?>
            </div>
            <?php $i++; } ?>
          <?php  } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </section>
    <?php } ?>

    <section class="services services-grid">
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
    <?php include( locate_template('three-steps.php') ); ?>
  </main>
</div>

<?php
get_footer();
