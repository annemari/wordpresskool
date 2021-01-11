<?php
/**
 * Simply Schedule Appointments Support.
 *
 * @since   2.1.6
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Support.
 *
 * @since 2.1.6
 */
class SSA_Support {
	/**
	 * Parent plugin class.
	 *
	 * @since 2.1.6
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  2.1.6
	 *
	 * @param  Simply_Schedule_Appointments $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  2.1.6
	 */
	public function hooks() {
		add_action( 'admin_init', array( $this, 'fix_appointment_durations' ) );
		add_action( 'admin_init', array( $this, 'fix_appointment_group_ids' ) );
		add_action( 'admin_init', array( $this, 'fix_db_datetime_schema' ) );
		add_action( 'admin_init', array( $this, 'fix_db_availability_schema' ) );
		add_action( 'admin_init', array( $this, 'reset_settings' ) );
		add_action( 'admin_init', array( $this, 'rebuild_db' ) );
		add_action( 'admin_init', array( $this, 'clear_google_cache' ) );
		// add_action( 'init', 	  array( $this, 'set_ssa_debug_mode' ) );
	}

	public function clear_google_cache() {
		if ( empty( $_GET['ssa-clear-google-cache'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		$this->plugin->availability_model->bulk_delete( array(
			'type' => 'external',
			'subtype' => 'google',
		) );

		wp_redirect( remove_query_arg( 'ssa-clear-google-cache' ) );
		exit;
	}

	public function fix_appointment_durations() {
		if ( empty( $_GET['ssa-fix-appointment-durations'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		$appointments = $this->plugin->appointment_model->query( array(
			'number' => -1,
		) );
		$now = new DateTimeImmutable();

		foreach ($appointments as $key => $appointment) {
			$appointment_type = new SSA_Appointment_Type_Object( $appointment['appointment_type_id'] );
			$duration = $appointment_type->duration;
			$start_date = new DateTimeImmutable( $appointment['start_date'] );

			$end_date = $start_date->add( new DateInterval( 'PT' .$duration. 'M' ) );
			if ( $end_date->format( 'Y-m-d H:i:s' ) != $appointment['end_date'] ) {
				echo '<pre>'.print_r($appointment, true).'</pre>';
				$appointment['end_date'] = $end_date->format( 'Y-m-d H:i:s' );

				$this->plugin->appointment_model->update( $appointment['id'], $appointment );
			}
		}

		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}

	public function fix_db_availability_schema() {
		if ( empty( $_GET['ssa-fix-db-availability-schema'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}


		$this->plugin->availability_model->drop();
		$this->plugin->availability_model->create_table();

		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}
	public function fix_db_datetime_schema() {
		if ( empty( $_GET['ssa-fix-db-datetime-schema'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		global $wpdb;

		$now = gmdate( 'Y-m-d H:i:s' );

		$before_queries = array(
			/* Appointment Types */
			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `booking_start_date`='".SSA_Constants::EPOCH_START_DATE."' WHERE `booking_start_date`=0",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `booking_end_date`='".SSA_Constants::EPOCH_END_DATE."' WHERE `booking_end_date`=0",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `availability_start_date`='".SSA_Constants::EPOCH_START_DATE."' WHERE `availability_start_date`=0",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `availability_end_date`='".SSA_Constants::EPOCH_END_DATE."' WHERE `availability_end_date`=0",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `date_created`='1970-01-01' where `date_created`=0",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `date_modified`='1970-01-01' where `date_modified`=0",

			/* Appointments */
			"UPDATE {$this->plugin->appointment_model->get_table_name()} SET `start_date`='1970-01-01' where `start_date`=0",

			"UPDATE {$this->plugin->appointment_model->get_table_name()} SET `end_date`='1970-01-01' where `end_date`=0",

			"UPDATE {$this->plugin->appointment_model->get_table_name()} SET `date_created`='1970-01-01' where `date_created`=0",

			"UPDATE {$this->plugin->appointment_model->get_table_name()} SET `date_modified`='1970-01-01' where `date_modified`=0",

		);

		$after_queries = array(
			/* Appointment Types */
			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `booking_start_date`=NULL where `booking_start_date`='".SSA_Constants::EPOCH_START_DATE."'",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `booking_end_date`=NULL where `booking_end_date`='".SSA_Constants::EPOCH_END_DATE."'",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `availability_start_date`=NULL where `availability_start_date`='".SSA_Constants::EPOCH_START_DATE."'",

			"UPDATE {$this->plugin->appointment_type_model->get_table_name()} SET `availability_end_date`=NULL where `availability_end_date`='".SSA_Constants::EPOCH_END_DATE."'",
		);

		$has_failed = false;
		foreach ($before_queries as $query) {
			$result = $wpdb->query( $query );
			if ( false === $result ) {
				$has_failed = true;
			}
		}

		$this->plugin->appointment_type_model->create_table();
		$this->plugin->appointment_model->create_table();

		foreach ($after_queries as $query) {
			$result = $wpdb->query( $query );
			if ( false === $result ) {
				$has_failed = true;
			}
		}

		$this->fix_appointment_group_ids( true );

		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}

	public function fix_appointment_group_ids( $force = false ) {
		if ( empty( $force ) && empty( $_GET['ssa-fix-appointment-group-ids'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		$appointments = $this->plugin->appointment_model->query( array(
			'number' => -1,
		) );
		$now = new DateTimeImmutable();

		foreach ($appointments as $key => $appointment) {
			if ( ! empty( $appointment['group_id'] ) ) {
				continue;
			}

			$appointment_type = new SSA_Appointment_Type_Object( $appointment['appointment_type_id'] );
			$capacity_type = $appointment_type->capacity_type;
			if ( empty( $capacity_type ) || $capacity_type !== 'group' ) {
				continue;
			}

			$start_date = new DateTimeImmutable( $appointment['start_date'] );

			$args = array(
				'number' => -1,
				'orderby' => 'id',
				'order' => 'ASC',
				'appointment_type_id' => $appointment['appointment_type_id'],
				'start_date' => $appointment['start_date'],
				'exclude_ids' => $appointment['id'],
			);

			$new_group_id = 0;
			$appointment_arrays = $this->plugin->appointment_model->query( $args );
			foreach ($appointment_arrays as $appointment_array) {
				if ( ! empty( $appointment_array['group_id'] ) ) {
					$new_group_id = $appointment_array['group_id'];
				}
			}

			if ( empty( $new_group_id ) && empty( $appointment_arrays[0]['id'] ) ) {
				continue;
			}

			$new_group_id = $appointment_arrays[0]['id'];

			$this->plugin->appointment_model->update( $appointment['id'], array(
				'group_id' => $new_group_id
			) );

			foreach ($appointment_arrays as $appointment_array) {
				$this->plugin->appointment_model->update( $appointment_array['id'], array(
					'group_id' => $new_group_id
				) );
			}
		}

		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}

	public function reset_settings() {
		if ( empty( $_GET['ssa-reset-settings'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		$options_to_delete = array(
			'wp_ssa_appointments_db_version',
			'wp_ssa_appointment_meta_db_version',
			'wp_ssa_appointment_types_db_version',
			'wp_ssa_availability_db_version',
			'wp_ssa_async_actions_db_version',
			'wp_ssa_staff_relationships_db_version',
			'wp_ssa_payments_db_version',
			'ssa_settings_json',
			'ssa_versions',
		);

		foreach ($options_to_delete as $option_name) {
			delete_option( $option_name );
		}

		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}

	public function rebuild_db() {
		if ( empty( $_GET['ssa-rebuild-db'] ) ) {
			return;
		}

		if ( ! is_user_logged_in() ) {
			return;
		}

		$this->plugin->appointment_model->create_table();
		$this->plugin->appointment_meta_model->create_table();
		$this->plugin->appointment_type_model->create_table();
		$this->plugin->availability_model->create_table();
		$this->plugin->async_action_model->create_table();
		$this->plugin->staff_relationship_model->create_table();
		$this->plugin->payment_model->create_table();


		wp_redirect( $this->plugin->wp_admin->url(), $status = 302);
		exit;
	}

	/**
	 * Defines the SSA_DEBUG_LOG constant to identify if we need to log information specific to the plugin on the
	 * ssa_debug.log file.
	 *
	 * @return void
	 */
	// public function set_ssa_debug_mode() {
	// 	$developer_settings = $this->plugin->developer_settings->get();
	// 	if( $developer_settings && isset( $developer_settings['ssa_debug_mode'] ) && $developer_settings['ssa_debug_mode'] ) {
	// 		define( 'SSA_DEBUG_LOG', true );
	// 	}
	// }
}
