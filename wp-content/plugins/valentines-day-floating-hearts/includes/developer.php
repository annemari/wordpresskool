<?php
add_filter( 'plugin_row_meta', 'dc_action_links', 10, 2 );


/**
 * Show action links on the plugin screen
 */
function dc_action_links( $links, $file ) {
	if ( $file == DC_PLUGIN_BASENAME ) {
		$row_meta =  array(
			'<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CSAFBFPC4FSL8">Donate</a>',
		);
		
	return array_merge( $links, $row_meta );
	}
	
	return (array) $links;
}