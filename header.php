<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>

<?php
include( locate_template('scripts-from-blocks.php') );
 ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wp-site-blocks">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header class="wp-block-template-part">
		
		<div class="wp-block-group alignwide header-content has-background has-global-padding  wp-block-group-is-layout-constrained">
			<div class="global-wrapper">
			<div class="wp-block-group alignwide header-row-container is-content-justification-space-between is-layout-flex wp-container-core-group-is-layout-2 wp-block-group-is-layout-flex">

				

				<div class="wp-block-site-logo">
					<a href="<?php bloginfo('url'); ?>" class="custom-logo-link" rel="home" aria-current="page">
						<img width="320" height="26" src="<?php bloginfo('template_url'); ?>/images/bellaworks-logo.svg" class="custom-logo" alt="Custom Website Design &amp; Development | Charlotte, NC" decoding="async" />
					</a>
				</div>


				<div class="wp-block-group siteNavigation has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
					<nav class="is-responsive items-justified-right siteNav wp-block-navigation is-horizontal is-content-justification-right is-layout-flex wp-container-core-navigation-is-layout-1 wp-block-navigation-is-layout-flex" aria-label="Sitemap"
							data-wp-interactive="core/navigation" data-wp-context='{"overlayOpenedBy":{"click":false,"hover":false,"focus":false},"type":"overlay","roleAttribute":"","ariaLabel":"Menu"}'>
						<button aria-haspopup="dialog" aria-label="Open menu" class="wp-block-navigation__responsive-container-open "
								data-wp-on--click="actions.openMenuOnClick"
								data-wp-on--keydown="actions.handleMenuKeydown" >
							<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<rect x="4" y="7.5" width="16" height="1.5" />
								<rect x="4" y="15" width="16" height="1.5" />
							</svg>
						</button>
						<div class="wp-block-navigation__responsive-container  " style="" id="modal-1"
							data-wp-class--has-modal-open="state.isMenuOpen"
							data-wp-class--is-menu-open="state.isMenuOpen"
							data-wp-watch="callbacks.initMenu"
							data-wp-on--keydown="actions.handleMenuKeydown"
							data-wp-on--focusout="actions.handleMenuFocusout"
							tabindex="-1" >
							<div class="wp-block-navigation__responsive-close" tabindex="-1">
								<div class="wp-block-navigation__responsive-dialog"
									data-wp-bind--aria-modal="state.ariaModal"
									data-wp-bind--aria-label="state.ariaLabel"
									data-wp-bind--role="state.roleAttribute" >
									<button aria-label="Close menu" class="wp-block-navigation__responsive-container-close" data-wp-on--click="actions.closeMenuOnClick" >
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false">
											<path d="M13 11.8l6.1-6.3-1-1-6.1 6.2-6.1-6.2-1 1 6.1 6.3-6.5 6.7 1 1 6.5-6.6 6.5 6.6 1-1z"></path>
										</svg>
									</button>
									<div class="wp-block-navigation__responsive-container-content" data-wp-watch="callbacks.focusFirstElement" id="modal-1-content">
										<?php 
										$args = array(
											'container' => '',
											'menu' => 'primary'
										);

											wp_nav_menu( $args ); ?>
									</div>
								</div>
							</div>
						</div>
					</nav>
				</div>
				</div>
			</div>
		</div>
		
	</header>


