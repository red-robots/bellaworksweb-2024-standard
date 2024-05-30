<?php 

get_header(); 
/*
Template Name: Digital Marketing
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
                    <h1>Digital Marketing</h1>
                </div>
                <div class="section-two">
                    <div class="left">
                        <div class="title">
                            <h2 class="  wp-block-heading has-text-align-right">Ignite <br>
                            <strong>Business Growth</strong></h2>
                        </div>
                        
                    </div>
                    
                    <div class="right">
                        <p>Now that you've got a killer website that lands more sales and profits from visitors, what's next? Ready to skyrocket your business? Then, digital marketing may be the next best move to get your site in front of more eyeballs.</p>
                        <p>Today, reaching your audience online is easier than ever. Your company can pop up on their screen anytime, but guess what? So can everyone else's. It's all about investing in the long term, and it takes seeing your offer multiple times before someone hits that action button. Beating the competition and engaging customers is a mix of strategy, expert copy, design, and responding to analytics. But you're not alone. We have digital marketing services tailored to your business goals to help you rock online.</p>

                    </div>
                </div>
                <div class="section-three">
                    <div class="left">
                        <h2>E-mail Marketing</h2>
                        <p>Your Inbox is already flooded. Now, you need to whip up some e-mails to connect with customers or promote some killer deals. What? Your own e-mails already eat up enough time. You can't possibly add this to your overflowing plate. Leave it to our team. We'll create custom, professional templates in a user-friendly format that makes putting together an e-mail simple. We've got your e-mail campaigns covered, from subject lines that get more opens, graphics that dazzle, and a proper sequence that seals the deal.</p>
                    </div>
                    <div class="right">
                        <h2>Google AdWords</h2>
                        <p>To grow your business, you need new customers surfing through your online front door. Digital pay-per-click (PPC) ads can be a great way to reach new customers – if they’re written and analyzed correctly. We'll create, analyze, and optimize your AdWords campaigns to get those clicks turning into customers.</p>
                    </div>
                </div>
                <div class="section-four">
                    <div class="left">
                        <h2>Search Engine Optimization (SEO)</h2>
                        <p>Want to be found online? Search engine optimization (SEO) can help you get there. We've learned over the years that websites trying to outsmart or trick search engine algorithms with changing techniques fail. Good SEO is a marathon, not a sprint. Strategies too often focus on short-term gains instead of long-term growth. We don't have a secret SEO solution up our sleeve for an instant #1 spot. We've found SEO success lies in a content-based strategy that ramps up organic traffic and boosts your brand online. It's the perfect mix of killer content, great copywriting, and spot-on messaging that doesn't just get clicks</p>

                    </div>
                    <div class="right">
                        <div class="wrapper">
                            <div class="dots">
                                <div class="dot-one"></div>
                                <div class="dot-two"></div>
                                <div class="dot-three"></div>
                                <div class="dot-four"></div>
                            </div>
                            <p></p>
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
