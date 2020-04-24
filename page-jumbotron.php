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

	<main id="primary" class="site-main">
        <div class="jumbotron jumbotron-fluid">
            <h1>Sign Products From People Who Care</h1>
            <p></p>
        </div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

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
