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
        <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg">
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
                    'menu_class'     => 'main-navigation navbar-nav mr-auto'
				)
			);
			?>
          </div>
        </nav> 
	</header><!-- #masthead -->
