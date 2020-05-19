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
        
         $post_tags = get_the_tags();
        var_dump($post_tags);
        if ($post_tags) {
            foreach($post_tags as $tag) {
                $all_tags_arr[$tag->name] = $tag->term_id; //USING JUST $tag MAKING $all_tags_arr A MULTI-DIMENSIONAL ARRAY, WHICH DOES WORK WITH array_unique
            }
        }
    }
    $tags_array = array_unique($all_tags_arr); //REMOVES DUPLICATES
    var_dump($tags_array);
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();



?>

	<header class="entry-header container">
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
        <div class="d-flex flex-row">
            <?php foreach($tags_array as $tag_name => $tag_id) : ?>
            <a href="?tag=<?php echo $tag_id; ?>" class="badge badge-pill badge-primary p-3 mr-3"><?php echo $tag_name; ?></a>
            <?php endforeach; ?>
        </div>
	</header><!-- .entry-header -->
    
    
	<div class="entry-content container">
		<?php
		the_content(); ?>
        <div class="row">

        <?php foreach($attachments as $img) : ?>
        <div class="col-md-4">
            <?php echo $img; ?>
        </div>
        <?php endforeach; ?>
        </div>
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
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
