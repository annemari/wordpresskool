<?php
/**
 * Simply Schedule Appointments Staff Object.
 *
 * @since   3.9.10
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Staff Object.
 *
 * @since 3.9.10
 */
class SSA_Staff_Object {
	protected $id = null;
	protected $model = null;
	protected $data = null;
	protected $appointment_types;
	protected $appointments;
	protected $recursive_fetched = -2;

	protected $status;

	/**
	 * Parent plugin class.
	 *
	 * @since 4.0.0
	 *
	 * @var   Simply_Schedule_Appointments
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  4.0.0
	 *
	 * @param  Simply_Schedule_Appointments $plugin Main plugin object.
	 */
	public function __construct( $id ) {
		if ( $id === 'transient' ) {		
			return;
		}

		$this->id = $id;
	}

	public static function instance( $staff ) {
		if ( $staff instanceof SSA_Staff_Object ) {
			return $staff;
		}

		if ( is_array( $staff ) ) {
			$staff = new SSA_Staff_Object( $staff['id'] );
			return $staff;
		}

		$staff = new SSA_Staff_Object( $staff );
		return $staff;
	}

	/**
	 * Magic getter for our object.
	 *
	 * @since  0.0.0
	 *
	 * @param  string $field Field to get.
	 * @throws Exception     Throws an exception if the field is invalid.
	 * @return mixed         Value of the field.
	 */
	public function __get( $field ) {
		if ( empty( $this->data ) && $field !== 'id' ) {
			$this->get();
		}

		switch ( $field ) {
			case 'id':
			case 'data':
				return $this->$field;
			default:
				if ( isset( $this->data[$field] ) ) {
					return $this->data[$field];
				}
				
				throw new Exception( 'Invalid ' . __CLASS__ . ' property: ' . $field );
		}
	}

	public function get( $recursive = -1 ) {
		if ( $recursive > $this->recursive_fetched ) {
			if ( null === $this->data ) {
				$this->data = array();
			}

			$this->data = array_merge( $this->data, ssa()->staff_model->get( $this->id, $recursive ) );
			$this->recursive_fetched = $recursive;
		}
	}

}
