<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="pagewrapper">
			<section class="single-portfolio">
		<?php
		while ( have_posts() ) : the_post();

			// $layouts = get_field('blocks');
			// echo '<pre>';
			// print_r($layouts);
			// echo '</pre>';

			while ( have_rows('blocks') ) : the_row();


				// Case: Paragraph layout.
		        if( get_row_layout() == 'intro_block' ):
		            $client_logo = get_sub_field('client_logo');
		            $background_color = get_sub_field('background_color');
		            $text_color = get_sub_field('text_color');
		            $name = get_sub_field('name');
		            $intro_text = get_sub_field('intro_text');

              $taxonomy = 'business-type';
              $terms = get_the_terms( get_the_ID(), $taxonomy );
              $category = ( isset($terms[0]) ) ? $terms[0]->name : '';

		        ?>
		        <div class="intro" style="background-color: <?php echo $background_color;  ?>;">
		        	<div class="intro-wrap">
                <div class="titleWrap">
                  <h1 style="color: <?php echo $text_color; ?>"><?php the_title(); ?></h1>
                  <?php if ($category) { ?>
                  <div class="type"><?php echo $category; ?></div>
                  <?php } ?>
                </div>
		        		<!-- <div class="left">
			        		<div class="logo">
				        		<img src="<?php echo $client_logo['url']; ?>">
				        	</div>
			        	</div> -->
			        	<!-- <div class="right">
			        		<h1 style="color: <?php echo $text_color; ?>"><?php the_title(); ?></h1>
			        	</div> -->
		        	</div>

		        	<?php if ($intro_text) { ?>
		        	<div class="desc" style="color: <?php echo $text_color; ?>">
		        		<?php echo $intro_text; ?>
		        	</div>
              <?php } ?>
		        </div>
		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'hero' ):
		          if( $hero_image = get_sub_field('hero_image') ) { ?>
  		        <div class="hero">
  		        	<img src="<?php echo $hero_image['url']; ?>">
  		        </div>
              <?php } ?>

            <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'second_section' ):
	            $color_logo = get_sub_field('color_logo');
	            $small_blurg = get_sub_field('small_blurg');
              if( $color_logo || $small_blurg ) { ?>
  		        <div class="blurbs">
                <?php if ($color_logo) { ?>
  		        	<div class="color-logo">
  		        		<div class="logo">
  		        			<img src="<?php echo $color_logo['url']; ?>">
  		        		</div>
  		        	</div>
                <?php } ?>

                <?php if ($small_blurg) { ?>
  		        	<div class="blurb">
  		        		<?php echo $small_blurg; ?>
  		        	</div>
                <?php } ?>
  		        </div>
              <?php } ?>
		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'third_section' ):
	            $detail_photo = get_sub_field('detail_photo');
              $detail_photo2 = get_sub_field('detail_photo2');
	            $full_site_photo = get_sub_field('full_site_photo');
	            $key_features = get_sub_field('key_features');
              $website_url = get_sub_field('website__url');
              ?>
  		        <div class="details">
  		        	<div class="left">
                  <?php if ($detail_photo || $detail_photo2) { ?>
  		        		<div class="detail">
                    <?php if ($detail_photo) { ?>
                    <figure><img src="<?php echo $detail_photo['url']; ?>" alt=""></figure>
                    <?php } ?>
  		        			<?php if ($detail_photo2) { ?>
                    <figure><img src="<?php echo $detail_photo2['url']; ?>" alt=""></figure>
                    <?php } ?>
  		        		</div>
                  <?php } ?>

                  <?php if ($key_features || $website_url) { ?>
  		        		<div class="key-features">
  		        			<h2>Key Features</h2>
  		        			<?php echo $key_features; ?>

                    <?php if ($website_url) { ?>
                    <div class="buttondiv">
                      <a href="<?php echo $website_url ?>" class="button-default wide" target="_blank">View Website</a>
                    </div>
                    <?php } ?>
  		        		</div>
                  <?php } ?>



  		        	</div>
                <?php if ($full_site_photo) { ?>
  		        	<div class="right">
  		        		<img src="<?php echo $full_site_photo['url']; ?>">
  		        	</div>
                <?php } ?>
  		        </div>

		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'color_palette' ):
	            $text_field = get_sub_field('text_field');
	            $colorsText = get_sub_field('colors_description');
              $colors = get_sub_field('colors');
              $color_class = ($colorsText && $colors) ? 'half':'full';
  		        if ($text_field || $colors || $colorsText) { ?>
  		        <div class="colors">
                <?php if ($colors || $colorsText) { ?>
  		        	<div class="right">
                  <div class="flexwrap <?php echo $color_class ?>">
                  <?php if ($colorsText) { ?>
                    <div class="fxcol colorsText"><?php echo $colorsText ?></div>
                  <?php } ?>
                  <?php if ($colors) { ?>
                    <div class="fxcol variations">
    		        		<?php foreach( $colors as $c ) { ?>
    		        			<div class="color" style="background-color: <?php echo $c['color']; ?>"></div>
    		        		<?php } ?>
                    </div>
                  <?php } ?>
                  </div>
  		        	</div>
                <?php } ?>

								<?php if ($text_field) { ?>
  		        	<div class="left testimonial-info">
                  <div class="inner">
                    <?php echo $text_field; ?>
                  </div>
  		        	</div>
                <?php } ?>
  		        </div>
              <?php } ?>


		        <?php
				// Case: Download layout.
		        elseif( get_row_layout() == 'detail_photos' ):
		          $photos = get_sub_field('photos');
              if($photos) { ?>
  		        <div class="detail-photos">
  		        	<?php foreach( $photos as $ph ) {
  		        		?>
  			        	<div class="photo">
  			        		<img src="<?php echo $ph['photo']['url']; ?>">
  			        	</div>
  		        	<?php } ?>
  		        </div>
            <?php } ?>




		    <?php

		        endif;


			endwhile;

		endwhile; // End of the loop.
		?>
			</section>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
