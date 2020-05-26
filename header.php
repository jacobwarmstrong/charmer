<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charmer
 */

//select navbar classes based on page template
if ( is_page_template('page-jumbotron.php') ) {
    $nav_classes = ' navbar-dark';
    $contact_classes = ' btn-outline-light nav-link';
} else {
    $nav_classes = ' navbar-light';
    $contact_classes = ' btn-outline-dark';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'charmer' ); ?></a>

	<header id="masthead" class="site-header">
        
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg <?php echo $nav_classes; ?>">
            <div class="container">
            <div class="site-branding navbar-brand">
                <?php
                if(has_custom_logo()) {
                    the_custom_logo();
                } else {
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;
                }

                    ?>
            </div><!-- .site-branding -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu-container" aria-controls="primary-menu-container" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="primary-menu-container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
                    'menu_class'     => 'main-navigation navbar-nav',
                    'container_class' => 'mr-auto'
				)
			);
			?>
            <?php
            if ( is_woocommerce() || is_page('My Account') || is_page('Cart')) : 
              if ( is_user_logged_in() ) : ?>
              <div class="dropdown mr-5">
                <a href="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php
                	printf(
                    /* translators: 1: user display name*/
                    __( '%1$s', 'woocommerce' ),
                     esc_html( wp_get_current_user()->display_name ),
                    esc_url( wc_logout_url() )
	               ); ?>
                </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="/shop/my-account">My Account</a>
                      <a class="dropdown-item" href="/shop/cart">Cart</a>
                      <a class="dropdown-item" href="<?php echo wp_logout_url("/shop/my-account"); ?>">Logout</a>
                  </div>
              </div>
              <?php else : ?>
              <a href="/my-account" class="mr-5">Login</a>
              <?php endif;
             endif; ?>
            <?php if ( !is_page('Contact') && !is_page('Contact - Augusta') ) : ?>
            <a class="btn <?php echo $contact_classes; ?>" href="<?php echo get_page_link(136); ?>" role="button">Contact</a>
            <?php endif; ?>
          </div>
        </div>
        </nav> 
	</header><!-- #masthead -->
