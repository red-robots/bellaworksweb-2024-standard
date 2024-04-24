<?php 
/*____________________________________

			
			Social Media icons

_______________________________________*/
function acc_social_links() {

	$socials = array();
					
	$facebooklink = get_field('facebook_link', 'option');
	$twitterlink = get_field('twitter_link', 'option');
	$linkedinlink = get_field('linkedin_link', 'option');
	$instagramlink = get_field('instagram_link', 'option');
	$googlelink = get_field('google_link', 'option');
	
	$facebook = array(
		'class' => 'facebook',
		'link' => $facebooklink,
		'text' => 'Like us on Facebook',
	);
	$twitter = array(
		'class' => 'twitter',
		'link' => $twitterlink,
		'text' => 'Follow us on Twitter',
	);
	$linkedin = array(
		'class' => 'linkedin',
		'link' => $linkedinlink,
		'text' => 'Join us on Linkedin',
	);
	$instagram = array(
		'class' => 'instagram',
		'link' => $instagramlink,
		'text' => 'Follow us on Instagram',
	);
	$google = array(
		'class' => 'google',
		'link' => $googlelink,
		'text' => 'Follow us on Google',
	);
	// Add Chosen Social media to the list
	if($facebooklink != "") {
		$socials[] = $facebook;
	}
	if($twitterlink != "") {
		$socials[] = $twitter;
	}
	if($linkedinlink != "") {
		$socials[] = $linkedin;
	}
	if($instagramlink != "") {
		$socials[] = $instagram;
	} 
	if($googlelink != "") {
		$socials[] = $google;
	}
	// See what data we have.
	/*echo '<pre>';
	print_r($socials);
	echo '</pre>';*/
	
	// count for width
	$socialcount = count($socials);
	if($socialcount == 1) {
		$snumber = 'socialone';	
	} elseif($socialcount == 2) {
		$snumber = 'socialtwo';	
	} elseif($socialcount == 3) {
		$snumber = 'socialthree';	
	} elseif($socialcount == 4) {
		$snumber = 'socialfour';	
	} elseif($socialcount == 5) {
		$snumber = 'socialfive';	
	} elseif($socialcount == 6) {
		$snumber = 'socialsix';	
	}
	
	echo '<div id="sociallinks" class="' . $snumber . '">';
	echo '<ul>';
	
	foreach ( $socials as $social ) {
		echo '<li class="'. $social['class'] . '">';
		echo '<a href="' . $social['link'] . '" target="_blank">';
		echo $social['text'];
		echo '</a>';
		echo '</li>';
	}
	
	echo '</ul>';
	echo '</div><!-- social links -->'; 
} // end acc social links 


function get_my_social_style() { // Loads css 
	wp_enqueue_style( 'acc-social', get_template_directory_uri() . '/css/social.css', array( 'twentytwelve-style' ), '20121010' );
}
add_action( 'wp_enqueue_scripts', 'get_my_social_style' );