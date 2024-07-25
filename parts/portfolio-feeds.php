<?php
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
$args = array(
  'posts_per_page'  => $perpage,
  'post_type'       => 'portfolio',
  'post_status'     => 'publish'
);
$news = new WP_Query($args);
if ( $news->have_posts() ) {  
  $rpcount = $news->found_posts;
  ?>
  <div class="portfolio-feeds">
    <div class="inner-content">
      <?php $i=1; while ( $news->have_posts() ) : $news->the_post();  
        $attachment_id = get_post_thumbnail_id( get_the_ID() );
        $imageUrl = wp_get_attachment_image_src($attachment_id, 'full');
        if($imageUrl) { ?>
        <figure class="project" data-aos="fade-up">
          <a href="<?php echo get_permalink(); ?>" aria-label="<?php echo get_the_title() ?>">
            <img src="<?php echo $imageUrl[0] ?>" alt="">
          </a>
        </figure>
      <?php } ?>
      <?php $i++; endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
<?php } ?>