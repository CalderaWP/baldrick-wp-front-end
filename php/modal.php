<?php
/**
 * Make a modal
 *
 * @package calderawp\baldrick_wp_front_end
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

namespace calderawp\baldrick_wp_front_end;

/**
 * Class modal
 *
 * @package calderawp\baldrick_wp_front_end
 */
class modal {

	/**
	 * Create the HTML for a modal
	 *
	 * @param string $action Name of AJAX action to run.
	 * @param string|bool $atts Optional. Additional data-* to use in element.
	 * @param string $text Text to use for link trigger.
	 * *@param string|bool $api Optional. URL for AJAX API to process with. Default is WordPress' AJAX API
	 *
	 * @return string
	 */
	public static function make( $action, $atts = false, $text, $api = false ) {
		$atts[ 'data-modal' ] = 'true';
		$modal = html::element( $action, $atts, $text, $api );

		return $modal;

	}

}
