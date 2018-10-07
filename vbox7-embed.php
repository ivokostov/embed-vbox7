<?php
/*
Plugin Name: Vbox7 embed support 
Description: Директно вграждане на клипове от vbox7.com
Version: 1.1
Author: Xhats.com
Author URI: https://xhats.com/
*/

add_action( 'init', function()
{
    wp_embed_register_handler(
        'vbox7',
        '#https://www\.vbox7\.com/play\:([a-zA-Z0-9_-]+)$#i',
        'vbox7_embed_handler'
    );
} );

function vbox7_embed_handler( $matches, $attr, $url, $rawattr ) {

  $embed = sprintf(
		'<iframe
		 width="560" height="315" src="https://www.vbox7.com/emb/external.php?vid=%1$s"
		 frameborder="0" scrolling="no" marginwidth="0" marginheight="0" allowfullscreen></iframe>',
     esc_attr( $matches[1] )
 );

	return apply_filters( 'embed_vbox7', $embed, $matches, $attr, $url, $rawattr );
}
