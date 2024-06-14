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
	            
		        ?>  
		        <div class="intro" style="background-color: <?php echo $background_color;  ?>;">
		        	<div class="intro-wrap">
		        		<h1 style="color: <?php echo $text_color; ?>"><?php the_title(); ?></h1>
		        		<!-- <div class="left">
			        		<div class="logo">
				        		<img src="<?php echo $client_logo['url']; ?>">
				        	</div>
			        	</div> -->
			        	<!-- <div class="right">
			        		<h1 style="color: <?php echo $text_color; ?>"><?php the_title(); ?></h1>
			        	</div> -->
		        	</div>
		        	
		        	
		        	<div class="desc" style="color: <?php echo $text_color; ?>">
		        		<?php echo $intro_text; ?>
		        	</div>
		        </div>
		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'hero' ): 
		            $hero_image = get_sub_field('hero_image');
				?>
		        <div class="hero">
		        	<img src="<?php echo $hero_image['url']; ?>">
		        </div>

		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'second_section' ): 
		            $color_logo = get_sub_field('color_logo');
		            $small_blurg = get_sub_field('small_blurg');
		        ?>
		        <div class="blurbs">
		        	<div class="color-logo">
		        		<div class="logo">
		        			<img src="<?php echo $color_logo['url']; ?>">
		        		</div>
		        	</div>
		        	<div class="blurb">
		        		<?php echo $small_blurg; ?>
		        	</div>
		        </div>
		        <?php 
		        // Case: Download layout.
		        elseif( get_row_layout() == 'third_section' ): 
		            $detail_photo = get_sub_field('detail_photo');
		            $full_site_photo = get_sub_field('full_site_photo');
		            $key_features = get_sub_field('key_features');
		        ?>
		        <div class="details">
		        	<div class="left">
		        		<div class="detail">
		        			<img src="<?php echo $detail_photo['url']; ?>">
		        		</div>
		        		<div class="key-features">
		        			<h2>Key Features</h2>
		        			<?php echo $key_features; ?>
		        		</div>
		        	</div>
		        	<div class="right">
		        		<img src="<?php echo $full_site_photo['url']; ?>">
		        	</div>
		        </div>

		        <?php
		        // Case: Download layout.
		        elseif( get_row_layout() == 'color_palette' ): 
		            $text_field = get_sub_field('text_field');
		            $colors = get_sub_field('colors');
		        ?>
		        <div class="colors">
		        	<div class="left">
		        		<?php echo $text_field; ?>
		        	</div>
		        	<div class="right">
		        		<?php foreach( $colors as $c ) { 
		        		
		        			?>
		        			<div class="color" style="background-color: <?php echo $c['color']; ?>"></div>
		        		<?php } ?>
		        	</div>
		        </div>
		            

		            
		        


		        <?php
				// Case: Download layout.
		        elseif( get_row_layout() == 'detail_photos' ): 
		            $photos = get_sub_field('photos');
		        ?>
		        <div class="detail-photos">
		        	<?php foreach( $photos as $ph ) { 
		        		?>
			        	<div class="photo">
			        		<img src="<?php echo $ph['photo']['url']; ?>">
			        	</div>
		        	<?php } ?>
		        </div>
		            

		            

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
