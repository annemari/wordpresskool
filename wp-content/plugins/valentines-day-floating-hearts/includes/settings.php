<?php
function dc_fh_settings_init() {
    // register a new setting for "dc_fh" page
    register_setting( 'dc_fh', 'dc_fh_options' );

    // register a new section in the "dc_fh" page
    add_settings_section(
        'dc_fh_publish',                    //$id
        __( 'Power Controls.', 'dc_fh' ),   //$title
        'dc_fh_publish_cb',                 //$callback
        'dc_fh'                             //$page
    );
 
    // register a new field in the "wporg_section_developers" section, inside the "wporg" page
    add_settings_field(
        'dc_fh_display',        //$id
        'Show floating hearts',       //$title
        'dc_fh_display_cb',     //$callback
        'dc_fh',                //$page
        'dc_fh_publish',        //$section
        array(                  //$arguments
            'label_for'     =>      'dc_fh_display',
            'class'         =>      'dc_fh_row',
            'dc_fh_data'    =>      'not-needed'
        )                      
    );
}
 
/**
 * register our dc_fh_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'dc_fh_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function dc_fh_publish_cb( $args ) {
    
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Some simple settings to manage the plugin.', 'dc_fh' ); ?></p>
    <?php
    
}
 
// pill field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function dc_fh_display_cb( $args ) {

    // get the value of the setting we've registered with register_setting()
    $options = get_option( 'dc_fh_options' );
    // output the field
    ?>
    <select id="<?php echo esc_attr( $args['label_for'] ); ?>"
    data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
    name="dc_fh_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
    >
        <option value="on" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'on', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'On', 'dc_fh' ); ?>
        </option>
        <option value="off" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'off', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'Off', 'dc_fh' ); ?>
        </option>
    </select>
    <p class="description">
        <?php esc_html_e( 'We will only show the hearts on the front end if this is turned on.', 'dc_fh' ); ?>
    </p>
    <?php
}
 
/**
 * top level menu
 */
function dc_fh_settings_page() {
    // add sub-menu page to Appearance menu
    add_submenu_page(
        'themes.php',
        'Floating Hearts',
        'Floating Hearts',
        'manage_options',
        'floating_hearts',
        'dc_fh_settings_page_cb'
    );
 
}
 
/**
 * register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'dc_fh_settings_page' );
 
/**
 * top level menu:
 * callback functions
 */
function dc_fh_settings_page_cb() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
 
    // add error/update messages
    
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'dc_fh_messages', 'dc_fh_message', __( 'Settings Saved', 'dc_fh' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'dc_fh_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "dc_fh"
        settings_fields( 'dc_fh' );
        // output setting sections and their fields
        // (sections are registered for "dc_fh", each field is registered to a specific section)
        do_settings_sections( 'dc_fh' );
        // output save settings button
        submit_button( 'Save' );
        ?>
        </form>
    </div>
    <?php
}