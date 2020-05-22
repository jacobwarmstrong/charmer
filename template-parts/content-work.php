<?php
/**
 * Template part for displaying page content for the home page
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
        $sign_product_id = get_the_id();
        $sign_product_slug = $post->post_name;
        $sign_products[$sign_product_id] = ['link' => $sign_product_link, 'name' => $sign_product_name, 'slug' => $sign_product_slug];
    }
} else {
    // no posts found
}
$slugs = [];
foreach($sign_products as $sign_product) {
    array_push($slugs, $sign_product['slug']);
}
$implodeSlugs = implode(',', $slugs);
/* Restore original Post Data */
wp_reset_postdata();

// Get all attachments of this selected sign product and selected tags
$attachments = [];
if( $tag != null ) {
    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'category_name' => $implodeSlugs, 'tag_id' => $tag );
} else {
    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'category_name' => $implodeSlugs );
}
$the_query = new WP_Query( $args );
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        
        $image_id = $post->ID;
        array_push($attachments, $image_id);
        
         $post_tags = get_the_tags();;
        if ($post_tags) {
            foreach($post_tags as $post_tag) {
                $all_tags_arr[$post_tag->name] = $post_tag->term_id; 
            }
        }
    }
    $tags_array = array_unique($all_tags_arr); //REMOVES DUPLICATES
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>

	<header class="entry-header container">
		<span>Sign Product</span>
        <div class="dropdown dropdown-toggle mr-5">
            <a href="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h2>All Sign Products</h2></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php
              foreach($sign_products as $sign_product) : ?>
              <a class="dropdown-item" href="<?php echo $sign_product['link']; ?>"><?php echo $sign_product['name']; ?></a>
              <?php endforeach; ?>
            </div>
        </div>
	</header><!-- .entry-header -->
    
    
	<div class="container">
        <?php if( !empty($attachments) ) : ?>
        <div class="charmer-gallery row">
            <?php var_dump($attachments); ?>
            <?php foreach($attachments as $image_id) : ?>
                <div class="col-md-4">
                    <?php charmer_get_attachment_link($image_id, $tag); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class=" alert alert-info">AKO currently doesn't have any pictures of this product to show off! We blame our web developer.</div>
        <?php endif; ?>
        <?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'charmer' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .container -->

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
