<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    
    <?php add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}
?>
    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <div id="header">
            <nav class="navbar-nav navbar-expand-lg">
                <div class="container">
                    <div id="logo">
                        <h1>Dungeon Mastery</h1>
                    </div>
                    <div id="divider">
                        <h1> | </h1>
                    </div>
                    <div class="collapse navbar-collapse" id="menu">
                    <?php wp_nav_menu(); ?>
                       
                    </div>
                    <div class="clear"></div>

                </div>
            </nav>
        </div>
</div>
