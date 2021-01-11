<?php
/**
 * Simply Schedule Appointments Availability Cache.
 *
 * @since   4.0.1
 * @package Simply_Schedule_Appointments
 */
use League\Period\Period;

/**
 * Simply Schedule Appointments Availability Cache.
 *
 * @since 4.0.1
 */
class SSA_Availability_Cache {
	/**
	 * Parent plugin class.
	 *
	 * @since 4.0.1
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;

	const CACHE_MODE_DISABLED = 0;
	const CACHE_MODE_ENABLED = 10;

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

	}

	public function generate_cache_key( $args ) {
		$args = $this->get_args( $args );
		$args['start_date'] = null;
		$args['end_date'] = null;
		$availability_id = $this->plugin->availability_model->insert( $args );

		$obj_cache_key = 'ssa/args:'.$args['cache_args'].'/latest_cache_key';
		wp_cache_set( $obj_cache_key, $availability_id, '', MONTH_IN_SECONDS );

		return $availability_id;
	}

	public function get_cache_args( $args ) {
		return sha1( json_encode( $args ) );
	}

	public function get_args( $args ) {
		$args = shortcode_atts( array(
			'appointment_type_id' => 0,
			'appointment_id' => 0,
			'staff_id' => 0,
			'type' => '',
			'subtype' => '',
			'skip_appointment_id' => '',

			'cache_key' => '',
			'cache_args' => '',
			'cache_force' => false,
		), $args );

		$args_to_hash = $args;
		$args_to_hash['cache_key'] = '';
		$args_to_hash['cache_args'] = '';
		$args_to_hash['cache_force'] = false;

		$args['cache_args'] = $this->get_cache_args( $args_to_hash );

		return $args;
	}

	public function get_cache_mode() {
		$developer_settings = $this->plugin->developer_settings->get();
		if ( empty( $developer_settings['cache_availability'] ) ) {
			return self::CACHE_MODE_DISABLED;
		}

		return self::CACHE_MODE_ENABLED;
	}

	public function is_cache_mode( $mode ) {
		return $mode === $this->get_cache_mode();
	}

	public function is_enabled() {
		return ! $this->is_cache_mode( self::CACHE_MODE_DISABLED );
	}

	public function get_latest_cache_key( $args ) {
		$args = $this->get_args( $args );

		$obj_cache_key = 'ssa/args:'.$args['cache_args'].'/latest_cache_key';
		$obj_cache_group = $this->plugin->availability_cache_invalidation->get_cache_group();

		$latest_cache_key = wp_cache_get( $obj_cache_key, $obj_cache_group );
		if ( false !== $latest_cache_key ) {
			return $latest_cache_key;
		}

		global $wpdb;
		$sql = 'SELECT cache_key FROM '.$this->plugin->availability_model->get_table_name().' WHERE cache_args=%s ORDER BY cache_key DESC LIMIT 1';
		$sql = $wpdb->prepare(
			$sql,
			$args['cache_args']
		);
		$latest_cache_key = $wpdb->get_row( $sql, ARRAY_A );
		$latest_cache_key = $latest_cache_key['cache_key'];
		wp_cache_set( $obj_cache_key, $latest_cache_key, $obj_cache_group, MONTH_IN_SECONDS );

		return $latest_cache_key;
	}

	public function query( SSA_Appointment_Type_Object $appointment_type, Period $query_period, $args ) {
		if ( ! $this->is_enabled() ) {
			return;
		}

		$appointment_type_id = ( empty( $appointment_type ) ) ? 0 : $appointment_type->id;
		if ( ! empty( $appointment_type_id ) || empty( $args['appointment_type_id'] ) ) {
			$args['appointment_type_id'] = $appointment_type_id;
		}
		$args = $this->get_args( $args );

		$query_args = array(
			'number' => -1,
			'cache_args' => $args['cache_args'],
			'contains_period' => $query_period,
		);
		// $latest_cache_key = $this->get_latest_cache_key( $args );
		// if ( ! empty( $latest_cache_key ) ) {
		// 	$query_args['cache_key'] = $latest_cache_key;
		// }

		$availability_rows = $this->plugin->availability_model->query( $query_args );

		$schedule = new SSA_Availability_Schedule();
		$availability_blocks = array();
		foreach ($availability_rows as $availability_row) {
			unset( $availability_row['id'] );
			$availability_row = shortcode_atts( array(
				'capacity_available' => '',
				'capacity_reserved' => '',
				'appointment_type_id' => '',
				'staff_id' => '',
				'type' => '',
				'subtype' => '',
				'period' => new Period(
					$availability_row['start_date'],
					$availability_row['end_date']
				),
			), $availability_row );
			$availability_block = SSA_Availability_Block_Factory::create( $availability_row );
			$availability_blocks[] = $availability_block;
		}
		$schedule = $schedule->pushmerge( $availability_blocks );

		if ( $schedule->is_empty() ) {
			return;
		}
		$boundaries = $schedule->boundaries();
		if ( empty( $boundaries ) || ! $boundaries instanceof Period ) {
			return;
		}

		if ( ! $boundaries->contains( $query_period ) ) {
			return;
		}

		if ( ! $schedule->is_continuous() ) {
			$this->plugin->availability_model->bulk_delete( array(
				'cache_args' => $args['cache_args'],
			) );
			return;
		}

		return $schedule;
	}

	private function insert( SSA_Availability_Block $block, $args = array() ) {
		if ( ! $this->is_enabled() ) {
			return;
		}
		// $args = $this->get_args( $args ); // <--- not needed if insert() remains a private function

		$args = array_merge( $args, array(
			'start_date' => $block->get_period()->getStartDate()->format( 'Y-m-d H:i:s' ),
			'end_date' => $block->get_period()->getEndDate()->format( 'Y-m-d H:i:s' ),
			'capacity_reserved' => $block->capacity_reserved,
			'capacity_available' => $block->capacity_available,
		) );

		$availability_id = $this->plugin->availability_model->db_insert( $args );
	}

	public function update_schedule( SSA_Availability_Schedule $new_schedule, $args = array() ) {
		if ( ! $this->is_enabled() ) {
			return;
		}

		$boundaries = $new_schedule->boundaries();
		if ( ! empty( $boundaries ) ) {		
			$old_schedule = $this->query( SSA_Appointment_Type_Object::null(), $boundaries , $args );
			if ( empty( $old_schedule ) || $old_schedule->is_empty() ) {
				$this->insert_schedule( $new_schedule, $args );
				return;
			}
		}

		$merged_schedule = $old_schedule->merge_min( $new_schedule );
		$this->insert_schedule( $merged_schedule, $args );
	}

	public function insert_schedule( SSA_Availability_Schedule $schedule, $args = array() ) {
		if ( ! $this->is_enabled() ) {
			return;
		}

		$args = $this->get_args( $args );

		$args['cache_key'] = $this->generate_cache_key( $args );

		$availability_rows = array();
		foreach ($schedule->get_blocks() as $block) {
			$availability_rows[] = array_merge( $args, array(
				'start_date' => $block->get_period()->getStartDate()->format( 'Y-m-d H:i:s' ),
				'end_date' => $block->get_period()->getEndDate()->format( 'Y-m-d H:i:s' ),
				'capacity_reserved' => $block->capacity_reserved,
				'capacity_available' => $block->capacity_available,
			) );
		}
		$this->plugin->availability_model->db_bulk_insert( $availability_rows );

		$this->delete_schedule( $schedule, $args['cache_args'], $args['cache_key'] );
	}

	public function delete_schedule( SSA_Availability_Schedule $schedule, $cache_args, $below_this_cache_key = null ) {
		global $wpdb;
		$sql = 'DELETE FROM '.$this->plugin->availability_model->get_table_name().' WHERE cache_args=%s AND start_date >= %s AND end_date <= %s';
		$sql = $wpdb->prepare(
			$sql, array(
				$cache_args,
				$schedule->boundaries()->getStartDate()->format( 'Y-m-d H:i:s' ),
				$schedule->boundaries()->getEndDate()->format( 'Y-m-d H:i:s' )
			)
		);
		if ( empty( $below_this_cache_key ) ) {
			$wpdb->get_results( $sql );
			return;
		}

		$sql .= $wpdb->prepare( ' AND cache_key < %d', $below_this_cache_key );
		$wpdb->get_results( $sql );

		$sql = 'DELETE FROM '.$this->plugin->availability_model->get_table_name().' WHERE id=%d';
		$sql = $wpdb->prepare(
			$sql,
			$below_this_cache_key
		);
		$wpdb->get_results( $sql );
	}
}
