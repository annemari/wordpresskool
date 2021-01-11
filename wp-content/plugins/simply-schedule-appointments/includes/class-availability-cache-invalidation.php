<?php
/**
 * Simply Schedule Appointments Availability Cache Invalidation.
 *
 * @since   4.0.1
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Availability Cache Invalidation.
 *
 * @since 4.0.1
 */
class SSA_Availability_Cache_Invalidation {
	/**
	 * Parent plugin class.
	 *
	 * @since 4.0.1
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  4.0.1
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
	 * @since  4.0.1
	 */
	public function hooks() {
		add_action( 'ssa/settings/blackout_dates/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );
		add_action( 'ssa/settings/advanced_scheduling/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );
		add_action( 'ssa/settings/google_calendar/updated', array( $this, 'invalidate_global_setting' ), 1000, 2 );

		add_action( 'ssa/appointment/after_insert', array( $this, 'invalidate_appointment' ), 1000, 2 );
		add_action( 'ssa/appointment/after_update', array( $this, 'invalidate_appointment' ), 1000, 2 );
		// add_action( 'ssa/appointment/after_delete', array( $this, 'delete_appointment', 1000, 2 );

		add_action( 'ssa/appointment_type/after_update', array( $this, 'invalidate_appointment_type'), 1000, 2 );
		add_action( 'ssa/appointment_type/after_delete', array( $this, 'invalidate_appointment_type'), 1000, 1 );
	}

	public function invalidate_everything() {
		$this->plugin->availability_model->truncate();
		$this->increment_cache_version();
	}

	public static function get_cache_version() {
		$cache_version = wp_cache_get( 'ssa/cache_version' );
		if ( false === $cache_version ) {
			$cache_version = 0;
		}

		return $cache_version;
	}

	public static function get_cache_group() {
		return 'ssa/v'.Simply_Schedule_Appointments::VERSION.'/'.self::get_cache_version();
	}

	public function increment_cache_version() {
		$cache_version = $this->get_cache_version();
		if ( false === $cache_version ) {
			$cache_version = 0;
		}

		$cache_version++;
		wp_cache_set( 'ssa/cache_version', $cache_version );
		return $cache_version;
	}

	public function invalidate_global_setting( $new_settings = array(), $old_settings = array() ) {
		$this->invalidate_type( 'appointment_type' );
		$this->increment_cache_version();
		// $this->invalidate_type( 'staff' );
		// $this->invalidate_type( 'resource' );
		// $this->invalidate_type( 'location' );
		// $this->invalidate_type( 'global' );
	}

	public function invalidate_type( $type ) {
		$this->plugin->availability_model->bulk_delete( array(
			'type' => $type,
		) );
		$this->increment_cache_version();
	}

	public function invalidate_subtype( $type, $subtype ) {
		$this->plugin->availability_model->bulk_delete( array(
			'type' => $type,
			'subtype' => $subtype,
		) );
		$this->increment_cache_version();
	}

	public function invalidate_appointment( $appointment_id, $data ) {
		if ( ! empty( $data['appointment_type_id'] ) ) {
			$appointment_type_id = $data['appointment_type_id'];
		}

		if ( empty( $appointment_type_id ) ) {
			$appointment = SSA_Appointment_Object::instance( $appointment_id );
			if ( ! $appointment instanceof SSA_Appointment_Object ) {
				return;
			}

			$appointment_type_id = $appointment->appointment_type_id;
		}

		if ( empty( $appointment_type_id ) ) {
			return;
		}

		$this->invalidate_appointment_type( $appointment_type_id );
		$this->increment_cache_version();
	}

	public function invalidate_appointment_type( $appointment_type_id, $data = array() ) {
		$this->plugin->availability_model->bulk_delete( array(
			'appointment_type_id' => $appointment_type_id,
		) );
		$this->increment_cache_version();
	}
}
