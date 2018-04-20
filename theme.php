<?php 
function add_theme_support( $feature ) {
    global $_wp_theme_features;
 
    if ( func_num_args() == 1 )
        $args = true;
    else
        $args = array_slice( func_get_args(), 1 );
 
    switch ( $feature ) {
        case 'post-thumbnails':
            // All post types are already supported.
            if ( true === get_theme_support( 'post-thumbnails' ) ) {
                return;
            }
 
            /*
             * Merge post types with any that already declared their support
             * for post thumbnails.
             */
            if ( is_array( $args[0] ) && isset( $_wp_theme_features['post-thumbnails'] ) ) {
                $args[0] = array_unique( array_merge( $_wp_theme_features['post-thumbnails'][0], $args[0] ) );
            }
 
            break;
 
        case 'post-formats' :
            if ( is_array( $args[0] ) ) {
                $post_formats = get_post_format_slugs();
                unset( $post_formats['standard'] );
 
                $args[0] = array_intersect( $args[0], array_keys( $post_formats ) );
            }
            break;
 
        case 'html5' :
            // You can't just pass 'html5', you need to pass an array of types.
            if ( empty( $args[0] ) ) {
                // Build an array of types for back-compat.
                $args = array( 0 => array( 'comment-list', 'comment-form', 'search-form' ) );
            } elseif ( ! is_array( $args[0] ) ) {
                _doing_it_wrong( "add_theme_support( 'html5' )", __( 'You need to pass an array of types.' ), '3.6.1' );
                return false;
            }
 
            // Calling 'html5' again merges, rather than overwrites.
            if ( isset( $_wp_theme_features['html5'] ) )
                $args[0] = array_merge( $_wp_theme_features['html5'][0], $args[0] );
            break;
 
        case 'custom-logo':
            if ( ! is_array( $args ) ) {
                $args = array( 0 => array() );
            }
            $defaults = array(
                'width'       => null,
                'height'      => null,
                'flex-width'  => false,
                'flex-height' => false,
                'header-text' => '',
            );
            $args[0] = wp_parse_args( array_intersect_key( $args[0], $defaults ), $defaults );
 
            // Allow full flexibility if no size is specified.
            if ( is_null( $args[0]['width'] ) && is_null( $args[0]['height'] ) ) {
                $args[0]['flex-width']  = true;
                $args[0]['flex-height'] = true;
            }
            break;
 
        case 'custom-header-uploads' :
            return add_theme_support( 'custom-header', array( 'uploads' => true ) );
 
        case 'custom-header' :
            if ( ! is_array( $args ) )
                $args = array( 0 => array() );
 
            $defaults = array(
                'default-image' => '',
                'random-default' => false,
                'width' => 0,
                'height' => 0,
                'flex-height' => false,
                'flex-width' => false,
                'default-text-color' => '',
                'header-text' => true,
                'uploads' => true,
                'wp-head-callback' => '',
                'admin-head-callback' => '',
                'admin-preview-callback' => '',
                'video' => false,
                'video-active-callback' => 'is_front_page',
            );
 
            $jit = isset( $args[0]['__jit'] );
            unset( $args[0]['__jit'] );
 
            // Merge in data from previous add_theme_support() calls.
            // The first value registered wins. (A child theme is set up first.)
            if ( isset( $_wp_theme_features['custom-header'] ) )
                $args[0] = wp_parse_args( $_wp_theme_features['custom-header'][0], $args[0] );
 
            // Load in the defaults at the end, as we need to insure first one wins.
            // This will cause all constants to be defined, as each arg will then be set to the default.
            if ( $jit )
                $args[0] = wp_parse_args( $args[0], $defaults );
 
            // If a constant was defined, use that value. Otherwise, define the constant to ensure
            // the constant is always accurate (and is not defined later,  overriding our value).
            // As stated above, the first value wins.
            // Once we get to wp_loaded (just-in-time), define any constants we haven't already.
            // Constants are lame. Don't reference them. This is just for backward compatibility.
 
            if ( defined( 'NO_HEADER_TEXT' ) )
                $args[0]['header-text'] = ! NO_HEADER_TEXT;
            elseif ( isset( $args[0]['header-text'] ) )
                define( 'NO_HEADER_TEXT', empty( $args[0]['header-text'] ) );
 
            if ( defined( 'HEADER_IMAGE_WIDTH' ) )
                $args[0]['width'] = (int) HEADER_IMAGE_WIDTH;
            elseif ( isset( $args[0]['width'] ) )
                define( 'HEADER_IMAGE_WIDTH', (int) $args[0]['width'] );
 
            if ( defined( 'HEADER_IMAGE_HEIGHT' ) )
                $args[0]['height'] = (int) HEADER_IMAGE_HEIGHT;
            elseif ( isset( $args[0]['height'] ) )
                define( 'HEADER_IMAGE_HEIGHT', (int) $args[0]['height'] );
 
            if ( defined( 'HEADER_TEXTCOLOR' ) )
                $args[0]['default-text-color'] = HEADER_TEXTCOLOR;
            elseif ( isset( $args[0]['default-text-color'] ) )
                define( 'HEADER_TEXTCOLOR', $args[0]['default-text-color'] );
 
            if ( defined( 'HEADER_IMAGE' ) )
                $args[0]['default-image'] = HEADER_IMAGE;
            elseif ( isset( $args[0]['default-image'] ) )
                define( 'HEADER_IMAGE', $args[0]['default-image'] );
 
            if ( $jit && ! empty( $args[0]['default-image'] ) )
                $args[0]['random-default'] = false;
 
            // If headers are supported, and we still don't have a defined width or height,
            // we have implicit flex sizes.
            if ( $jit ) {
                if ( empty( $args[0]['width'] ) && empty( $args[0]['flex-width'] ) )
                    $args[0]['flex-width'] = true;
                if ( empty( $args[0]['height'] ) && empty( $args[0]['flex-height'] ) )
                    $args[0]['flex-height'] = true;
            }
 
            break;
 
        case 'custom-background' :
            if ( ! is_array( $args ) )
                $args = array( 0 => array() );
 
            $defaults = array(
                'default-image'          => '',
                'default-preset'         => 'default',
                'default-position-x'     => 'left',
                'default-position-y'     => 'top',
                'default-size'           => 'auto',
                'default-repeat'         => 'repeat',
                'default-attachment'     => 'scroll',
                'default-color'          => '',
                'wp-head-callback'       => '_custom_background_cb',
                'admin-head-callback'    => '',
                'admin-preview-callback' => '',
            );
 
            $jit = isset( $args[0]['__jit'] );
            unset( $args[0]['__jit'] );
 
            // Merge in data from previous add_theme_support() calls. The first value registered wins.
            if ( isset( $_wp_theme_features['custom-background'] ) )
                $args[0] = wp_parse_args( $_wp_theme_features['custom-background'][0], $args[0] );
 
            if ( $jit )
                $args[0] = wp_parse_args( $args[0], $defaults );
 
            if ( defined( 'BACKGROUND_COLOR' ) )
                $args[0]['default-color'] = BACKGROUND_COLOR;
            elseif ( isset( $args[0]['default-color'] ) || $jit )
                define( 'BACKGROUND_COLOR', $args[0]['default-color'] );
 
            if ( defined( 'BACKGROUND_IMAGE' ) )
                $args[0]['default-image'] = BACKGROUND_IMAGE;
            elseif ( isset( $args[0]['default-image'] ) || $jit )
                define( 'BACKGROUND_IMAGE', $args[0]['default-image'] );
 
            break;
 
        // Ensure that 'title-tag' is accessible in the admin.
        case 'title-tag' :
            // Can be called in functions.php but must happen before wp_loaded, i.e. not in header.php.
            if ( did_action( 'wp_loaded' ) ) {
                /* translators: 1: Theme support 2: hook name */
                _doing_it_wrong( "add_theme_support( 'title-tag' )", sprintf( __( 'Theme support for %1$s should be registered before the %2$s hook.' ),
                    '<code>title-tag</code>', '<code>wp_loaded</code>' ), '4.1.0' );
 
                return false;
            }
    }
 
    $_wp_theme_features[ $feature ] = $args;
}