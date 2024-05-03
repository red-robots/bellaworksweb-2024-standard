

	<?php
	// $footlogo = get_field("footlogo","option");
	// $address = get_field("address","option");
	// $phone = get_field("phone","option");
	// $fax = get_field("fax","option");
	// $email = get_field("email","option");
	// $contacts = array($address,$phone,$fax,$email);
	// $other_info = get_field("other_info","option");
	// $social_media = get_field("social_links","option");
	// $social_icons = social_icons();
	// $footer_logos = get_field("footer_logos","option");
	?>
	<footer class="site-footer wp-block-template-part">
		
		<div class="wp-block-group has-background   wp-block-group-is-layout-constrained" style="">

			<div class="global-wrapper">
			
				<div class="footer-contents">
					<div>
						<p>Bellaworks Web Design<br>436 E 36th Street<br>Charlotte, North Carolina 28205<br>P 704.375.0831<br>M info@bellaworksweb.com</p>
					</div>

					<div>
						<nav  class="footer" aria-label="Footer navigation">
							<?php 
								$args = array(
									'container' => '',
									'menu' => 'primary'
								);

								wp_nav_menu( $args ); 
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
