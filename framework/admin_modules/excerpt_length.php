<?php
//Function to Trim Excerpt Length & more..
function cleanpress_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'cleanpress_excerpt_length', 999 );

function cleanpress_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'cleanpress_excerpt_more' );