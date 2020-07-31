<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package charmer
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">
		<section class="error-404 not-found">
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/404-illustration_1.png" alt="You've reached a 404 page.">
                        <h1 class=""><?php esc_html_e( 'Something&rsquo;s Missing', 'charmer' ); ?></h1>
                        <p><?php esc_html_e( 'Unfortunately, we don&rsquo;t have anything to show you here. We hope you can find what you were looking for on another page.' , 'charmer' ); ?></p>
		</section><!-- .error-404 -->    
        </div><!-- .container -->

	</main><!-- #main -->

<?php
get_footer();
