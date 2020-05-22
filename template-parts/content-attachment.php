<?php
/**
 * Template part for displaying images full-size
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

$id = get_the_id();
$category = get_the_category();
$category = $category[0];
$tags = get_the_tags();

$images = get_gallery_images($category->slug, $tag);

$current_img['id'] = $id;
$current_img['src'] = wp_get_attachment_image_src($id, 'original')[0];
$current_img['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);

for($i = 0; $i < count($images); $i++) {
    if($images[$i]->ID == $id) {
        $current_img['order'] = $i;
    }
}

if(isset($current_img) && $current_img['order'] < count($images) - 1) {
    $nextImg = $images[($current_img['order'] + 1)];
    $next_link = get_permalink($nextImg);
} else {
    $nextImg = null;
}
if(isset($current_img) && $current_img['order'] > 0) {
    $previousImg = $images[($current_img['order'] - 1)];
    $prev_link = get_permalink($previousImg);
} else {
    $previousImg = null;
}

if($tag) {
    $query = '/?tag=' . $tag;
    $prev_link = $prev_link . $query;
    $next_link = $next_link . $query;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('full-screen'); ?>>
    <div class="container-image">
    <a href="/sign-products/<?php echo $category->slug . '/?tag=' . $tag; ?>"> 
        <button type="button" class="close img-close p-4" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </a>
    <?php if ($previousImg) : ?>
    <a href="<?php echo $prev_link; ?>">
        <div class="img-left-nav p-4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left.png">
        </div>
    </a>
    <?php endif; ?>
    <?php if ($nextImg) : ?>
    <a href="<?php echo $next_link; ?>">
        <div class="img-right-nav p-4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right.png">
        </div>
    </a>
    <?php endif; ?>
        <header class="entry-header header-image">
            <div class="container">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                <p><?php echo wp_get_attachment_caption( ); ?></p>
                <?php charmer_entry_footer(); ?>
                <div class="my-3 d-flex flex-row- flex-wrap">
                    <a href="/sign-products/<?php echo $category->slug; ?>" class="btn btn-outline-light"><?php echo ucwords($category->name); ?></a>
                </div>
                <div class="my-3 d-flex flex-row- flex-wrap">
                    <span class="mr-2">Tags: </span>
                    <?php foreach ($tags as $tag) : ?>
                    <a href="/sign-products/<?php echo $category->slug; ?>/?tag=<?php echo $tag->term_id; ?>" class="badge badge-pill badge-pill-outline-light p-1 mr-2 mb-2"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </header><!-- .entry-header -->
        <img src="<?php echo $current_img['src']; ?>" alt="<?php echo $img['alt']; ?>">
        
    </div>
</div><!-- #post-<?php the_ID(); ?> -->
