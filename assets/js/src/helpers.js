/* globals baldrick_wp_front_end, jQuery */

/**
 * HTML Element For Opening a Modal
 */
Handlebars.registerHelper( 'wp_baldrick_modal',
    function( action, trigger, extra_class, add_arg_type, add_arg_value, text   ){
        api = baldrick_wp_front_end.ajaxURL;

        if ( undefined == trigger ) {
            trigger = 'click'
        }

        var add_arg_out ='';
        if ( undefined !== add_arg_type && undefined !== add_arg_value ) {
            add_arg_out = add_arg_type + '="'+add_arg_value+'"';

        }


        var str = '<a class="'+baldrick_wp_front_end.className+' ' +extra_class +'" data-request="'+api+'" data-action="'+action+'" data-modal="true" data-trigger="'+trigger+'" '+add_arg_out+' >'+text+'</a>';
        return new Handlebars.SafeString( str );

});



