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
	 * @param string|bool $atts Optional. Additional data-* to use in element. Each att must start with data-, unless it is whitelisted in the allow_without_data_prefix() method. "class" & 'data-action' can never be set here. The filter "baldrick_wp_front_end_html_attributes" gives you the ability to override those.
	 * @param string|bool $text Optional. Text to use for link trigger. If false, the default, there will be no trigger.
	 * *@param string|bool $api Optional. URL for AJAX API to process with. Default is WordPress' AJAX API
	 *
	 * @return string
	 */
	public static function element( $action, $atts = false, $text = false, $api = false ) {

		$atts[ 'class' ] = settings::$baldrick_class;
		$atts[ 'data-action' ] = $action;

		if ( ! isset( $atts[ 'data-request' ] ) ) {
			if( $api && filter_var( $api, FILTER_VALIDATE_URL ) ) {
				$atts[ 'data-request' ] = $api;
			}else{
				$atts[ 'data-request' ] = settings::default_api();
			}
		}

		$att_out = array();
		foreach( $atts as $att => $value ) {

			if ( 0 !== strpos( $att, 'data-' ) )  {
				if ( self::allow_without_data_prefix( $att ) ) {
					$att = 'data-' . $att;
				}
			}

			$att_out[] = esc_attr( $att ).'="'.esc_attr( $value ).'"';

		}

		/**
		 * Filter the attributes used to build the HTML element for the Baldrick trigger
		 *
		 * IMPORTANT: This filter runs <em>after</em> attributes are validated and sanitized. No further validation, sanitization, or escaping is provided after this point, other than ensuring it returns an array.
		 *
		 * @param array $att_out The array of attributes that will be used to build the HTML element
		 * @param string $action Current action being run.
		 * @param array $atts The attributes passed to method, before validation.
		 */
		$filter_atts = apply_filters( 'baldrick_wp_front_end_html_attributes', $att_out, $action, $atts );

		if ( is_array( $filter_atts ) ) {
			$att_out = $filter_atts;
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

	/**
	 * Check if a data attribute is allowed to pass without getting a data-* prefix.
	 *
	 * @param string $att
	 *
	 * @access protected
	 *
	 * @return bool True if allowed, false if not.
	 */
	protected static function allow_without_data_prefix( $att ) {
		$allowed_without = self::allowed_without_filter();
		if ( in_array( $att, $allowed_without ) ) {
			return true;

		}

	}

	/**
	 * Filter for setting attributes allowed to not have a data-* prefix.
	 *
	 * By default return array( 'id' )
	 *
	 * @access protected
	 *
	 * @return array
	 */
	protected static function allowed_without_filter() {
		$allowed_without = array( 'id' );

		/**
		 * Set allowed attributes to pass without data-* prefixing
		 *
		 * @param array $allowed_without Attributes to allow.
		 */
		$allowed_without = apply_filters( 'baldrick_wp_front_end_atts_allowed_without_data_prefix', $allowed_without );

		if( ! is_array( $allowed_without ) ) {
			$allowed_without = array();
		}

		return $allowed_without;

	}

}
