<?php
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
$perpage = 15;
$args = array(
  'posts_per_page'  => $perpage,
  'post_type'       => 'post',
  'orderby'         => 'date',
  'order'           => 'desc',
  'post_status'     => 'publish',
  'paged'           => $paged
);
$news = new WP_Query($args);
if ( $news->have_posts() ) {  $rpcount = $news->found_posts; ?>
<div class="newsfeeds-wrapper">
  <div class="news">
    <?php $i=1; while ( $news->have_posts() ) : $news->the_post(); 
      $pid = get_the_ID();
      $attachment_id = get_post_thumbnail_id($pid);
      $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
      $image_src = wp_get_attachment_image_src($attachment_id,'full'); 
      $has_image = ($image_src) ? 'has-image':'no-image';
      $is_show_date = false;
      ?>
      <article id="news-post-item-<?php echo $pid ?>"  class="news-post-item <?php echo $has_image ?>">
        <div class="inside">
          <a href="<?php echo get_permalink($pid) ?>" class="postlink">
            <?php if($image_src) { ?>
            <figure class="featured-image">
              <img src="<?php echo $image_src[0] ?>" alt="<?php echo $alt; ?>">
            </figure>
            <?php } ?>
            <div class="titlediv">
              <h2><?php echo get_the_title() ?></h2>
              <?php if ($is_show_date) { ?>
              <div class="postdate">
                <?php echo get_the_date('F j, Y') ?>
              </div>
              <?php } ?>
            </div>
          </a>
        </div>
      </article>
    <?php $i++; endwhile; wp_reset_postdata(); ?>
  </div>
  <?php
  $total_pages = $news->max_num_pages;
  if ($total_pages > 1){  ?>
    <div id="pagination" class="pagination">
      <?php
      $pagination = array(
        'base' => @add_query_arg('pg','%#%'),
        'format' => '?paged=%#%',
        'mid-size' => 1,
        'current' => $paged,
        'total' => $total_pages,
        'prev_next' => True,
        'prev_text' => __( '<span class="fas fa-chevron-left"></span>' ),
        'next_text' => __( '<span class="fas fa-chevron-right"></span>' )
      );
      echo paginate_links($pagination); ?>
    </div>
  <?php } ?>
</div>
<?php } ?>