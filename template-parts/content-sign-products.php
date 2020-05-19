<?php
/**
 * Template part for displaying page content for the sign-products posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */


// Get list of sign products
$sign_products = [];
$the_query = new WP_Query( array('post_type' => 'sign-products') );

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $sign_product_name = get_the_title();
        $sign_product_link = get_permalink();
        $sign_products[$sign_product_name] = $sign_product_link;
    }
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>

	<header class="entry-header container">
		<span>Sign Product</span>
        <div class="dropdown dropdown-toggle mr-5">
            <a href="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h2><?php the_title(); ?></h2></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php
              foreach($sign_products as $sign_product_name => $sign_product_link) : ?>
              <a class="dropdown-item" href="<?php echo $sign_product_link; ?>"><?php echo $sign_product_name; ?></a>
              <?php endforeach; ?>
            </div>
        </div>
	</header><!-- .entry-header -->
    
    
	<div class="entry-content container">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'charmer' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer container">
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
