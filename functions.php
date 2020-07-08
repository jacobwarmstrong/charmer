<?php
/**
 * charmer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package charmer
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'charmer_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function charmer_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on charmer, use a find and replace
		 * to change 'charmer' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'charmer', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'charmer' ),
                'menu-2' => esc_html__( 'Footer', 'charmer' )
			)
		);
        //sign-products image gallery size
        add_image_size( 'sign-gallery', 600, 460, true);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'charmer_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        /**
        * Add WooCommerce
        */
	    add_theme_support( 'woocommerce' );
    }      
endif;
add_action( 'after_setup_theme', 'charmer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function charmer_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'charmer_content_width', 640 );
}
add_action( 'after_setup_theme', 'charmer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function charmer_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'charmer' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'charmer' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'charmer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function charmer_scripts() {
    wp_enqueue_style( 'bootstrap-style', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" );
    
    wp_enqueue_style( 'google-fonts-style', "https://fonts.googleapis.com/css2?family=PT+Serif+Caption" );
    
    wp_enqueue_style( 'google-fonts-style-2', "https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@900&display=swap" );
    wp_enqueue_style( 'charmer-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'charmer-style', 'rtl', 'replace' );

	wp_enqueue_script( 'charmer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'charmer-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    if (  get_post_type() != 'attachment' ) {
        wp_enqueue_script( 'charmer-add-class-to-nav-links', get_template_directory_uri() . '/js/add-class-to-nav-links.js', array(), _S_VERSION, true );
    }
    
    if ( is_page_template( 'page-jumbotron.php' ) ) {
        wp_enqueue_script( 'charmer-navbar', get_template_directory_uri() . '/js/navbar.js', array(), _S_VERSION, true );
    }
    
    if ( get_post_type() == 'attachment' ) {
        wp_enqueue_script( 'charmer-image-spinner', get_template_directory_uri() . '/js/image-loading-spinner.js', array(), _S_VERSION, true );
    }
    
    if ( get_post_type() == 'attachment' ) {
        wp_enqueue_script( 'charmer-image-lightbox-hover', get_template_directory_uri() . '/js/image-lightbox-hover.js', array(), _S_VERSION, true );
    }
    
    if ( get_post_type() == 'sign-products' || is_page('Work') ) {
        wp_enqueue_script( 'charmer-thumbnail-scale', get_template_directory_uri() . '/js/thumbnail-scale-on-hover.js', array(), _S_VERSION, true );
    }
    
    wp_enqueue_script( 'bootstrap-js-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), _S_VERSION, true  );
    
    //wp_enqueue_script( 'jquery-ui-min', "https://code.jquery.com/ui/1.12.1/jquery-ui.min.js", array(), _S_VERSION, true );
    
    wp_enqueue_script( 'bootstrap-js-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), _S_VERSION, true );
        
    wp_enqueue_script( 'bootstrap-js', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), _S_VERSION, true );
    
    
}
add_action( 'wp_enqueue_scripts', 'charmer_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//add bootstrap class nav-item to menus
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    $classes[] = 'nav-item';
    return $classes;
}

//barrowed from previous theme for AKO
function ako_signs_custom_post_types() {
  /*register_post_type( 'home_carousel',
    array(
      'labels' => array(
        'name' =>  'Home Carousel' ,
        'singular_name' => 'Home Carousel' 
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );*/
  register_post_type( 'sign-products',
    array(
      'labels' => array(
        'name' =>  'Sign Products' ,
        'singular_name' => 'Sign Product' 
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  register_post_type( 'services',
    array(
      'labels' => array(
        'name' =>  'Services' ,
        'singular_name' => 'Service' 
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' =>  'Testimonials' ,
        'singular_name' => 'Testimonials' 
      ),
      'public' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail')
    )
  );
}
add_action( 'init', 'ako_signs_custom_post_types' );

function charmer_output_content_wrapper() {
    echo '<div id="primary" class="content-area"><main id="main" class="site-main container" role="main">';
}

//Add Bootstrap container to woocommerce pages
add_action( 'wp_head', 'remove_woocommerce_container');
function remove_woocommerce_container() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    add_action('woocommerce_before_main_content', 'charmer_output_content_wrapper', 10 );
}

function charmer_shop_mobile_navbar() {
    if ( is_woocommerce() ) {
        get_template_part('woocommerce/mobile', 'navbar');
    }
}
add_action( 'wp_head', 'charmer_shop_mobile_navbar', 10);

if ( ! function_exists( 'akoSigns_register_nav_menu' ) ) {
 
    function akoSigns_register_nav_menu(){
        register_nav_menus( array(
            'shop_menu'  => __( 'Shop Menu', 'text_domain' ),
        ) );
    }
    add_action( 'after_setup_theme', 'akoSigns_register_nav_menu', 0 );
}

// add categories for attachments
function add_categories_for_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'add_categories_for_attachments' );

// add tags for attachments
function add_tags_for_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'add_tags_for_attachments' );


//hook into the init action and call create taxonomy when it fires
 
add_action( 'init', 'create_industry_nonhierarchical_taxonomy', 0 );
 
function create_industry_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Industries', 'taxonomy general name' ),
    'singular_name' => _x( 'Industry', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Industries' ),
    'popular_items' => __( 'Popular Industries' ),
    'all_items' => __( 'All Industries' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Industry' ), 
    'update_item' => __( 'Update Industry' ),
    'add_new_item' => __( 'Add New Industry' ),
    'new_item_name' => __( 'New Industry Name' ),
    'separate_items_with_commas' => __( 'Separate industries with commas' ),
    'add_or_remove_items' => __( 'Add or remove industries' ),
    'choose_from_most_used' => __( 'Choose from the most used industries' ),
    'menu_name' => __( 'Industries' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('industries','attachment',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'industry' ),
  ));
}

//charmer specific img html output for gallery
function charmer_get_attachment_link($post_id, $tag = null) {
    //use wordpress functions to get our img info
    $img['src'] = wp_get_attachment_image_src($post_id, 'sign-gallery')[0];
    $img['title'] = get_the_title($post_id);
    $img['alt'] = get_post_meta($post_id, '_wp_attachment_image_alt', true);
    $img['uri'] = get_permalink($post_id);
    $img['class'] = 'gallery-thumb';
    
    //if tag is in arg, then add it to the uri
    if($tag) {
        $img['uri'] .= '?tag=' . $tag;
    }
    
    //assemble img html
    $html = '<a href="' . $img['uri'] . '">';
    $html .= '<div class="image-info-overlay d-flex justify-content-center align-items-center"><h3>'. $img['title']. '</h3></div>';
    $html .= '<img class="' . $img['class'] .'" src="' . $img['src'] . '" ';
    $html .= '"alt="' . $img['alt'] . '">';
    $html .= '</a>';
    
    //output img html to frontend
    echo $html;
}

// Get array of all sign products
function get_sign_products() {
    $args = [
        'numberposts' => -1,
        'post_type' => 'sign-products',
        'orderby' => 'title',
        'order' => 'ASC'
    ];
    
    $sign_products = get_posts($args);
    return $sign_products;
}

function get_gallery_images($category = null, $tag = null) {
    if (isset($category)) {
        $categoryList = $category;
    } else {
        $slugs = [];
        $sign_products = get_sign_products();
        foreach($sign_products as $sign_product) {
            array_push($slugs, $sign_product->post_name);
        }
        $categoryList = implode(',', $slugs);
    }
    //create args based on tag input or not
    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'category_name' => $categoryList, 'numberposts' => -1 );
    //if tag is added, add to query arguments
    if( $tag != null ) {
        $args['tag_id'] = $tag;
    }
    $images = get_posts($args); 
    if ( $images ) {
        return $images;
    } else {
        // no posts found
    }
}

function get_all_tags_for_posts($posts) {
    $all_tags = [];
    foreach($posts as $post) {
        $post_tags = get_the_tags($post);

        if ($post_tags) {
            foreach($post_tags as $post_tag) {
                $tag = $post_tag->term_id;
                array_push($all_tags, $tag);
            }
        }
    }
    $all_tags = array_unique($all_tags);
    return $all_tags;
}

add_action( 'after_setup_theme', 'charmer_woocommerce_support' );
if ( ! function_exists( 'charmer_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function charmer_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add New Woocommerce 3.0.0 Product Gallery support.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}

add_action( 'widgets_init', 'contact_page_form_widget' );
function contact_page_form_widget() {
 
    register_sidebar( array(
        'name'          => 'Contact Form Widget',
        'id'            => 'contact-form-widget',
        'before_widget' => '<div class="contact-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<!---',
        'after_title'   => '--->',
    ) );
 
}


add_action('wp_head', 'google_analytics_head', 20);
function google_analytics_head() {
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo GOOGLE_TAG_MANAGER_TRACKING_KEY; ?>');</script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS_TRACKING_KEY; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?php echo GOOGLE_ANALYTICS_TRACKING_KEY; ?>');
    </script>
    <?php
}

add_action('wp_body_open', 'google_tag_manager_body', 20);
function google_tag_manager_body() { ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GOOGLE_TAG_MANAGER_TRACKING_KEY; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}

//checks if tag is in GET and either returns the tag value or returns false;
function the_selected_tag() {
    global $_GET;
    if ( isset($_GET['tag']) ) {
        $tag = $_GET['tag'];
        return $tag;
    } else {
        $tag = null;
        return false;
    }
}


//returns the current selected image info in our image lightbox
function get_current_img($id) {
    $current_img = [];
    $current_img['src'] = wp_get_attachment_image_src($id, 'original')[0];
    $current_img['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);
    return $current_img;
}

function get_order_of_image($images, $id) {
    for($i = 0; $i < count($images); $i++) {
        if($images[$i]->ID == $id) {
            $current_img_order = $i;
            return $current_img_order;
        }
    }
}

function append_tag_to_query($link, $tag) {
    $query = '/?tag=' . $tag;
    $newLink = $link . $query;
    return $newLink;
}

function the_next_image($images, $current_order, $tag = null) {
    if( $current_order < count($images) - 1) {
        $nextImg['image'] = $images[($current_order + 1)];
        $link = get_permalink($nextImg['image']);
        if ($tag) {
            $link .= "?tag=" . $tag;
        }
        $nextImg['link'] = $link;
    } else {
        $nextImg = null;
    }
    return $nextImg;
}

function the_previous_image($images, $current_order, $tag = null) {
        if( $current_order > 0 ) {
            $previousImg['image'] = $images[($current_order - 1)];
            $link = get_permalink($previousImg['image']);
            if ($tag) {
                $link .= "?tag=" . $tag;
            }
            $previousImg['link'] = $link;
        } else {
            $previousImg = null;
        }
    return $previousImg;
}


function setup_lightbox_images($id) {
        $category = get_the_category()[0];
        $the_selected_tag = the_selected_tag();
        $images = get_gallery_images( $category->slug, the_selected_tag() );
        $current_image = get_current_img($id);
        $current_order = get_order_of_image($images, $id);
        $next_image = the_next_image($images, $current_order, $the_selected_tag);
        $previous_image = the_previous_image($images, $current_order, $the_selected_tag);
        $data = ['id' => $id,
              'category' => $category,
              'tags' => get_the_tags(),
              'the_selected_tag' => $the_selected_tag,
              'current_image' => $current_image,
              'next_image' => $next_image,
              'previous_image' => $previous_image
             ];
        return $data;
}
add_filter('filter_images', 'setup_lightbox_images');

//Add bootstrap form control class to product variations in woocommerce.
function add_bootstrap_to_woo_variations( $args ) {
    $args['class'] .= ' form-control';
    return $args;
}
add_filter('woocommerce_dropdown_variation_attribute_options_args', 'add_bootstrap_to_woo_variations');






