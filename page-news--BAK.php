<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); 
$featured_ids = array();
?>

<div class="wp-site-blocks news-page-content">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
    <div class="topSection">
      <div class="left">
        <div class="titlediv">
          <span class="circles"></span>
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
      <div class="right featured-article">
        <?php
          //Check if there's featured post  
          $featuredPosts = get_featured_post(2, ['ID','post_title']);
          // echo "<pre>";
          // print_r($featuredPosts);
          // echo "</pre>";
          if($featuredPosts) { $count = count($featuredPosts); ?>

            <?php foreach ($featuredPosts as $fp) { 
              $featured_ids[] = $fp->ID;
              $attachment_id = get_post_thumbnail_id($fp->ID);
              $image_src = wp_get_attachment_image_src($attachment_id,'full'); 
              $has_image = ($image_src) ? 'has-image':'no-image';
              ?>
              <article id="featured-post-item-<?php echo $fp->ID ?>"  class="featured-post-item <?php echo $has_image ?>">
                <div class="inside">
                  <a href="<?php echo get_permalink($fp->ID) ?>" class="postlink">
                    <?php if($image_src) { ?>
                    <figure class="featured-image">
                      <img src="<?php echo $image_src[0] ?>" alt="">
                    </figure>
                    <?php } ?>
                    <h2><?php echo $fp->post_title ?></h2>
                  </a>
                </div>
              </article>
            <?php } ?>

            <?php if ($count==1) { ?>
              <?php  
                //Get 1 recent posts
                $args = array(
                  'showposts'   => 1,
                  'post_type'   => 'post',
                  'post_status' => 'publish',
                  'orderby'     => 'date',
                  'order'       => 'DESC'
                );
                $featuredPosts = get_posts($args);
                if($featuredPosts) { ?>
                  <?php foreach ($featuredPosts as $fp) { 
                  $featured_ids[] = $fp->ID;
                  $attachment_id = get_post_thumbnail_id($fp->ID);
                  $image_src = wp_get_attachment_image_src($attachment_id,'full'); 
                  $has_image = ($image_src) ? 'has-image':'no-image';
                  ?>

                  <article id="featured-post-item-<?php echo $fp->ID ?>"  class="featured-post-item recent-post <?php echo $has_image ?>">
                    <div class="inside">
                      <a href="<?php echo get_permalink($fp->ID) ?>" class="postlink">
                        <?php if($image_src) { ?>
                        <figure class="featured-image">
                          <img src="<?php echo $image_src[0] ?>" alt="">
                        </figure>
                        <?php } ?>
                        <h2><?php echo $fp->post_title ?></h2>
                      </a>
                    </div>
                  </article>
                  <?php } ?>

                <?php } ?>
              <?php } ?>

          <?php } else { ?>

            <?php  
            //Get 2 recent posts
            $args = array(
              'showposts'   => 2,
              'post_type'   => 'post',
              'post_status' => 'publish',
              'orderby'     => 'date',
              'order'       => 'DESC'
            );
            $featuredPosts = get_posts($args);
            if($featuredPosts) { ?>
              <?php foreach ($featuredPosts as $fp) { 
              $featured_ids[] = $fp->ID;
              $attachment_id = get_post_thumbnail_id($fp->ID);
              $image_src = wp_get_attachment_image_src($attachment_id,'full'); 
              $has_image = ($image_src) ? 'has-image':'no-image';
              ?>

              <article id="featured-post-item-<?php echo $fp->ID ?>"  class="featured-post-item recent-post <?php echo $has_image ?>">
                <div class="inside">
                  <a href="<?php echo get_permalink($fp->ID) ?>" class="postlink">
                    <?php if($image_src) { ?>
                    <figure class="featured-image">
                      <img src="<?php echo $image_src[0] ?>" alt="">
                    </figure>
                    <?php } ?>
                    <h2><?php echo $fp->post_title ?></h2>
                  </a>
                </div>
              </article>
              <?php } ?>

            <?php } ?>
          <?php } ?>
      </div>
    </div>

    <div class="bottomSection">
      <?php  
        $paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
        $args = array(
          'posts_per_page' => 24,
          'post_type'   => 'post',
          'post_status' => 'publish',
          'orderby'     => 'date',
          'order'       => 'DESC',
          'paged'       => $paged
        );
        if($featured_ids) {
          $args['post__not_in'] = $featured_ids;
        }
        $entries = new WP_Query($args);
        if ( $entries->have_posts() ) {  $count = $entries->found_posts; ?>
        <div class="news-feeds">
          <?php while ( $entries->have_posts() ) : $entries->the_post();  
            $post_id = get_the_ID();
            $attachment_id = get_post_thumbnail_id($post_id);
            $image_src = wp_get_attachment_image_src($attachment_id,'full');
            $has_image = ($image_src) ? 'has-image':'no-image';
          ?>

          <article id="post-item-<?php echo $post_id ?>"  class="post-item <?php echo $has_image ?>">
            <div class="inside">
              <a href="<?php echo get_permalink() ?>" class="postlink">
                <?php if($image_src) { ?>
                <figure class="featured-image">
                  <img src="<?php echo $image_src[0] ?>" alt="">
                </figure>
                <?php } ?>
                <div class="titlediv">
                  <h2><?php echo get_the_title() ?></h2>
                </div>
              </a>
            </div>
          </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php
        $total_pages = $entries->max_num_pages;
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

        <?php } ?>
    </div>

    
		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
