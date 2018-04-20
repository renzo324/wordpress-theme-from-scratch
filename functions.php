<?php

// Register Navigation Menus
function nav1() {

	$locations = array(
		'main-menu' => __( '', 'theme_text_domain' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'nav1' );

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

function wpse_284352_author_link( $author_link, $author ) {
    return $author;
}
add_filter( 'get_comment_author_link', 'wpse_284352_author_link', 10, 2 );

add_filter( 'get_comment_author_url', '__return_empty_string' );
wp_list_comments( $args );
wp_link_pages( $args );
function category_id_class( $classes ) {
	global $post;
	foreach ( ( get_the_category( $post->ID ) ) as $category ) {
		$classes[] = $category->category_nicename;
	}
	return $classes;
}
add_filter( 'post_class', 'category_id_class' );
add_filter( 'body_class', 'category_id_class' );
comment_form( $args, $post_id );
comments_template( $file, $separate_comments );
body_class( $class );


$args = array(
	'name'          => __( 'Footer Widgets 1', 'theme_text_domain' ),
	'id'            => 'footer-widgets-1',    // ID should be LOWERCASE  ! ! !
	'description'   => 'This goes under (first column)',
        'class'         => '',
	'before_widget' => '<div id="%1$s" class="col-lg-3 widget %2$s"><div id="f1left">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2 class="widgettitle" style="display:none">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args );
$args = array(
	'name'          => __( 'Footer Widgets 2', 'theme_text_domain' ),
	'id'            => 'footer-widgets-2',    // ID should be LOWERCASE  ! ! !
	'description'   => 'This goes under (mid col)',
        'class'         => '',
	'before_widget' => '<div id="%1$s" class="col-lg-6 widget %2$s"><div id="f1mid">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2 class="widgettitle" style="display:none">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args );
$args = array(
	'name'          => __( 'Footer Widgets 3', 'theme_text_domain' ),
	'id'            => 'footer-widgets-3',    // ID should be LOWERCASE  ! ! !
	'description'   => 'This goes under (last column)',
        'class'         => '',
	'before_widget' => '<div id="%1$s" class="col-lg-3 widget %2$s"><div id="f1right">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2 class="widgettitle" style="display:none">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args );



?>