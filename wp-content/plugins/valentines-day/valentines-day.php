<?php

/*
Plugin Name: Valentine's Day
Description: Display falling hearts and tunes on Saint Valentine's Day to express love with you website.
Plugin URI: http://www.svnlabs.com
Author: Sandeep Verma
Author URI: http://www.svnlabs.com
Version: 1.0
*/

//if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }

function valentines_day() {
	if (!is_admin()) {
		wp_enqueue_script('valentines-day', WP_PLUGIN_URL . '/valentines-day/' . 'valentines-day.js', false, '1.41');
	}
}

add_action('init', 'valentines_day', 10);

?>