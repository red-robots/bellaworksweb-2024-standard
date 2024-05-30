<?php 

get_header(); 
/*
Template Name: Copywriting
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
                    <!-- <figure>
                        <img src="<?php bloginfo('template_url'); ?>/images/CIRCLES.svg">
                    </figure> -->
                    <h1>Website Copywriting</h1>
                </div>
                <div class="section-two">
                    <div class="left">
                        <div class="title">
                            <h2 class="  wp-block-heading has-text-align-right">Create Words<br>
                            <strong>That Connect</strong></h2>
                        </div>
                        
                    </div>
                    
                    <div class="right">
                        <p>Before we design your website, you need powerful words to set the stage for your site. But let's face it: people read websites like they're scanning for the good stuff rather than reading word-for-word like with magazines or novels. Writing website copy that encourages your audience to take action requires skill. And you need to know where words should go.</p>

                    </div>
                </div>
                <!-- <div class="section-three">
                    <div class="left">
                        
                    </div>
                    <div class="right">
                        
                    </div>
                </div> -->
                <div class="section-four">
                    <div class="left alt">
                    	<p>With our website copywriting services, we learn about your business, audience, industry, and competitors. Then, we combine these insights with strategy and website best practices. Want to show up in search engines like Google? We'll research keywords and sprinkle keyword phrases into your website copy to help you be found online while considering searcher intent and keeping the copy engaging.</p>
                    	<p>Save time crafting online-scannable copy that inspires more people to engage with your site, and positions your brand as an expert by leaving the copywriting to us.</p>
                    </div>
                    <div class="right">
                        <div class="wrapper">
                            <div class="dots">
                                <div class="dot-one"></div>
                                <div class="dot-two"></div>
                                <div class="dot-three"></div>
                                <div class="dot-four"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php 
                        $section_title = get_field('section_title');
                        $faqs = get_field('faqs');

                        if( $faqs ) {
                     ?>
                <div class="content">
                    <?php //the_content(); ?>
                    

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

                   
                    

                </div>
                 <?php } ?>
            </section>


        <?php endwhile; endif; ?>
        </div>
        <?php include( locate_template('three-steps.php') ); ?>
    </main>
</div>

<?php
get_footer();
