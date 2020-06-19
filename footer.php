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
                // sign products
                $sign_products = get_sign_products();

                // The Loop
                if ( !empty( $sign_products ) ) : ?>
                    <ul class="sign-products-list list-unstyled d-flex flex-column flex-wrap">
                    <?php foreach($sign_products as $sign_product) : ?>
                        <li class="py-2"><a href="<?php echo get_permalink($sign_product); ?>"><?php echo $sign_product->post_title; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>No sign products found! Contact the web developer!</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
		<div class="site-info container py-5 d-flex flex-column flex-row-md">
            <div class="d-flex flex-row">
                <a class="p-2" href="https://www.facebook.com/AkoSigns/" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(971)); ?></a>
                <a class="p-2" href="https://www.instagram.com/akosigns/?hl=en" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(970)); ?></a>
                <a class="p-2" href="https://www.yelp.com/biz/ako-signs-athens" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(978)); ?></a>
            </div>
            <div class="my-5">
                <?php wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
                    'menu_class'     => 'main-navigation navbar-nav',
                    'container_class' => 'mr-auto'
				)
			);
                ?>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<script>
        jQuery(window).on('load',function(){
            jQuery('#mailSentModal').modal('show');
        });
    
        jQuery(window).on('load', function () {
            jQuery('#popUpModal').modal('show')
        })
</script>

<?php wp_footer(); ?>

</body>
</html>
