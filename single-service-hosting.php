<?php 

get_header(); 
/*
Template Name: Hosting
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
                    <h1>Website Hosting</h1>
                </div>
                <div class="section-two">
                    <div class="left">
                        <div class="title">
                            <h2 class="  wp-block-heading has-text-align-right">Safe, Secure, <br>
                            <strong>& Running Smoothly</strong></h2>
                        </div>
                        
                    </div>
                    
                    <div class="right">
                        <p>Website hosting may be the last thing on your mind when you dream of a new website or need to refresh an existing one. But crisis mode sets in fast if you log in one day and your website is down, has a malicious event, or has errors. Keep your website safe, and ensure it gets the updates it needs to run 24/7 because your digital front door is always open.</p>
                        <p>We offer website hosting services for every site we create, with multiple layers of security and a fast loading speed. With a security certificate and 30 days of site backups, you won't lose any precious data from a malicious event. If your website ever becomes compromised, we're there to identify the issue and restore your site quickly.</p>

                    </div>
                </div>
               
                <div class="section-four">
                    <div class="left alt">
                    	<h2>Here for you</h2>
                        <p>Through hosting, we provide continuous support, fostering long-term relationships with you and your team. Our expert team has access to your site from the initial launch and can easily perform technical maintenance. Access to your hosting platform and website lets us quickly troubleshoot issues and make content updates and changes when needed.</p>

                    </div>
                    <div class="right">
                        <div class="wrapper">
                            <div class="dots">
                                <div class="dot-one"></div>
                                <div class="dot-two"></div>
                                <div class="dot-three"></div>
                                <div class="dot-four"></div>
                            </div>
                            <p>Your website is a valuable investment for your business. With over 150 sites supported by our website hosting services, your site is in good hands when you host with us.</p>
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
