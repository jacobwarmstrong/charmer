<?php
/** 
 * The template for displaying pages with a jumbotron section
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * Template Name: Jumbotron Page 
 * @package charmer
 */

get_header();
?>

	<main id="primary" class="site-main jumbotron-reach-top">
        <div class="jumbotron jumbotron-fluid" style="background-color: <?php echo the_field('jumbotron_background_color'); ?>">
            <div class="container">
                <div class="row">
                 <div class="col-md-6">
                    <h1><?php echo the_field('cta_headline'); ?></h1>
                    <p class="lead"><?php echo the_field('cta_description'); ?></p>
                     <a class="btn btn-primary btn-lg" href="#" role="button"><?php echo the_field('cta_button_label'); ?></a>
                 </div>
                 <div class="col-md-6">
                     <img src="<?php echo the_field('cta_image'); ?>">
                 </div>
                </div>

            </div>

        </div>

		<?php
		while ( have_posts() ) :
			the_post();
            if(is_front_page()) {
                get_template_part( 'template-parts/content', 'home' );
            } elseif(get_the_title() == 'Services') {
                get_template_part( 'template-parts/content', 'services');
            } else {
                get_template_part( 'template-parts/content', 'page' );
            }


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
