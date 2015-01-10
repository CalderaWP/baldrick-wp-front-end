<?php
/**
 * Settings for this lib.
 *
 * @package calderawp\baldrick_wp_front_end
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

namespace calderawp\baldrick_wp_front_end;

/**
 * Class settings
 *
 * @package calderawp\baldrick_wp_front_end
 */
class settings {

	/**
	 * Class to use for elements
	 *
	 * @var string
	 */
	public static $baldrick_class = 'baldrick_wp_front_end';

	/**
	 * Default HTTP method to use
	 *
	 * @var string
	 */
	public static $default_transport = 'POST';

	/**
	 * Default API URL
	 *
	 * @return string
	 */
	public static function default_api() {
		return admin_url( 'admin-ajax.php' );

	}

}
