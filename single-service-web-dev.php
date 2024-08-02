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
                <div class="section-two">
                    <div class="left">
                        <div class="title">
                            <h2 class="  wp-block-heading has-text-align-right">A Website Design<br>
                            <strong>That Wows & Works</strong></h2>
                        </div>
                        
                    </div>
                    
                    <div class="right">
                        <p>Does your website welcome customers in or scare them away? As your digital front door, first impressions matter. A less-than-inviting site could send customers knocking on your competitor's door, costing you big time.</p>
                        <p>Strategy is essential to capture your audience's attention, maintain their interest, and lead them to the next step. Whether launching a new website or refreshing an existing one, we help define its navigation, layout, content organization, and more.</p>

                    </div>
                </div>
                <div class="section-three">
                    <div class="left">
                        <h2>Customized WordPress Website</h2>
                        <p>A tailor-made website can be the way to go when you want to showcase your brand’s personality and story. Our team will handcraft a unique website that looks impressive and weaves your brand narrative seamlessly across multiple pages. We use WordPress as our content management system because it’s user-friendly, even for beginners, and is flexible and adaptable. To create a custom look, we implement our full design process.</p>
                    </div>
                    <div class="right">
                        <h2>Our Design Process</h2>
                        <p>Learn about your brand, needs, and dreams for your website before web design begins.</p>  
                        <p>Design that aligns with your vision while providing expert advice whenever you need guidance.</p>
                  <p>Launch a site that looks incredible and runs smoothly for visitors.</p>
                    </div>
                </div>
                <div class="section-four">
                    <div class="left">
                        <h2>Brochure Website</h2>
                        <p>A brochure website is perfect for entrepreneurs and small businesses looking to get a professional site set up quickly. It shares a company’s information in a few pages and can be done in days. These smaller websites are easy to update and highly effective.</p>

                    </div>
                    <div class="right">
                        <div class="wrapper">
                            <div class="dots">
                                <div class="dot-one"></div>
                                <div class="dot-two"></div>
                                <div class="dot-three"></div>
                                <div class="dot-four"></div>
                            </div>
                            <p>Whether you need a fully customized website, a brochure site, or something in between, we’ll help you find the perfect solution. We’ll create a website that drives success for your business.</p>
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
