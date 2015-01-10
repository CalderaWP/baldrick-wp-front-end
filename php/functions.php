<?php
/**
 * Functions for using
 *
 * @package   calderawp\baldrick_wp_front_end
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */


//load front-end scripts
add_action( 'wp_enqueue_scripts', array( '\calderawp\baldrick_wp_front_end\assets', 'enqueue'  ) );
