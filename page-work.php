<?php
/**
 * Template Name: Work
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">

			<?php
			// while ( have_posts() ) : the_post();

			// 	the_content();

			// endwhile; // End of the loop.
			?>

			<?php
			$i=0;
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'portfolio',
				'posts_per_page' => 16
			));
			if ($wp_query->have_posts()) :  ?>
				<section class="work">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;

					$pId = get_the_ID();
					$id = get_post_thumbnail_id($pId);
					$iurl = get_the_post_thumbnail_url($pId, 'work');
					if( $i<7 ) {
						$src = 'src';
						$lazy = '';
					} else {
						$src = 'data-src';
						$lazy = 'lazy';
					}

					$image = get_the_post_thumbnail( $pId, 'tiny', array( 'class' => 'lazyload' ) );
					//$image = apply_filters( 'dominant_colors', $image, get_post_thumbnail_id ( $pId ) );

					//$lazy = lazy_image(get_post_thumbnail_id(),"Image description");

					// echo '<pre>';
					// print_r($iurl);
					// echo '</pre>';
					 $mimeType = get_post_mime_type($id);
    				// $base64 = get_post_meta($id, "base64")[0];
           $taxonomy = 'business-type';
           $terms = get_the_terms( $pId, $taxonomy );
           $category = ( isset($terms[0]) ) ? $terms[0]->name : '';
					?>	

					
						<a href="<?php the_permalink(); ?>" class="third">
							<div class="title">
								<h2><?php the_title(); ?></h2>
                <?php if ($category) { ?>
                <h3 class="type"><?php echo $category; ?></h3>
                <?php } ?>
							</div>
							<img src="<?php echo $iurl; ?>">
							
						</a>
					

			<?php 
			endwhile;?>
			</section>
			<?php 
			endif;
			 ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</main>
<?php
get_footer();
