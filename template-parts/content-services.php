<?php
/**
 * Template part for displaying page content for the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

?>

	<header class="entry-header container py-2">
        <h2>Sign Services</h2>
        <p>AKO Signs is a service oriented company. We believe great service is the foundation of a great company and business relationship. AKO Signs offers all services related to signage and small business branding.</p>
	</header><!-- .entry-header -->
    <div class="container py-2 d-flex flex-wrap">
        <?php
            // The Query
            $the_query = new WP_Query( array('post_type' => 'services') );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part('template-parts/content', 'service');
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
    </div>
	<header class="entry-header container">
        <h2>Sign Products</h2>
        <p>There exists such a diversity of sign products and each business and industry has its own needs. That’s why we encourage you to reach out to one of our sign experts to help you find what will be most effective for your business.</p>
	</header><!-- .entry-header -->
    <div class="container py-5 d-flex flex-wrap">
        <?php
            // The Query
            $the_query = new WP_Query( array('post_type' => 'sign-products') );

            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    get_template_part('template-parts/content', 'sign-product');
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
    </div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'charmer' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
