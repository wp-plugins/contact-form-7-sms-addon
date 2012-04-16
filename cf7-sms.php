<?php
/*
Plugin Name: Contact Form 7 - SMS Addon
Plugin URI: http://www.mediaburst.co.uk/wordpress/contact-form-7-sms-addon/
Description: Send SMS notifications when somebody submits your contact form
Version: 1.5.2
Author: Mediaburst Ltd
Author URI: http://www.mediaburst.co.uk/
License: ISC
*/

if ( ! defined( 'WPCF7_SMS_VERSION' ) )
    define( 'WPCF7_SMS_VERSION', 1.0);

if ( ! defined( 'WPCF7_SMS_PLUGIN_NAME' ) )
	define( 'WPCF7_SMS_PLUGIN_NAME', trim( dirname( plugin_basename( __FILE__ )  ) ) );

if ( ! defined( 'WPCF7_SMS_PLUGIN_DIR' ) )
	define( 'WPCF7_SMS_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . WPCF7_SMS_PLUGIN_NAME );

if ( ! defined( 'WPCF7_SMS_PLUGIN_URL' ) )
	define( 'WPCF7_SMS_PLUGIN_URL', WP_PLUGIN_URL . '/' . WPCF7_SMS_PLUGIN_NAME );


// Try to avoid clashes with anything else using MB
if ( ! class_exists( 'WPmediaburstSMS' ) ) {
	require_once( 'classes/WPmediaburstSMS.class.php' );
}
if ( ! class_exists( 'WPWordPressMBHTTP' ) ) {
	require_once( 'classes/wordpress-mb-http.class.php' );
}

require_once( 'classes/cf7-sms.class.php' );

new WPCF7_SMS();
