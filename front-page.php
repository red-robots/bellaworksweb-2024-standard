<?php
/**
 * Template Name: Homepage
 */

get_header(); ?>
<main class="main-content main-content-home">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php 
    $hbtn = get_field('hero_button');
    $btnLink = ( isset($hbtn['url']) && $hbtn['url'] ) ? $hbtn['url'] : '';
    $btnName = ( isset($hbtn['title']) && $hbtn['title'] ) ? $hbtn['title'] : '';
    $btnTarget = ( isset($hbtn['target']) && $hbtn['target'] ) ? '_self' : '';

    $left_text = get_field('left_text');
    $right_text = get_field('right_text');
    $hero_class = ($left_text  && $right_text) ? 'twocol':'onecol';
    if($left_text || $right_text) { ?>
    <div class="homeHero <?php echo $hero_class ?>">
      <?php if ($left_text) { ?>
        <div class="homeCol left">
          <div class="inner"><?php echo nl2br($left_text) ?></div>
        </div>
      <?php } ?>
      <?php if ($right_text) { 
        $parts = explode('|', $right_text);
        ?>
        <div class="homeCol right">
          <div class="inner">
            <br>
            <?php foreach ($parts as $k=>$part) { 
              $is_active = ($k==0) ? ' activezz':''; ?>
              <span class="togglezz space-letters
                <?php echo $is_active ?>"><?php echo trim($part) ?>    
              </span>
            <?php } ?>
            <?php if ($btnLink && $btnName ) { ?>
              <div class="hero-button">
                <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button"><?php echo $btnName ?></a>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php } ?> 


    <?php  
    $row1_column_left_image = get_field('row1_column_left_image');
    $row1_column_left = get_field('row1_column_left');
    $row1_column_right = get_field('row1_column_right');
    if($row1_column_left || $row1_column_right) { ?>
    <div class="homeSection2 row1-content">
      <div class="wp-block-columns">

        <?php if ($row1_column_left || $row1_column_left_image) { ?>
        <div class="leftCol">
          <div class="inner">
            <?php if ($row1_column_left_image) { ?>
            <figure data-aos="fade-right">
              <img src="<?php echo $row1_column_left_image['url'] ?>" alt="<?php echo $row1_column_left_image['title'] ?>">
            </figure>
            <?php } ?>
            <?php echo $row1_column_left; ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($row1_column_right) { ?>
        <div class="rightCol">
          <div class="wp-block-group">
            <?php echo $row1_column_right; ?>
          </div>
        </div>
        <?php } ?>
        
      </div>
    </div>
    <?php } ?> 


    <?php 
    $row2_title_block = get_field('row2_title_block');
    $row2_services = get_field('row2_services');
    if ($row2_title_block || $row2_services) { ?>
    <div class="homeSection4">
      <div class="wp-block-columns">

        <?php if ($row2_title_block) { ?>
        <div class="leftCol">
          <div class="inner">
            <?php echo $row2_title_block ?>
          </div>
        </div>
        <?php } ?>

        <?php if ($row2_services) { ?>
        <div class="rightCol">
          <div class="rounded-top-blocks">
            <?php 
            $count = count($row2_services);
            if($count>2) {
              $services = array_chunk($row2_services,2);
              foreach ($services as $items) { ?>
              
              <div class="group">
                <?php foreach ($items as $sv) { 
                  $btn = ( isset($sv['services_link']) ) ? $sv['services_link'] : '';
                  $btnTitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                  $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                  $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                  $btnTitle = ($btnTitle) ? str_replace('|','<br/>', $btnTitle) : '';
                  ?>
                  <?php if ($btnTitle && $btnLink) { ?>
                  <div class="rounded-top" data-aos="flip-left">
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>"><span><?php echo $btnTitle ?></span></a>
                  </div>
                  <?php  }
                } ?>
              </div>

              <?php }

            } else {
              foreach ($row2_services as $sv) { 
                $btn = ( isset($sv['services_link']) ) ? $sv['services_link'] : '';
                $btnTitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                $btnLink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                $btnTitle = ($btnTitle) ? str_replace('|','<br/>', $btnTitle) : '';
                ?>
                <?php if ($btnTitle && $btnLink) { ?>
                <div class="rounded-top" data-aos="flip-left">
                  <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>"><span><?php echo $btnTitle ?></span></a>
                </div>
                <?php  }
              }
            }
            ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?> 

    <?php  
    $row3_title = get_field('row3_title');
    $portfolio_shortcode = get_field('portfolio_shortcode');
    if( $portfolio_shortcode && do_shortcode($portfolio_shortcode) ) { ?>
    <div class="portfolio-section">
      <?php if ($row3_title) { ?>
      <div class="titleDiv" data-aos="fade-up" data-aos-delay="500">
        <h2><?php echo $row3_title ?></h2>
      </div>
      <?php } ?>
      <div class="inner">
        <?php echo do_shortcode($portfolio_shortcode); ?>
      </div>
    </div>
    <?php } ?> 


    <?php  
    $row4_visibility = get_field('row4_visibility');
    if( $row4_visibility!='hide' ) {
      $row4_section_title = get_field('row4_section_title');
      $row4_partners = get_field('partners');
      if( $row4_partners ) { ?>
      <div class="homeSection5 partners-section">
        <div class="inner">
          <?php if ($row4_section_title) { ?>
          <h2 class="title-block"><?php echo $row4_section_title ?></h2> 
          <?php } ?>

          <?php if ($row4_partners) { ?>
          <div class="partners-list">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php 
                  foreach( $row4_partners as $p ) {
                    $url = get_field('url', $p['ID']);
                 ?>
                  <div class="partners swiper-slide">
                    <a href="<?php echo $url; ?>" target="_blank">
                      <img  decoding="async" width="300" height="223" src="<?php echo $p['url']; ?>" alt="" class=""/>
                    </a>
                  </div>
                <?php } ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?> 
    <?php } ?> 


    <?php  
    $row_5_content = get_field('row_5_content');
    $row_5_title = get_field('row_5_title');
    if( $row_5_content ) { ?>
    <div class="section row_5_content">
      <?php if ($row_5_title) { ?>
       <div class="titleDiv" data-aos="fade-up" data-aos-delay="500">
         <h2><?php echo $row_5_title ?></h2>
       </div> 
      <?php } ?>
      <div class="inner" data-aos="fade-left">
        <?php echo $row_5_content ?>
      </div>
    </div>
    <?php } ?> 


    <?php  
    $row6_visibility = get_field('row6_visibility');
    if( $row6_visibility!='hide' ) {
      $row6_left_column = get_field('row6_left_column');
      $row6_right_column = get_field('row6_right_column');
      if( $row6_left_column ||  $row6_right_column ) { ?>
      <div class="section row_6_content">
        <div class="inner">
          <?php if ($row6_left_column) { ?>
          <div class="leftCol flexcol" data-aos="fade-right">
            <div class="inside">
              <?php echo $row6_left_column ?>
            </div>
          </div>
          <?php } ?>

          <?php if ($row6_right_column) { ?>
          <div class="rightCol flexcol">
            <div class="inside">
              <?php echo $row6_right_column ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?> 
    <?php } ?> 

  <?php endwhile; ?>    

  <?php include( locate_template('three-steps.php') ); ?>
  
</main><!-- #main -->
<?php
get_footer();
