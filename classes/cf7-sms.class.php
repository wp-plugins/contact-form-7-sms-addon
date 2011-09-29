<?php
/*
 * @package     CF7-SMS
 * @author      Mediaburst Ltd
 * @copyright   2011 Mediaburst Ltd
 * @license     ISC
 * @since       0.1
 */
class WPCF7_SMS {
	function __construct() {
		add_action( 'wpcf7_after_save', array( &$this, 'wpcf7_after_save' ) );
		add_action( 'wpcf7_admin_after_mail_2', array( &$this, 'wpcf7_admin_after_mail_2' ) );
		add_action( 'admin_print_scripts', array( &$this, 'admin_print_scripts' ) );
		add_action( 'wpcf7_before_send_mail', array( &$this, 'wpcf7_before_send_mail' ) );
		add_action( 'init', array( &$this, 'init' ) );
	}
	
	// Save SMS settings on CF7 save
	function wpcf7_after_save( $cf ) {
		//TODO: Change this to use post meta when CF7 3.0 is released
		update_option( 'wpcf7_sms_'.$cf->id, $_POST['wpcf7-sms'] );
	}

	// Draw the HTML form under mail2
	function wpcf7_admin_after_mail_2( $cf ) {
		if ( wpcf7_admin_has_edit_cap() ) {
			//TODO: Change this to use post meta when CF7 3.0 is released
			$sms_opt = get_option( 'wpcf7_sms_'.$cf->id );
			$sms_credit = 0;
			if( $sms_opt != null && isset( $sms_opt['username'] ) && isset( $sms_opt['password'] ) && $sms_opt['username'] != '' && $sms_opt['password'] != '' ) {
				include('mediaburstSMS.class.php');
				try {
					$sms = new mediaburstSMS($sms_opt['username'], $sms_opt['password']);
					$sms_credit = $sms->CheckCredit();
				} catch( mediaburstException $e ) {
					$sms_credit = __('Error: ', 'wpcf7_sms') . $e->getMessage();
				} catch (Exception $e) {
					$sms_credit = __('Error checking credit: ', 'wpcf7_sms') . $e->getMessage();
				}
			} else {
				$sms_credit = __('Enter a username and password to see your credit', 'wpcf7_sms');
			}
			include( WPCF7_SMS_PLUGIN_DIR.'/includes/form-sms-options-panel.php' );		
		}
	}

	// Add Javascript to admin pages
	function admin_print_scripts() {
		global $plugin_page;
		if ( ! isset( $plugin_page ) || 'wpcf7' != $plugin_page )
			return;		
		wp_enqueue_script( 'wpcf7-sms-admin', WPCF7_SMS_PLUGIN_URL . '/js/admin.js', array( 'jquery', 'wpcf7-admin' ), WPCF7_SMS_VERSION, true );
	}	

	// Send text message
	function wpcf7_before_send_mail( $cf ) {
		//TODO: Change this to use post meta when CF7 3.0 is released
		$sms_opt = get_option( 'wpcf7_sms_'.$cf->id );

		if( $sms_opt != null && isset( $sms_opt['active'] ) && isset( $sms_opt['username'] ) && isset( $sms_opt['password'] ) && $sms_opt['username'] != '' 
			&& $sms_opt['password'] != '' && isset ( $sms_opt['phone'] ) && $sms_opt['phone'] != '' && isset( $sms_opt['message'] ) && $sms_opt['message'] != '' ) {

			// Replace merged Contact Form 7 fields
			$regex = '/\[\s*([a-zA-Z_][0-9a-zA-Z:._-]*)\s*\]/';
			$callback = array( &$cf, 'mail_callback' );
			$message = preg_replace_callback( $regex, $callback, $sms_opt['message'] );
			$phone = preg_replace_callback( $regex, $callback, $sms_opt['phone'] );
			$phone = explode( ',', $phone );

			include('mediaburstSMS.class.php');
			try {
				$sms = new mediaburstSMS( $sms_opt['username'], $sms_opt['password'], array('long' => true, 'truncate' => true) );
				$sms_result = $sms->Send( $phone, $message );
			} catch( mediaburstException $e ) {
				$sms_result = "Error: ".$e->getMessage();
			} catch (Exception $e) {
				$sms_result = "Error checking credit: ".$e->getMessage();
			}
		}
	}

	function init () {
		load_plugin_textdomain( 'wpcf7_sms', false, WPCF7_SMS_PLUGIN_DIR.'/languages' );
	}
}
