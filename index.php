<?php
get_header();
?>
<div class="container">

<?php
if ( is_user_logged_in() ){
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
}else{

    // WP_Query arguments
    $args = array(
        'p'                      => '1',
        'order'                  => 'ASC',
        'orderby'                => 'id',
    );

    // The Query
    $fallBackLoop = new WP_Query($args);
    if($fallBackLoop -> have_posts()){
        $fallBackLoop ->the_post();
        $output = '<hr><h2>'.get_the_title().'</h2><hr>';
        $output .= get_the_post_thumbnail();
        $output .= get_the_content();
		echo $output;   
    }
    echo '
    <div class="modal fade" id="landingPopUp" tabindex="-1" role="dialog" aria-labelledby="landingPopUpTitle" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="landingPopUpTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> ';
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