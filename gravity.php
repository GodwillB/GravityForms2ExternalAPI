<?php
/**
 * Plugin Name: Gravity Rest
 * Plugin URI: https://github.com/GodwillB
 * Author: Godwill Barasa
 * Author URI: https://github.com/GodwillB
 * Description: Collect Gravity forms to Webhook
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: gravity-rest
*/

defined( 'ABSPATH' ) or die( 'No entry' );

add_action( 'gform_after_submission_2', 'techiepress_after_submission_2', 10, 2 );

function techiepress_after_submission_2( $entry, $form ) {

  //match API fields with Gravity Forms ID

    if ( $entry['form_id'] == 2 ) {

        $info = [
            'name'   => $entry[1],
            'phone' => $entry [2],
            'email'  => $entry[3],
            'apartmentType'  => $entry[6],
            'url' => $entry[7],
        ];

        $url = 'insert-url-here';

        $args = [
            'method' => 'POST',
            'body'   => json_encode($info),
            'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
            'data_format' => 'body',
        ];

        $post = wp_remote_post( $url, $args );


        error_log(print_r( $post, true ));

    }

}

add_action( 'gform_after_submission_1', 'techiepress_after_submission_1', 10, 2 );

function techiepress_after_submission_1( $entry, $form ) {

    // error_log( print_r( $entry, true ) );

    if ( $entry['form_id'] == 1 ) {

        $info = [
            
            'email'  => $entry[1],
			'url' => $entry[2],
           
        ];

        $url = 'insert-end-point-here';

        $args = [
            'method' => 'POST',
            'body'   => json_encode($info),
            'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
            'data_format' => 'body',
        ];

         $post = wp_remote_post( $url, $args );


        error_log(print_r( $post, true ));

    }

}