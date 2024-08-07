<?php
/**
 * Template Name: About
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
		<?php
		while ( have_posts() ) : the_post(); ?>
    <section class="service pageTitleDiv">
      <div class="intro">
        <h1><?php the_title() ?></h1>
      </div>
    </section>
    <?php  
    $row1_title = get_field('row1_title');
    $row1_text = get_field('row1_text');
    ?>
    <section class="service intro-text-wrap">
      <div class="section-two">
        <div class="left">
          <?php if ($row1_title) { ?>
          <div class="title">
            <h2 class="wp-block-heading has-text-align-right">
              <?php echo $row1_title ?>
            </h2>
          </div>
          <?php } ?>
        </div>

        <?php if ($row1_text) { ?>
        <div class="right">
          <?php echo $row1_text ?>
        </div>
        <?php } ?>
      </div>

      <?php  
      $row2_text_left = get_field('row2_text_left');
      $row2_text_right = get_field('row2_text_right');
      ?>

      <div class="section-four">
        
        <?php if ($row2_text_left) { ?>
        <div class="left alt">
          <?php echo $row2_text_left ?>
        </div>
        <?php } ?>


        <div class="right">
          <div class="wrapper">
            <div class="dots">
              <div class="dot-one"></div>
              <div class="dot-two"></div>
              <div class="dot-three"></div>
              <div class="dot-four"></div>
            </div>

            <?php if ($row2_text_right) { ?>
            <div class="right-text">
              <?php echo $row2_text_right ?>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
     </section>


		

				<div class="section-title">
					<h2>OUR TEAM</h2>
				</div>

			<section class="services">
				
				<?php 
					$bios = get_field('bios');

					foreach( $bios as $b ) {
						$name = $b['name'];
						$pic = $b['pic'];
						$bio = $b['bio'];

				 ?>
					<div class="cube">
						<h3><?php echo $name; ?></h3>
            <?php if( isset($pic['url']) && $pic['url'] ) { ?>
						<div class="pic">
							<img src="<?php echo $pic['url']; ?>">
						</div>
            <?php } ?>
						<div class="desc">
							<?php echo $bio; ?>
						</div>
					</div>
				<?php } ?>
			</section>
		<?php endwhile; // End of the loop.
		?>
  </main><!-- #main -->
</div>
<?php
get_footer();
