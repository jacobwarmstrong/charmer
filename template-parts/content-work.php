<?php
/**
 * Template part for displaying page content for the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

$sign_products = get_sign_products();
$images = get_gallery_images();

if (is_page('work')) {
    $selected = 'All Sign Products';
} else {
    $selected = get_the_title();
}
?>

<header class="entry-header container">
    <span>Sign Product</span>
    <div class="dropdown show mr-5">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h2><?php echo $selected; ?></h2></a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="/work">All Sign Products</a>
          <?php
          foreach($sign_products as $sign_product) : ?>
          <a class="dropdown-item" href="<?php echo get_permalink($sign_product); ?>"><?php echo $sign_product->post_title; ?></a>
          <?php endforeach; ?>
        </div>
    </div>
</header><!-- .entry-header -->


<div class="container">
    <?php if( !empty($images) ) : ?>
    <div class="charmer-gallery row">
        <?php foreach($images as $image) : ?>
            <div class="col-md-4">
                <?php charmer_get_attachment_link($image->ID, $tag); ?>
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
