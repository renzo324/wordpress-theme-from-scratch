 <?php add_theme_support( $feature ); ?>
<?php get_header(); ?>
<div class="container">

<?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            // the_title();
            the_content();
        endwhile; // end while
    endif; // end if
?>
<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
   <!-- Post stuff -->
</div>
    <?php get_footer(); ?>
