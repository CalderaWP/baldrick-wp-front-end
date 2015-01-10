/**

 /** globals jQuery, baldrick_wp_front_end**/
 ( function( window, undefined ) {
	'use strict';

    // initialise baldrick triggers
    jQuery(baldrick_wp_front_end.className).baldrick({
     request     : baldrick_wp_front_end.ajaxURL,
     method      : baldrick_wp_front_end.transportMethod
    });

 } )( this );
