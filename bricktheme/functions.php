<?php

function add_favicon() {
	//echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/favicon.ico" />';
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/images/Blue.png" />';
}
 
add_action('wp_head', 'add_favicon');

/* ----------------------------------------------------- */

function bricktheme_register_sidebars() {

register_sidebar( array(
    'name'          => esc_html__( 'Footer Section One', 'bricktheme' ),
    'id'            => 'footer-section-one',
    'description'   => esc_html__( 'Widgets added here would appear inside the first section of the footer', 'bricktheme' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
) );

register_sidebar( array(
    'name'          => esc_html__( 'Blog', 'bricktheme' ),
    'id'            => 'blog',
    'description'   => esc_html__( 'Widgets added here would appear inside the all the blog pages', 'bricktheme' ),
    'before_widget' => '',
	'after_widget' => '',
    'before_title'  => '',
	'after_title' => '',
) );

}

add_action( 'widgets_init', 'bricktheme_register_sidebars' );	


function bricktheme_enqueue_styles() {
    wp_enqueue_style( 		
        'normalize',	
        get_stylesheet_directory_uri() . '/css/normalize.css', 	
        array(), 		
        false, 		
        'all' 
    );
    wp_enqueue_style( 		
        'bootstrap',	
        get_stylesheet_directory_uri() . '/css/bootstrap.min.css', 	
        array(), 		
        false, 		
        'all' 
    );
    wp_enqueue_style( 		
        'superfish',	
        get_stylesheet_directory_uri() . '/css/superfish.css', 	
        array(), 		
        false, 		
        'all' 
    );
	wp_enqueue_style( 		
        'brickstyle',	
        get_stylesheet_directory_uri() . '/css/brickstyle.css', 	
        array('normalize', 'bootstrap'), 		
        "2.0", 		
        'all' 
    );
	
	wp_enqueue_style(       
    'EVA35-font',  
	get_stylesheet_directory_uri() . '/fonts/EVA35Regular.otf', 		
    array(),        
    false,
	);
	
    wp_enqueue_style( 		
        'main-stylesheet',	
        get_stylesheet_uri(), 	
        array('normalize', 'bootstrap'), 		
        "2.0", 		
        'all' 
    );
}
add_action( 'wp_enqueue_scripts', 'bricktheme_enqueue_styles' );

function bricktheme_enqueue_scripts() {
    wp_enqueue_script( 
        'modernizr', 
        get_stylesheet_directory_uri() . '/js/modernizr.min.js', 
        array(), 
        '1.0.0', 
        false 
    );
    wp_enqueue_script( 
        'superfish', 
        get_stylesheet_directory_uri() . '/js/superfish.min.js', 
        array('jquery'), 
        '1.0.0', 
        true 
    );
    wp_enqueue_script( 
        'main-js', 
        get_stylesheet_directory_uri() . '/js/main.js', 
        array('jquery'), 
        '1.0.0', 
        true 
    );
	
    $translation_array = array(
        "email_placeholder" => esc_attr__( 'Enter your email address here', 'bricktheme' ),
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    wp_localize_script( 'main-js', 'translated_text_object', $translation_array );  
}
add_action( 'wp_enqueue_scripts', 'bricktheme_enqueue_scripts' );

function bricktheme_theme_setup() {
	/*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    */
    load_theme_textdomain( 'bricktheme', get_stylesheet_directory() . '/languages' );

    // Add <title> tag support
    add_theme_support( 'title-tag' );  

    // Add custom-logo support
    add_theme_support( 'custom-logo' );
	
	// Add widgets support
    add_theme_support( 'widgets' );

    // Add Featured Image support
    add_theme_support( 'post-thumbnails' );
    
    // Register Navigation Menus
    register_nav_menus( array( 
		'header'   => esc_html__('Display this menu in Header', 'bricktheme'),
		'footer'   => esc_html__('Display this menu in Footer', 'bricktheme'),
	));

	// Create Login page
	$login_exists = get_page_by_path('login', OBJECT, 'page');
        if (!$login_exists) {            
            $loginpage = array(
                'post_type' => 'page',
                'post_title' => 'Login',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $loginpage_id = wp_insert_post($loginpage);
        }
		
	// Create Register page
    $register_exists = get_page_by_path('register', OBJECT, 'page');
        if (!$register_exists) {            
            $registerpage = array(
                'post_type' => 'page',
                'post_title' => 'Register',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $registerpage_id = wp_insert_post($registerpage);
        }
		
	// Create Profile page
    $profile_exists = get_page_by_path('profile', OBJECT, 'page');
        if (!$profile_exists) {
            // Create profile
            $profilepage = array(
                'post_type' => 'page',
                'post_title' => 'Profile',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $profilepage_id = wp_insert_post($profilepage);
        }
}
add_action( 'after_setup_theme', 'bricktheme_theme_setup');


/**
 * Register Custom Post Types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function bricktheme_register_custom_post_types(){
    //Register Reviews Post Type
    register_post_type( 'job_sets',
        array(
            'labels'  => array(
                'name'           => __( 'JustOneBrick Sets', 'bricktheme' ),
                'singular_name'  => __( 'JustOneBrick Set', 'bricktheme' ),
                'add_new'        => __( 'Add Set', 'bricktheme' ),
                'add_new_item'   => __( 'Add New Set', 'bricktheme' ),
                'edit_item'      => __( 'Edit Set', 'bricktheme' ),
                'all_items'      => __( 'All Sets', 'bricktheme' ),
                'not_found'      => __( 'No Sets Found', 'bricktheme' ),
            ),
            'menu_icon'             => 'dashicons-chart-pie',
            'public'                => true,            
            'has_archive'           => true,
            'hierarchical'          => false,
            'show_in_rest'          => true,
            'rewrite'               => array( 'slug' => 'job_sets' ),
            'supports'              => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'excerpt', 'revisions', 'comments', 'page-attributes' ),
            'taxonomies'        	=> array( 'brick_theme')
        )
    );
}
 
add_action('init', 'bricktheme_register_custom_post_types');

function meta_box_for_brick_sets($post)
{
    add_meta_box('brick_meta_box_custom_id', __('Additional info', 'textdomain'), 'custom_fileds_for_brick_sets', 'job_sets', 'normal', 'low');
}

function custom_fileds_for_brick_sets($post)
{
    wp_nonce_field(basename(__FILE__), 'brick_custom_meta_box_nonce'); //used later for security
    echo '<p><label for="brick_set_number">' . __('Brick set number:', 'textdomain') . '</label>
        <input type="text" name="brick_set_number" value="' . get_post_meta($post->ID, 'brick_set_number', true) . '"/></p>';
    echo '<p><label for="brick_set_year">' . __('Brick set year:', 'textdomain') . '</label> <input type="text" name="brick_set_year" value="' . get_post_meta($post->ID, 'brick_set_year', true) . '"/></p>';
}

add_action('save_post_brick_sets', 'brick_sets_save_meta_boxes_data', 10, 2);

function brick_sets_save_meta_boxes_data($post_id)
{ // check for nonce to top xss
    if (!isset($_POST['brick_custom_meta_box_nonce']) || !wp_verify_nonce($_POST['brick_custom_meta_box_nonce'], basename(__FILE__))) {
        return;
    } // check for correct user capabilities - stop internal xss from customers
    if (!current_user_can('edit_post', $post_id)) {
        return;
    } // update fields
    if (isset($_REQUEST['brick_set_number'])) {
        update_post_meta($post_id, 'brick_set_number', sanitize_text_field($_POST['brick_set_number']));
    }
    if (isset($_REQUEST['brick_set_year'])) {
        update_post_meta($post_id, 'brick_set_year', sanitize_text_field($_POST['brick_set_year']));
    }
}

function wpdocs_create_theme_tax_rewrite()
{
    $labels = array(
        'name' => _x('Themes', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Theme', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Themes', 'textdomain'),
        'all_items' => __('All Themes', 'textdomain'),
        'parent_item' => __('Parent Themes', 'textdomain'),
        'parent_item_colon' => __('Parent Theme:', 'textdomain'),
        'edit_item' => __('Edit Theme', 'textdomain'),
        'update_item' => __('Update Theme', 'textdomain'),
        'add_new_item' => __('Add New Theme', 'textdomain'),
        'new_item_name' => __('New Theme Name', 'textdomain'),
        'menu_name' => __('Lego Themes', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'bricksets/theme')
    );
    register_taxonomy('brick_theme', array('job_sets'), $args);
}
add_action('init', 'wpdocs_create_theme_tax_rewrite', 0);

// Fix for bootstrap 5 dropdown menu items

add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
    if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
        if (array_key_exists('data-toggle', $atts)) {
            unset($atts['data-toggle']);
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

add_filter('wp_nav_menu_items', 'add_login_links', 10, 2);
function add_login_links($items, $args)
{
    /**
     * If menu primary menu is set & user is logged in.
     */
    if (is_user_logged_in() && $args->theme_location == 'header') {
        $current_user = wp_get_current_user();
        $items .= '<li><span class="nav-sep">|</span></li>';
        $items .= '<li><a href="' . esc_url(home_url('/')) . 'profile" class="d-flex align-items-center"> 
        <div class="ratio ratio-1x1 overflow-hidden nav-profile-img">
          ' . get_avatar(get_current_user_id(), 30) . '
        </div>
        <span class="mx-3">' . $current_user->display_name . '</span>
        </a></li>';
    }
    /**
     * Else display login menu item.
     */elseif (!is_user_logged_in() && $args->theme_location == 'header') {
        $items .= '<li><span class="nav-sep">|</span></li>';
        $items .= '<li><a href="' . esc_url(home_url('/')) . 'login">Log In</a></li>';
        $items .= '<li><a href="' . esc_url(home_url('/')) . 'register">Register</a></li>';
    }
    return $items;
}
?>