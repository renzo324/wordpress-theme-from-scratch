<?php 
/*	
	================================
			ADMIN SETTINGS
	================================
*/
function dungeon_mastery_add_admin_page() {
	
	//Generate Admin Page
	add_menu_page( 'Dungeon Mastery Theme Options', 'Dungeon Mastery', 'manage_options', 'dungeon_mastery', 'dungeon_mastery_theme_create_page', get_template_directory_uri() . '/img/dungeon-mastery-icon.png', 110 );
	
	//Generate Sub Pages
	add_submenu_page( 'dungeon_mastery', 'Dungeon Mastery Sidebar Options', 'Sidebar', 'manage_options', 'dungeon_mastery', 'dungeon_mastery_theme_create_page' );
	add_submenu_page( 'dungeon_mastery', 'Dungeon Mastery Theme Options', 'Theme Options', 'manage_options', 'dungeon_mastery_theme', 'dungeon_mastery_theme_support_page' );
	add_submenu_page( 'dungeon_mastery', 'Dungeon Mastery Contact Form', 'Contact Form', 'manage_options', 'dungeon_mastery_theme_contact', 'dungeon_mastery_contact_form_page' );
	add_submenu_page( 'dungeon_mastery', 'Dungeon Mastery CSS Options', 'Custom CSS', 'manage_options', 'dungeon_mastery_css', 'dungeon_mastery_theme_settings_page');
	
}
add_action( 'admin_menu', 'dungeon_mastery_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'dungeon_mastery_custom_settings' );


function dungeon_mastery_custom_settings() {
	//Sidebar Options
	register_setting( 'dungeon-mastery-settings-group', 'profile_picture' );
	register_setting( 'dungeon-mastery-settings-group', 'first_name' );
	register_setting( 'dungeon-mastery-settings-group', 'last_name' );
	register_setting( 'dungeon-mastery-settings-group', 'user_description' );
	register_setting( 'dungeon-mastery-settings-group', 'twitter_handler', 'dungeon_mastery_sanitize_twitter_handler' );
	register_setting( 'dungeon-mastery-settings-group', 'facebook_handler' );
	register_setting( 'dungeon-mastery-settings-group', 'gplus_handler' );
	
	add_settings_section( 'dungeon-mastery-sidebar-options', 'Sidebar Option', 'dungeon_mastery_sidebar_options', 'dungeon_mastery');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'dungeon_mastery_sidebar_profile', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'dungeon_mastery_sidebar_name', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'dungeon_mastery_sidebar_description', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'dungeon_mastery_sidebar_twitter', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'dungeon_mastery_sidebar_facebook', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google+ handler', 'dungeon_mastery_sidebar_gplus', 'dungeon_mastery', 'dungeon-mastery-sidebar-options');
	
	//Theme Support Options
	register_setting( 'dungeon-mastery-theme-support', 'post_formats' );
	register_setting( 'dungeon-mastery-theme-support', 'custom_header' );
	register_setting( 'dungeon-mastery-theme-support', 'custom_background' );
	
	add_settings_section( 'dungeon-mastery-theme-options', 'Theme Options', 'dungeon_mastery_theme_options', 'dungeon_mastery_theme' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'dungeon_mastery_post_formats', 'dungeon_mastery_theme', 'dungeon-mastery-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'dungeon_mastery_custom_header', 'dungeon_mastery_theme', 'dungeon-mastery-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'dungeon_mastery_custom_background', 'dungeon_mastery_theme', 'dungeon-mastery-theme-options' );
	
	//Contact Form Options
	register_setting( 'dungeon-mastery-contact-options', 'activate_contact' );
	
	add_settings_section( 'dungeon-mastery-contact-section', 'Contact Form', 'dungeon_mastery_contact_section', 'dungeon_mastery_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'dungeon_mastery_activate_contact', 'dungeon_mastery_theme_contact', 'dungeon-mastery-contact-section' );
	
	//Custom CSS Options
	register_setting( 'dungeon-mastery-custom-css-options', 'dungeon_mastery_css', 'dungeon_mastery_sanitize_custom_css' );
	
	add_settings_section( 'dungeon-mastery-custom-css-section', 'Custom CSS', 'dungeon_mastery_custom_css_section_callback', 'dungeon_mastery_css' );
	
	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'dungeon_mastery_custom_css_callback', 'dungeon_mastery_css', 'dungeon-mastery-custom-css-section' );
	
}

// Misc stuff
function dungeon_mastery_custom_css_section_callback() {
	echo 'Customize Theme with your own CSS';
}

function dungeon_mastery_custom_css_callback() {
	$css = get_option( 'dungeon_mastery_css' );
	$css = ( empty($css) ? '/*  Theme Custom CSS */' : $css );
	echo '<div id="customCss">'.$css.'</div><textarea id="dungeon_mastery_css" name="dungeon_mastery_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

function dungeon_mastery_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function dungeon_mastery_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function dungeon_mastery_activate_contact() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}

function dungeon_mastery_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function dungeon_mastery_custom_header() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function dungeon_mastery_custom_background() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

// Sidebar Options Functions
function dungeon_mastery_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

function dungeon_mastery_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><span class="dungeon-mastery-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><span class="dungeon-mastery-icon-button dashicons-before dashicons-format-image"></span> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="dungeon-mastery-icon-button dashicons-before dashicons-no"></span> Remove</button>';
	}
	
}
function dungeon_mastery_sidebar_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}
function dungeon_mastery_sidebar_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}
function dungeon_mastery_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function dungeon_mastery_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function dungeon_mastery_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function dungeon_mastery_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function dungeon_mastery_sanitize_custom_css( $input ){
	$output = esc_textarea( $input );
	return $output;
}

//Template submenu functions
function dungeon_mastery_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/dungeon-mastery-admin.php' );
}

function dungeon_mastery_theme_support_page() {
	require_once( get_template_directory() . '/inc/templates/dungeon-mastery-theme-support.php' );
}

function dungeon_mastery_contact_form_page() {
	require_once( get_template_directory() . '/inc/templates/dungeon-mastery-contact-form.php' );
}

function dungeon_mastery_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/dungeon-mastery-custom-css.php' );
}
/*	
	================================
		ENQUEUE STYLES AND SCRIPTS
	================================
*/

function dungeon_mastery_enqueue_scripts(){
	//register css
	wp_register_style('reset', get_template_directory_uri().'/css/reset.css', false,'1.0','all');
	wp_enqueue_style('reset', get_template_directory_uri().'/css/reset.css', false,'1.0','all');
	wp_register_style('font' ,'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
	wp_enqueue_style('font' ,'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
	wp_register_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_script( 'popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
	wp_register_script('theme_scripts', get_template_directory_uri().'/js/dungeon_mastery.js');
	wp_enqueue_script('theme_scripts', get_template_directory_uri().'/js/dungeon_mastery.js');
}
add_action('wp_enqueue_scripts', 'dungeon_mastery_enqueue_scripts');

/*	
	========================
	  THEME SUPPORT OPTIONS
	========================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}

/*
	========================
	  Redirect Users
	========================

add_action( 'template_redirect', function(){

    // no non-authenticated users allowed
    if( ! is_user_logged_in() )
    {
        wp_redirect( home_url( '/wp-login.php' ), 302 );
        exit();
    }
});

*/