<?php
/**
 * Template part for displaying product blurbs on the services page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row mb-4'); ?>>
    <div class="col-sm-3 mb-4">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'icon img-fluid mx-auto d-block'] ); ?>
    </div>
    <div class="col-sm-9">
    	<header class="entry-header">
		<?php
			the_title( '<h4 class="entry-title">', '</h4>' );
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

	<footer class="entry-footer">
		<?php charmer_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
