<?php
/**
 * Template part for displaying page content for the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package charmer
 */

?>

<div id="popUpModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="display-4">Hey There!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Our new online shop is live, check it out!</p>
        <a href="/shop/" class="btn btn-primary">Let's Go</a>
      </div>
    </div>
  </div>
</div>
    <div class="container py-5 fade-in-container">
        <div class="fade-in-container">
            <div class="persuasion-block row my-5 py-5 fade-in">
                <div class="col-sm-5 mb-4">
                    <?php echo wp_get_attachment_image(get_field('image') , 'large', false, ['class' => 'img-fluid mx-auto d-block']); ?>
                </div>
                <div class="col-sm-7">
                    <h3 class="display-4"><?php the_field('headline'); ?></h3>
                    <p><?php the_field('copy'); ?></p>
                </div>
            </div>
        </div>
        <div class="fade-in-container">
            <div class="persuasion-block row my-5 py-5 fade-in">
                <div class="col-sm-5 mb-4">
                    <?php echo wp_get_attachment_image(get_field('image2') , 'large', false, ['class' => 'img-fluid mx-auto d-block']); ?>
                </div>
                <div class="col-sm-7">
                    <h3 class="display-4"><?php the_field('headline2'); ?></h3>
                    <p><?php the_field('copy2'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grey-box fade-in-container">
        <div class="container">
            <h3>We Work with the Big Names</h3>
            <div class=" d-flex flex-column flex-md-row align-content-stretch flex-wrap my-3">
            <?php
            $dir = '../wp-content/uploads/charmer-clients';
            $dir = wp_upload_dir()['path'] . '/charmer-clients/';
            $url = wp_upload_dir()['url'] . '/charmer-clients/';
            $files = scandir($dir);
            foreach ($files as $file) :
                if(strpos($file, '.') !== 0) : ?>
                    <div class="col-md-3 py-5 my-md-0 align-self-center d-flex justify-content-center fade-in">
                        <img class="" src="<?php echo $url . $file; ?>">
                    </div>
                <?php endif;
            endforeach;
            ?>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <h3>But No Job is Too Small</h3>
        <script src="https://googlereviews.cws.net/google-reviews.js"></script><br />
        <script>load_google_reviews("ChIJGfqnA5Rs9ogRkLud45u7688");</script>
    </div>
    
	<div class="entry-content">
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
