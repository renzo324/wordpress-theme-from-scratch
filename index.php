<?php

if( ! defined ('ABSPATH') ){
    exit; //exit if accessed directly
}

get_header();

$DM_where_are_we = function_exists('DM_gives_location');


if(is_singular() ){
    if (!$DM_where_are_we || DM_gives_location('single')){
        get_template_part('assets/templates/single');
    }
}
get_footer();