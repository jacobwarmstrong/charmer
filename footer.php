<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package charmer
 */

?>

	<footer id="colophon" class="site-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <h3>AKO Signs</h3>
                <p>AKO Signs is a Georgia based Sign Company with 30 years of experience in the industry. AKO Signs offers comprehensive custom sign services and products. We have two locations, one in Athens, and one in Augusta.</p>
                </div>
                <div class="col-md-3">
                <h6>Athens</h6>
                <p>1625 Oconee St<br>Athens, GA 30605</p>
                <p>706-548-5389</p>
                <h6>Augusta</h6>
                <p>3801 Washington Rd<br>Augusta, GA 30907</p>
                <p>706-210-5595</p>
                </div>
                <div class="col-md-6">
                <?php
                // The Query
                $the_query = new WP_Query( array('post_type' => 'sign-products') );

                // The Loop
                if ( $the_query->have_posts() ) {
                    echo '<ul class="sign-products-list list-unstyled d-flex flex-column flex-wrap">';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        echo '<li class="py-2">' . get_the_title() . '</li>';
                    }
                    echo '</ul>';
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>
                </ul>
                </div>
            </div>
        </div>
		<div class="site-info container py-5 d-flex flex-column flex-row-md">
            <div class="d-flex flex-row">
                <a class="p-2" href="https://www.facebook.com/AkoSigns/" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(971)); ?></a>
                <a class="p-2" href="https://www.instagram.com/akosigns/?hl=en" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(970)); ?></a>
                <a class="p-2" href="https://www.yelp.com/biz/ako-signs-athens" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(978)); ?></a>
            </div>
            <div class="">
                <a class="" href="<?php echo esc_url( __( 'https://wordpress.org/', 'charmer' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'charmer' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'charmer' ), 'charmer', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
