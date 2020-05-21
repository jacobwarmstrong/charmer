<?php
/**
 * Template part for displaying page content for the sign-products posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

if ( isset($_GET['tag']) ) {
    $tag = $_GET['tag'];
} else {
    $tag = null;
}

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

// Get all attachments of this selected sign product and selected tags
$attachments = [];
if( $tag != null ) {
    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'category_name' => get_the_title(), 'tag_id' => $tag );
} else {
    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'category_name' => get_the_title() );
}
$the_query = new WP_Query( $args );
// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $img = wp_get_attachment_link( get_post()->id , [600,600], true, ['class' => 'img-fluid'] );
        array_push($attachments, $img);
        
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

	<header class="entry-header">
		<span>Sign Product</span>
        <div class="dropdown dropdown-toggle">
            <a href="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h2><?php the_title(); ?></h2></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php
              foreach($sign_products as $sign_product_name => $sign_product_link) : ?>
              <a class="dropdown-item" href="<?php echo $sign_product_link; ?>"><?php echo $sign_product_name; ?></a>
              <?php endforeach; ?>
            </div>
        </div>
        <?php if( !empty($tags_array) ) : ?>
        <div class="my-2">
            <span>Tags associated with <?php the_title(); ?>:</span>
            <div class="d-flex flex-row flex-wrap my-2">
                <?php foreach($tags_array as $tag_name => $tag_id) :
                if($tag_id == $tag) {
                    $tag_class = 'badge-selected';
                } else {
                    $tag_class = 'badge-primary';
                }
                ?>
                <a href="?tag=<?php echo $tag_id; ?>" class="badge badge-pill my-1 <?php echo $tag_class; ?> p-2 mr-3"><?php echo $tag_name; ?></a>
                <?php endforeach; ?>
            </div>
            <?php if ($tag) : ?>
            <a href="?reset=true" class="btn btn-outline-primary my-2">Reset Tag Filter</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

	</header><!-- .entry-header -->
    
	<div class="entry-content container">
        <?php if( !empty($attachments) ) : ?>
        <div class="charmer-gallery row">
            <?php foreach($attachments as $img) : ?>
                <div class="col-md-4">
                    <?php echo $img; ?>
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
				'<span class="edit-link badge badge-dark">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
