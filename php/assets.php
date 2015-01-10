<?php
/**
 * Load assets
 *
 * @package   calderawp\baldrick_wp_front_end
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

namespace calderawp\baldrick_wp_front_end;

/**
 * Class assets
 *
 * @package calderawp\baldrick_wp_front_end
 */
class assets {

	/**
	 * Enqueue Baldrick
	 */
	public static function enqueue() {
		wp_enqueue_script( 'baldrick_wp_front_end', plugins_url( 'assets/js/baldrick_wp_front_end.min.js', __FILE__), array( 'jquery'), false, true );
		wp_localize_script( 'baldrick_wp_front_end', 'baldrick_wp_front_end', self::js_var() );
		wp_enqueue_style( 'baldrick_wp_front_end', plugins_url( 'assets/css/baldrick_wp_front_end.min.css', __FILE__) );

	}

	/**
	 * Set up JS Var to enqueue
	 *
	 * @return array
	 */
	protected static function js_var() {
		return array(
			'ajaxURL' => settings::default_api(),
			'className' => settings::$baldrick_class,
			'transportMethod' => settings::$default_transport,
		);
	}

}
