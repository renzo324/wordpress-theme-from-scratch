<?php
get_header();
?>
<div class="container">

<?php
$current_user= wp_get_current_user();
$args= array('author_name' => $current_user->user_nicename);
//Query
$loop = new WP_Query($args);
// $loop = new WP_Query();
if ($loop -> have_posts()) {
    while ($loop -> have_posts()){
        $loop->the_post();
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $output = '<hr><h2>'.get_the_title().'</h2><hr>';
        $output .= get_the_post_thumbnail();
        $output .= get_the_content();
		echo $output;
};
} else {
    echo '<hr><h2>Wrong!</h2><hr>
        <p>'.wp_get_current_user().'
        <a href="' . get_bloginfo('url') . '">Click here to go to homepage</a>
        </p>';
    /* to comply */
    echo '<div id="post-' . get_the_ID() . '" ' . post_class() . '></div>';
    if (is_singular())
        wp_enqueue_script("comment-reply");
    comment_form();
    wp_list_comments('');
    paginate_comments_links();
    wp_link_pages('');
    paginate_links();
    comments_template($file, $separate_comments);
    the_tags();
}

?>

</div>

<div <?php post_class();
?> id="post-<?php
the_ID();
?>">
   <!-- Post stuff -->
</div>

<?php get_footer(); ?>