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
            <div class="site-info row">
                <div class="col-md-3">
                <h3>AKO Signs</h3>
                <p>AKO Signs is a Georgia based Sign Company with 30 years of experience in the industry. AKO Signs offers comprehensive custom sign services and products. We have two locations, one in Athens, and one in Augusta.</p>
                <div class="d-flex flex-row">
                    <a class="pl-0 pt-2 pr-2 pb-2 " href="https://www.facebook.com/AkoSigns/" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(971)); ?></a>
                    <a class="p-2" href="https://www.instagram.com/akosigns/?hl=en" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(970)); ?></a>
                    <a class="p-2" href="https://www.yelp.com/biz/ako-signs-athens" onclick="trackOutboundLink('https://www.facebook.com/AkoSigns/'); return false;"><?php echo(wp_get_attachment_image(978)); ?></a>
                </div>
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
            <hr>
            <nav class="navbar navbar-expand pl-0">
                    <span class="mr-5">&copy; AKO Signs Incorporated 2001-<?php echo date('Y'); ?></span>
                    <?php wp_nav_menu(
                    array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => 'navbar-nav flex-row',
                        'container_class' => 'ml-auto'
                        )
                    ); ?>              
            </nav>
		</div><!-- .container -->
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
