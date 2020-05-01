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
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                 <div class="col-md-7">
                    <h1>Sign Products From People Who Care</h1>
                    <p class="lead">We’ve been keeping people
happy for over 30 years with
our comprehensive sign solutions.</p>
                     <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                 </div>
                 <div class="col-md-5">
                     <img src="http://ako-signs/wp-content/uploads/bruce-melissa-line.png">
                 </div>
                </div>

            </div>

        </div>

		<?php
		while ( have_posts() ) :
			the_post();
            if(is_front_page()) {
                get_template_part( 'template-parts/content', 'home' );
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
