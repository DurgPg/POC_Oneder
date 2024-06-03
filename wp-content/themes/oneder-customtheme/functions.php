<?php

function oneder_setup()
{
	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'oneder'),
	));
}
add_action('after_setup_theme', 'oneder_setup');

function oneder_scripts()
{
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('oneder-style', get_template_directory_uri() . "/style.css", array('oneder-bootstrap'), $version, "all");
	wp_enqueue_style('oneder-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', "all");
	wp_enqueue_script('oneder-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);

	wp_enqueue_style('oneder-style', get_template_directory_uri() . "/style.css", array('oneder-bootstrap'), $version, "all");
	wp_enqueue_style('oneder-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', "all");
	wp_enqueue_style('font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
	wp_enqueue_style('onder-font', "https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap");
	wp_enqueue_script('oneder-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "3.4.1", true);
	wp_enqueue_script('oneder-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'oneder_scripts');



if (!function_exists('fa_custom_setup_kit')) {
   function fa_custom_setup_kit($kit_url = '')
   {
	   foreach (['wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts'] as $action) {
		   add_action(
			   $action,
			   function () use ($kit_url) {
				   wp_enqueue_script('font-awesome-kit', $kit_url, [], null);
			   }
		   );
	   }
   }
}

fa_custom_setup_kit('https://kit.fontawesome.com/213eadb7f3.js');


function oneder_customizer_settings($wp_customize)
{
	$wp_customize->add_section('oneder_customizer_section', array(
		'title' => __('Oneder Settings', 'oneder'),
		'priority' => 30,
	));

	$wp_customize->add_setting('hero_background_image');
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
		'label' => __('Hero Background Image', 'oneder'),
		'section' => 'oneder_customizer_section',
		'settings' => 'hero_background_image',
	)));

	$wp_customize->add_setting('hero_text');
	$wp_customize->add_control('hero_text', array(
		'label' => __('Hero Text', 'oneder'),
		'section' => 'oneder_customizer_section',
		'settings' => 'hero_text',
		'type' => 'text',
	));

	$wp_customize->add_setting('show_get_in_touch_button');
	$wp_customize->add_control('show_get_in_touch_button', array(
		'label' => __('Show Get In Touch Button', 'oneder'),
		'section' => 'oneder_customizer_section',
		'type' => 'checkbox',
	));

	$wp_customize->add_setting('about_title', array(
		'default' => __('About Oneder', 'oneder'),
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('about_title', array(
		'label' => __('About Section Title', 'oneder'),
		'section' => 'oneder_customizer_section',
		'type' => 'text',
	));

	$wp_customize->add_setting('about_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
		'label' => __('About Section Image', 'oneder'),
		'section' => 'oneder_customizer_section',
		'settings' => 'about_image',
	)));

	$wp_customize->add_setting(
		'about_text',
		array(
			'default' => __('Your customizable about section text goes here.', 'oneder'),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control('about_text', array(
		'label' => __('About Section Text', 'oneder'),
		'section' => 'oneder_customizer_section',
		'type' => 'textarea',
	));

	$wp_customize->add_setting('about_button_text', array(
		'default' => __('Get In Touch', 'oneder'),
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('about_button_text', array(
		'label' => __('Button Text', 'oneder'),
		'section' => 'oneder_customizer_section',
		'type' => 'text',
	));
}
add_action('customize_register', 'oneder_customizer_settings');


///////////////////////////////////////////////////////////////
function oneder_register_custom_post_types()
{
	// Team Member Custom Post Type
	register_post_type('team_member', array(
		'labels' => array(
			'name' => __('Team Members', 'oneder'),
			'singular_name' => __('Team Member', 'oneder'),
			'menu_name'          => _x('Team', 'admin menu', 'oneder'),
			'name_admin_bar'     => _x('Team Member', 'add new on admin bar', 'oneder'),
			'add_new'            => _x('Add New', 'team member', 'oneder'),
			'add_new_item'       => __('Add New Team Member', 'oneder'),
			'new_item'           => __('New Team Member', 'oneder'),
			'edit_item'          => __('Edit Team Member', 'oneder'),
			'view_item'          => __('View Team Member', 'oneder'),
			'all_items'          => __('All Team Members', 'oneder'),
			'search_items'       => __('Search Team Members', 'oneder'),
			'parent_item_colon'  => __('Parent Team Members:', 'oneder'),
			'not_found'          => __('No team members found.', 'oneder'),
			'not_found_in_trash' => __('No team members found in Trash.', 'oneder')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-hammer',
		'rewrite' => array('slug' => 'team'),
	));

	register_post_type('services', array(
		'labels' => array(
			'name' => __('Services', 'oneder'),
			'singular_name' => __('Service', 'oneder'),
			'menu_name'          => _x('Services', 'admin menu', 'oneder'),
			'name_admin_bar'     => _x('Service', 'add new on admin bar', 'oneder'),
			'add_new'            => _x('Add New', 'team member', 'oneder'),
			'add_new_item'       => __('Add New Service', 'oneder'),
			'new_item'           => __('New Service', 'oneder'),
			'edit_item'          => __('Edit Service', 'oneder'),
			'view_item'          => __('View Service', 'oneder'),
			'all_items'          => __('All Services', 'oneder'),
			'search_items'       => __('Search Services', 'oneder'),
			'parent_item_colon'  => __('Parent Service:', 'oneder'),
			'not_found'          => __('No service found.', 'oneder'),
			'not_found_in_trash' => __('No service found in Trash.', 'oneder')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor'),
		'rewrite' => array('slug' => 'services'),
	));

	// Portfolio Custom Post Type
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => __('Portfolios', 'oneder'),
			'singular_name' => __('Portfolio', 'oneder'),
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'rewrite' => array('slug' => 'portfolio'),
	));

	$labels_type = array(
		'name' => __('Portfolio Types', 'oneder'),
		'singular_name' => __('Portfolio Type', 'oneder'),
		'search_items' => __('Search'),
		'popular_items' => __('More Used'),
		'all_items' => __('All Types'),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __('Add new'),
		'update_item' => __('Update'),
		'add_new_item' => __('Add new CategoryType'),
		'new_item_name' => __('New')
	);
	// Portfolio Taxonomy
	register_taxonomy('portfolio_type', array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels_type,
		'singular_label' => 'projects_category',
		'all_items' => 'Type',
		'query_var' => true,
		'rewrite' => array('slug' => 'portfolio_type'),
		'public' => true,
	));
}
add_action('init', 'oneder_register_custom_post_types');

function oneder_add_meta_boxes()
{
	add_meta_box(
		'team_member_status_meta_box',
		__('Team Member Status', 'oneder'),
		'oneder_team_member_status_meta_box_callback',
		'team_member'
	);
	add_meta_box(
		'services_icon',
		__('Service Icon', 'oneder'),
		'render_services_icon_metabox',
		'services',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'oneder_add_meta_boxes');


function render_services_icon_metabox($post) {
    // Retrieve current icon meta data
    $service_icon = get_post_meta($post->ID, '_service_icon', true);
    ?>
    <label for="service_icon"><?php _e('Icon Class (Font Awesome)', 'oneder'); ?></label>
    <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>" placeholder="e.g., fa-solid fa-hammer" style="width:100%;">
    <?php
}
 
function save_services_icon_metabox($post_id) {
    if (array_key_exists('service_icon', $_POST)) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
}
add_action('save_post', 'save_services_icon_metabox');

function add_services_columns($columns) {
    return array_merge($columns, array('service_icon' => __('Icon')));
}
add_filter('manage_services_posts_columns', 'add_services_columns');
 
function display_services_columns($column, $post_id) {
    if ($column == 'service_icon') {
        $service_icon = get_post_meta($post_id, '_service_icon', true);
        if ($service_icon) {
            echo '<i class="' . esc_attr($service_icon) . '"></i>';
        }
    }
}
add_action('manage_services_posts_custom_column', 'display_services_columns', 10, 2);
 
function add_services_columns_css() {
    echo '<style>.column-service_icon { width: 60px; }</style>';
}
add_action('admin_head', 'add_services_columns_css');


// Meta box callback function for team member status
function oneder_team_member_status_meta_box_callback($post)
{
	$value = get_post_meta($post->ID, '_team_member_status', true);
?>
	<label for="team_member_status"><?php _e('Status', 'oneder'); ?></label>
	<select name="team_member_status" id="team_member_status">
		<option value="inactive" <?php selected($value, 'inactive'); ?>><?php _e('Inactive', 'oneder'); ?></option>
		<option value="active" <?php selected($value, 'active'); ?>><?php _e('Active', 'oneder'); ?></option>
	</select>
<?php
}

// Save the meta box data
function oneder_save_team_member_status($post_id)
{
	if (array_key_exists('team_member_status', $_POST)) {
		update_post_meta(
			$post_id,
			'_team_member_status',
			$_POST['team_member_status']
		);
	}
}
add_action('save_post', 'oneder_save_team_member_status');

// Function to register scripts and styles for the theme
// function oneder_register_scripts_and_styles()
// {
// 	wp_enqueue_style('oneder-style', get_stylesheet_uri());
// 	wp_enqueue_script('oneder-main', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
// }
// add_action('wp_enqueue_scripts', 'oneder_register_scripts_and_styles');

// Customize the excerpt length
function oneder_custom_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'oneder_custom_excerpt_length');

// Register widget areas
function oneder_widgets_init()
{
	register_sidebar(array(
		'name' => __('Sidebar', 'oneder'),
		'id' => 'sidebar-1',
		'description' => __('Add widgets here to appear in your sidebar.', 'oneder'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'oneder_widgets_init');

// Register menu locations
function oneder_menus()
{
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'oneder'),
	));
}
add_action('after_setup_theme', 'oneder_menus');


// ****************************** CONTACT US *******************************************//

function handle_contact_form_submission() {
    if( isset($_POST['action']) && $_POST['action'] === 'submit_contact_form' ) {
        $name = sanitize_text_field( $_POST['name'] );
        $email = sanitize_email( $_POST['email'] );
        $message = sanitize_textarea_field( $_POST['message'] );
        $adminEmail = get_option( 'admin_email' );

        // Here, you can add your code to process the form data (e.g., send an email).
        wp_mail($adminEmail, sprintf("New message from %s email:%s", $name, $email), $message);

        // Redirect the user back to the main or contact page after form submission.
        wp_redirect( home_url('/') );
    }
}

add_action( 'admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission' );
add_action( 'admin_post_submit_contact_form', 'handle_contact_form_submission' );



// ****************************** FOOTER WIDGETS  *******************************************//

/**
 * Footer Widget One
 */

 function custom_footer_widget_one() {
	$args = array(
		'id'			=> 'footer-widget-col-one',
		'name' 		 	=> __('Footer Column One', 'text_domain'),
		'description'	=> __('Column One','text-domain'),
		'before_title'	=> '<h5 class="title">',
		'after_title'	=> '</h5>',
		'before_widget' => '<div id="%1$s" class = "widget %2$s">',
		'after_widget'  => '</div>'


	);
	register_sidebar($args); 
}

 add_action('widgets_init', 'custom_footer_widget_one');

 /**
 * Footer Widget Two
 */

 function custom_footer_widget_two() {
	$args = array(
		'id'			=> 'footer-widget-col-two',
		'name' 		 	=> __('Footer Column Two', 'text_domain'),
		'description'	=> __('Column One','text-domain'),
		'before_title'	=> '<h5 class="title">',
		'after_title'	=> '</h5>',
		'before_widget' => '<div id="%1$s" class = "widget %2$s">',
		'after_widget'  => '</div>'


	);
	register_sidebar($args); 
}

add_action('widgets_init', 'custom_footer_widget_two');


/**
 * Footer Widget Three
 */

function custom_footer_widget_three() {
	$args = array(
		'id'			=> 'footer-widget-col-three',
		'name' 		 	=> __('Footer Column Three', 'text_domain'),
		'description'	=> __('Column One','text-domain'),
		'before_title'	=> '<h3 class="title">',
		'after_title'	=> '</h3>',
		'before_widget' => '<div id="%1$s" class = "widget %2$s">',
		'after_widget'  => '</div>'


	);
	register_sidebar($args); 
}

 add_action('widgets_init', 'custom_footer_widget_three');


 /**
 * Footer Widget Four
 */

function custom_footer_widget_four() {
	$args = array(
		'id'			=> 'footer-widget-col-four',
		'name' 		 	=> __('Footer Column Four', 'text_domain'),
		'description'	=> __('Column One','text-domain'),
		'before_title'	=> '<class="title">',
		'after_title'	=> '',
		'before_widget' => '<div id="%1$s" class = "widget %2$s">',
		'after_widget'  => '</div>'


	);
	register_sidebar($args); 
}

 add_action('widgets_init', 'custom_footer_widget_four');

?>


