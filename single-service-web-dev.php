<?php 

get_header(); 
/*
Template Name: Web Dev
Template Post Type: service
*/
?>
<div class="wp-site-blocks">
	<main class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
        <div class="pagewrapper">
        <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>

            <section class="service">
                <div class="intro">
                  <h1><?php the_title(); ?></h1>
                </div>
                <?php 
                  $row1_title = get_field('row1_title');
                  $row1_content = get_field('row1_content');
                ?>
                <div class="section-two">
                  <?php if ($row1_title) { ?>
                  <div class="left">
                    <div class="title">
                      <h2 class="wp-block-heading has-text-align-right">
                        <?php echo $row1_title ?>
                      </h2>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if ($row1_content) { ?>
                  <div class="right">
                    <?php echo $row1_content ?>
                  </div>
                  <?php } ?>
                </div>

                <?php 
                  $row2_content_left = get_field('row2_content_left');
                  $row2_content_right = get_field('row2_content_right');
                ?>
                <?php if ($row2_content_left || $row2_content_right) { ?>
                <div class="section-three">
                  <?php if ($row2_content_left) { ?>
                  <div class="left">
                    <?php echo $row2_content_left ?>
                  </div>
                  <?php } ?>

                  <?php if ($row2_content_right) { ?>
                  <div class="right">
                    <?php echo $row2_content_right ?>
                  </div>
                  <?php } ?>
                </div>
                <?php } ?>
                
                <?php 
                  $row3_content_left = get_field('row3_content_left');
                  $row3_content_right = get_field('row3_content_right');
                ?>
                <div class="section-four">
                    <?php if ($row3_content_left) { ?>
                    <div class="left">
                      <?php echo $row3_content_left ?>
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

                        <?php if ($row3_content_right) { ?>
                        <div class="textblock">
                          <?php echo $row3_content_right ?>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                </div>
                
                <div class="content">
                    <?php //the_content(); ?>
                    <?php 
                        $section_title = get_field('section_title');
                        $faqs = get_field('faqs');

                        if( $faqs ) {
                     ?>

                     <section class="faqs">
                        <div class="faq-title">
                            <h2 class="faqs">FAQS</h2>
                        </div>
                         
                         <?php foreach( $faqs as $f ) { ?>
                            <div class="faqrow">
                               <div class="question"><div class="question-image"></div><?php echo $f['question']; ?></div>
                               <div class="answer"><?php echo $f['answer']; ?></div>
                            </div>
                         <?php } ?>
                     </section>

                    <?php } ?>
                    

                </div>
            </section>


        <?php endwhile; endif; ?>
        </div>
        <?php include( locate_template('three-steps.php') ); ?>
    </main>
</div>

<?php
get_footer();
