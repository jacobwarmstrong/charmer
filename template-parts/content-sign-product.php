<?php
/**
 * Template part for displaying product blurbs on the services page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
    <?php the_post_thumbnail('thumbnail', ['class' => 'icon mb-4']); ?>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title">', '</h2>' );
        ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'charmer' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'charmer' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
    
        <a href="<?php echo get_edit_post_link(); ?>">Edit</a>
</article><!-- #post-<?php the_ID(); ?> -->
