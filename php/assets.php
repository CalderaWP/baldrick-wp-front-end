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

		wp_enqueue_script( 'baldrick_wp_front_end', self::url_path() . 'assets/js/baldrick_wp_front_end.min.js', array( 'jquery'), false, true );
		wp_localize_script( 'baldrick_wp_front_end', 'baldrick_wp_front_end', self::js_var() );
		wp_enqueue_style( 'baldrick_wp_front_end', self::url_path(). 'assets/css/baldrick_wp_front_end.min.css' );

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

	/**
	 * Get URL Path
	 *
	 * @see http://www.deluxeblogtips.com/2013/07/get-url-of-php-file-in-wordpress.html
	 *
	 * @return mixed
	 */
	protected static function url_path( ) {
		$file = __FILE__;

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( dirname( dirname( get_stylesheet_directory() ) ) );

		// Fix path on Windows
		$file = str_replace( '\\', '/', $file );
		$content_dir = str_replace( '\\', '/', $content_dir );
		$url = str_replace( $content_dir, $content_url, $file );

		$url = str_replace( basename( __FILE__ ), '', $url );
		$url = str_replace( '/php/', '', $url );

		return trailingslashit( $url );

	}

}
