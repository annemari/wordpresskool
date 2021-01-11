<?php
/*
Plugin Name: Minu Esimene Plugin
Plugin URI: https://eensaarannemari.ikt.khk.ee/wordpress/
Description: Minu esimene WordPressi Plugin
Author: Anne-Mari Eensaar
Author URI: https://eensaarannemari.ikt.khk.ee/wordpress/
Version: 1.0
*/

function mfwp_add_content($content) {
 
	if(is_single()) {
		$extra_content = 'Aitäh lugemast!';
		$content .= $extra_content;
	}
	return $content;
}
add_filter('the_content', 'mfwp_add_content');

