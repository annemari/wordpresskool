<?php
/**
 * Simply Schedule Appointments Support Status Api.
 *
 * @since   2.1.6
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Support Status Api.
 *
 * @since 2.1.6
 */
class SSA_Support_Status_Api extends WP_REST_Controller {
	/**
	 * Parent plugin class
	 *
	 * @var   class
	 * @since 1.0.0
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 *
	 * @since  1.0.0
	 * @param  object $plugin Main plugin object.
	 * @return void
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function hooks() {
		$this->register_routes();
	}


	/**
	 * Register the routes for the objects of the controller.
	 */
	public function register_routes() {
		$version = '1';
		$namespace = 'ssa/v' . $version;
		$base = 'support_status';
		register_rest_route( $namespace, '/' . $base, array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_items' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support_ticket', array(
			array(
				'methods'         => WP_REST_Server::CREATABLE,
				'callback'        => array( $this, 'create_support_ticket' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support_debug/wp', array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_wp_debug_log_content' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support_debug/wp/delete', array(
			array(
				'methods'         => WP_REST_Server::CREATABLE,
				'callback'        => array( $this, 'empty_wp_debug_log_content' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );


		register_rest_route( $namespace, '/' . 'support_debug/ssa', array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_ssa_debug_log_content' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support_debug/ssa/delete', array(
			array(
				'methods'         => WP_REST_Server::CREATABLE,
				'callback'        => array( $this, 'empty_ssa_debug_log_content' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support_debug/logs', array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_debug_log_urls' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support/export', array(
			array(
				'methods'         => WP_REST_Server::READABLE,
				'callback'        => array( $this, 'get_export_code' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );

		register_rest_route( $namespace, '/' . 'support/import', array(
			array(
				'methods'         => WP_REST_Server::CREATABLE,
				'callback'        => array( $this, 'import_data' ),
				'permission_callback' => array( $this, 'get_items_permissions_check' ),
				'args'            => array(

				),
			),
		) );
	}

	public function create_support_ticket( $request ) {
		$params = $request->get_params();
		$response = wp_remote_post( 'https://api.simplyscheduleappointments.com/support_ticket/', array(
			'headers' => array(
				'content-type' => 'application/json',
			),
			'body' => json_encode( $params ),
		) );
		$response = wp_remote_retrieve_body( $response );
		if ( empty( $response ) ) {
			return new WP_Error( 'empty_response', __( 'No response', 'simply-schedule-appointments' ) );
		}
		$response = json_decode( $response, true );
		if ( ! is_array( $response ) ) {
			$response = json_decode( $response, true );
		}

		if ($response['status'] != 'success' ) {
			return new WP_Error( 'failed_submission', __( 'Your support ticket failed to be sent, please send details to support@simplyscheduleappointments.com', 'simply-schedule-appointments' ) );
		}

		return $response;
	}

	public function get_items_permissions_check( $request ) {
		return current_user_can( 'ssa_manage_site_settings' );
	}

	public function get_items( $request ) {
		$params = $request->get_params();

		return array(
			'response_code' => 200,
			'error' => '',
			'data' => array(
				'site_status' => $this->plugin->support_status->get_site_status(),
			),
		);
	}

	/**
	 * Gets the default debug.log contents.
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */
	public function get_wp_debug_log_content( WP_REST_Request $request ) {
		$developer_settings = $this->plugin->developer_settings->get();
		if( $developer_settings && isset( $developer_settings['debug_mode'] ) && $developer_settings['debug_mode'] ) {
			$path = ini_get('error_log');
			// return $path;
			if ( file_exists( $path ) && is_writeable( $path ) ) {
				$content = file_get_contents( $path );

				return new WP_REST_Response( $content, 200 );
			} 
		}

		return new WP_REST_Response( "", 200 );
	}


	/**
	 * Deletes the default debug.log file.
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */
	public function empty_wp_debug_log_content( WP_REST_Request $request ) {
		$path = ini_get('error_log');
		if ( file_exists( $path ) && is_writeable( $path ) ) {
			unlink( $path );

			return new WP_REST_Response( __( 'Debug Log file successfully cleared.' ), 200 );
		} else {
			return new WP_REST_Response( __( 'Debug Log file not found.' ), 200 );
		}
	}

	/**
	 * Gets the ssa_debug.log contents.
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */	
	public function get_ssa_debug_log_content( WP_REST_Request $request ) {
		$developer_settings = $this->plugin->developer_settings->get();
		if( $developer_settings && isset( $developer_settings['ssa_debug_mode'] ) && $developer_settings['ssa_debug_mode'] ) {
			$path = $this->get_log_file_path( 'debug' );
			if ( file_exists( $path ) && is_readable( $path ) ) {
				$content = file_get_contents( $path );

				return new WP_REST_Response( $content, 200 );
			} 
		}

		return new WP_REST_Response( "", 200 );
	}

	/**
	 * Get file path
	 *
	 * @param  string $filename Filename
	 *
	 * @return string
	 */
	public function get_log_file_path( $filename = 'debug' ) {
		$path = SSA_Filesystem::get_uploads_dir_path();
		if ( empty( $path ) ) {
			return false;
		}

		$path .= '/logs';
		if ( ! wp_mkdir_p( $path ) ) {
			return false;
		}

		if ( ! file_exists( $path . '/index.html' ) ) {
			$handle = @fopen( $path . '/index.html', 'w' );
			@fwrite( $handle, '' );
			@fclose( $handle );
		}

		$filename .= '-' . substr( sha1( AUTH_KEY ), 0, 10 );

		return $path . '/' . sanitize_title( $filename ) . '.log';
	}

	/**
	 * Deletes the ssa_debug.log file.
	 *
	 * @param WP_REST_Request $request
	 * @return void
	 */
	public function empty_ssa_debug_log_content( WP_REST_Request $request ) {
		$path = $this->get_log_file_path( 'debug' );
		if ( file_exists( $path ) && is_writeable( $path ) ) {
			unlink( $path );

			return new WP_REST_Response( __( 'Debug Log file successfully cleared.' ), 200 );
		} else {
			return new WP_REST_Response( __( 'Debug Log file not found or could not be removed.' ), 200 );
		}

	}


	/**
	 * Returns the urls for all debug log files.
	 *
	 * @return WP_REST_Response
	 */
	public function get_debug_log_urls() {
		$logs = array(
			'wp' => null,
			'ssa' => null,
		);

		$path = ini_get('error_log');
		if ( file_exists( $path ) && is_readable( $path ) ) {
			$logs['wp'] = str_replace(
				wp_normalize_path( untrailingslashit( ABSPATH ) ),
				site_url(),
				wp_normalize_path( $path )
			);
		}

		$ssa_path = $this->get_log_file_path( 'debug' );
		if ( file_exists( $ssa_path ) && is_readable( $ssa_path ) ) {
			$logs['ssa'] = str_replace(
				wp_normalize_path( untrailingslashit( ABSPATH ) ),
				site_url(),
				wp_normalize_path( $ssa_path )
			);
		}

		return new WP_REST_Response( $logs, 200 );
	}

	/**
	 * Pulls plugin settings, Appointment Types and Appointments and returns a JSON payload to be imported into another SSA plugin.
	 *
	 * @param WP_REST_Request $request
	 * @return void
	 */
	public function get_export_code( WP_REST_Request $request ) {
		$params = $request->get_params();

		$payload = array();

		if( isset( $params['settings'] ) && $params['settings'] === 'true' ) {
			$payload['settings'] = $this->plugin->settings->get();
		}
		if( isset( $params['appointment_types'] ) && $params['appointment_types'] === 'true' ) {
			$payload['appointment_types'] = $this->plugin->appointment_type_model->query( array(
				'order' => 'ASC', // necessary for keeping integrity with the order of rows inserted on the database
				'number' => -1
			) );
		}
		if( isset( $params['appointments'] ) && $params['appointments'] === 'true' ) {
			$appointments = $this->plugin->appointment_model->query( array(
				'order' => 'ASC', // necessary for keeping integrity with the order of rows inserted on the database
				'number' => -1
			) );

			if ( ! empty( $params['anonymize_customer_information'] ) && $params['anonymize_customer_information'] === 'true' ) {
				foreach ($appointments as &$appointment) {
					foreach ($appointment['customer_information'] as $key => &$value) {
						switch ($key) {
							case 'Phone':
								$value = '123-456-7890';
								break;
							case 'Email':
								$value = substr( sha1( $value ), 0, 10 ) . '@mailinator.com';
								break;
							default:
								$value = substr( sha1( $value ), 0, 10 );
								break;
						}
					}
				}
			}

			$payload['appointments'] = $appointments;
			// import meta data as well
			$payload['appointment_meta'] = $this->plugin->appointment_meta_model->query( array(
				'order' => 'ASC', // necessary for keeping integrity with the order of rows inserted on the database
				'number' => -1
			) );
		}

		return new WP_REST_Response( $payload, 200 );
	}

	/**
	 * Receives a JSON formatted string, parses into import data, and runs all the import process.
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */
	public function import_data( WP_REST_Request $request ) {
		$json = $request->get_param('content');

		// verify if JSON data is valid
		$decoded = json_decode( $json, true );

		if ( ! is_object( $decoded ) && ! is_array( $decoded ) ) {
			return new WP_REST_Response( __( 'Invalid data format.'), 500 );
		}
		
		if ( json_last_error() !== JSON_ERROR_NONE ) {
			return new WP_REST_Response( __( 'Invalid data format.'), 500 );
		}

		// if settings data is available, disable all settings (so we don't trigger hooks for notifications, webhooks, etc). The settings will get overwritten again at the end of this import process
		if( isset( $decoded['settings'] ) ) {
			$old_settings = $this->plugin->settings->get();
			foreach ($old_settings as $key => &$old_setting) {
				if ( empty( $old_setting ) || ! is_array( $old_setting ) ) {
					continue;
				}

				$old_setting['enabled'] = false;
			}

			$update = $this->plugin->settings->update( $old_settings );
		}

		// if appointment types data is available, update
		if( isset( $decoded['appointment_types'] ) ) {
			$delete = $this->plugin->appointment_type_model->truncate();
			$this->plugin->appointment_type_model->create_table();

			foreach( $decoded['appointment_types'] as $appointment_type ) {
				$include = $this->plugin->appointment_type_model->raw_insert( $appointment_type );

				// if any error happens while trying to import appointment type data, return
				if( is_wp_error( $include ) ) {
					return new WP_REST_Response( $include->get_error_messages(), 500 );
				}
			}
		}

		// if appointments data is available, update
		if( isset( $decoded['appointments'] ) ) {
			$delete = $this->plugin->appointment_model->truncate();
			$this->plugin->appointment_model->create_table();

			foreach( $decoded['appointments'] as $appointment ) {
				$include = $this->plugin->appointment_model->db_insert( $appointment );

				// if any error happens while trying to import appointment data, return
				if( is_wp_error( $include ) ) {
					return new WP_REST_Response( $include->get_error_messages(), 500 );
				}
			}
		}

		// if appointments meta data is available, update
		if( isset( $decoded['appointment_meta'] ) ) {
			$delete = $this->plugin->appointment_meta_model->truncate();

			foreach( $decoded['appointment_meta'] as $appointment_meta ) {
				$include = $this->plugin->appointment_meta_model->db_insert( $appointment_meta );

				// if any error happens while trying to import appointment data, return
				if( is_wp_error( $include ) ) {
					return new WP_REST_Response( $include->get_error_messages(), 500 );
				}
			}
		}

		// if settings data is available, update
		if( isset( $decoded['settings'] ) ) {
			$update = $this->plugin->settings->update( $decoded['settings'] );
		}

		$delete = $this->plugin->availability_model->truncate();

		// everything was successfully imported
		return new WP_REST_Response( __( 'Data successfully imported!' ), 200 );
	}

}
