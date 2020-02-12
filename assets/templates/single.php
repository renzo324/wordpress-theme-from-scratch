<?php
if( ! defined ('ABSPATH') ){
    exit; //exit if accessed directly
}
?>
<?php 
while(have_post() ) : the_post();
?>

<main <?php post_class('site-main');?> role="main"> </main>
<?php endwhile;