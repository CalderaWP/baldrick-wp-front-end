<?php
/**
 * Create an HTML element
 *
 * @package   @package calderawp\baldrick_wp_front_end
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */

namespace calderawp\baldrick_wp_front_end;

/**
 * Class html
 *
 * @package calderawp\baldrick_wp_front_end
 */
class html {

	/**
	 * Create the HTML
	 *
	 * @param string $action Name of AJAX action to run.
	 * @param string|bool $atts Optional. Additional data-* to use in element.
	 * @param string|bool $text Optional. Text to use for link trigger. If false, the default, there will be no trigger.
	 * *@param string|bool $api Optional. URL for AJAX API to process with. Default is WordPress' AJAX API
	 *
	 * @return string
	 */
	public static function element( $action, $atts = false, $text = false, $api = false ) {

		$atts[ 'class' ] = settings::$baldrick_class;
		$atts[ 'data-action' ] = $action;
		if ( ! $api ) {
			$atts['data-request'] = settings::default_api();
		}

		foreach( $atts as $att => $value ) {
			$att_out[] = esc_attr( $att ).'="'.esc_attr( $value ).'"';
		}

		$att_out = implode( ' ', $att_out );

		$out[] = '<a ';
		$out[] = $att_out;
		$out[] = ' >';
		if( $text ) {
			$out[] = $text;
		}
		$out[] = '</a>';

		return implode( '', $out );

	}
}
