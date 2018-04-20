<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ) ; ?>/reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ) ; ?>/style.css">

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

<body<?php body_class(); ?>>
    <div class="wrapper">
        <div id="header">
            <nav class="navbar-nav navbar-expand-lg">
                <div class="container">
                    <div id="logo">
                        <h1>Hungry Bytes</h1>
                    </div>
                    <div id="divider">
                        <h1> | </h1>
                    </div>
                    <div class="collapse navbar-collapse" id="menu">
                    <?php wp_nav_menu(); ?>
                        <!-- <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#aboutnav" class="btn">about us <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#projectnav" class="btn">projects</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#servicenav" class="btn">services</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#contactnav" class="btn">contact</a>
                            </li>
                        </ul> 
                    </div>
                    <div id="socials">
                        <ul>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google"></a></li>
                        </ul>-->
                    </div>
                    <div class="clear"></div>

                </div>
            </nav>
        </div>
