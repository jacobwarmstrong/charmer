<?php
/**
 * Template part for displaying images as a full-screen 'lightbox'
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

//setup variables for image navigation and rendering
//functions are found in functions.php
$data = apply_filters('filter_images', get_the_id() );
$id = $data['id'];
$category = $data['category'];
$tags = $data['tags'];
$selected_tag = $data['the_selected_tag'];
$nextImg = $data['next_image'];
$currentImg = $data['current_image'];
$previousImg = $data['previous_image'];
?> 


<div id="post-<?php the_ID(); ?>" <?php post_class('full-screen'); ?>>
    <div id="container-image" class="container-image">
        <!----Loading Spinner------>
        <div id="spinner" class="spinner-border text-light" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <!----/Loading Spinner----->
        <div class="button-container">
        <!----Close Button------>
        <div id="close-button" class="">
            <a href="/sign-products/<?php echo $category->slug . '/?tag=' . $selected_tag; ?>"> 
            <button type="button" class="close img-close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </a>
        </div>
        <!----/Close Button------>
        <!----Previous Image Nav Button---->
        <?php if ($previousImg) : ?>
        <a href="<?php echo $previousImg['link']; ?>">
            <div id="left-arrow" class="img-left-nav">
                <img class="mx-auto" src="<?php echo get_template_directory_uri(); ?>/assets/arrow-left.png">
            </div>
        </a>
        <?php endif; ?>
        <!-----/Previous Image Nav Button--->
        <!----Next Image Nav Button---->
        <?php if ($nextImg) : ?>
        <a href="<?php echo $nextImg['link']; ?>">
            <div id="right-arrow" class="img-right-nav">
                <img class="mx-auto" img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-right.png">
            </div>
        </a>
        <?php endif; ?>
        <!----/Next Image Nav Button---->
        <!----Current Image---->
        <img id="image" src="<?php echo $currentImg['src']; ?>" alt="<?php echo $currentImg['alt']; ?>">
        <!----/Current Image---->
        </div><!----/button-container>
        <!----Current Image Info---->
        <header id="image-info" class="entry-header header-image">
            <div class="container">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <p><?php echo wp_get_attachment_caption( ); ?></p>
                <?php charmer_entry_footer(); ?>
                <div class="my-3 d-flex flex-row- flex-wrap">
                    <a href="/sign-products/<?php echo $category->slug; ?>" class="btn btn-secondary"><?php echo ucwords($category->name); ?></a>
                </div>
                <div class="my-3 d-flex flex-row- flex-wrap">
                    <span class="mr-2">Tags: </span>
                    <?php foreach ($tags as $tag) : ?>
                    <a href="/sign-products/<?php echo $category->slug; ?>/?tag=<?php echo $tag->term_id; ?>" class="badge badge-pill badge-primary p-2 mr-2 mb-2"><?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </header><!-- .entry-header -->
        <!----/Current Image Info---->
    </div>
</div><!-- #post-<?php the_ID(); ?> -->
