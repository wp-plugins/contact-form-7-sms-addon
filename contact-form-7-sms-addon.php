<?php
/*
Plugin Name: Contact Form 7 - Clockwork SMS
Plugin URI: http://wordpress.org/extend/plugins/contact-form-7-sms-addon/
Description: Send SMS notifications when somebody submits your contact form
Version: 2.3.0
Author: Mediaburst
Author URI: http://www.mediaburst.co.uk/
*/
 
/*  Copyright 2012, Mediaburst Limited.

Permission to use, copy, modify, and/or distribute this software for any purpose
with or without fee is hereby granted, provided that the above copyright notice
and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY AND
FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT, INDIRECT,
OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM LOSS OF USE,
DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS
ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
*/

// Version of the Clockwork plugin in use
$GLOBALS['clockwork_plugins'][ basename( dirname( __FILE__ ) ) ] = '1.2.0';

if( !function_exists( 'clockwork_loader' ) ) {

  /**
   * Load Clockwork plugins based on version numbering
   *
   * @return void
   * @author James Inman
   */
  function clockwork_loader() {
    $versions = array_flip( $GLOBALS['clockwork_plugins'] );
    uksort( $versions, 'version_compare' );
    $versions = array_reverse( $versions );
    $first_plugin = reset( $versions );
    
    // Require Clockwork plugin architecture
    if( !class_exists( 'Clockwork_Plugin' ) ) {
      require_once( dirname( dirname( __FILE__ ) ) . '/' . $first_plugin . '/lib/class-clockwork-plugin.php' );
    }
    
    // Require each plugin, unless major version doesn't match
    $version_nums = array_keys($versions);
    preg_match( '/([0-9]+)\./', reset($version_nums), $matches );
    $major_version = intval( $matches[1] );
    
    foreach( $GLOBALS['clockwork_plugins'] as $plugin => $version ) {
      preg_match( '/([0-9]+)\./', $version, $matches );
      
      if( intval( $matches[1] ) < $major_version ) {
        // If it's a major version behind, automatically deactivate it
        require_once( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/wp-admin/includes/plugin.php' );
        $plugin_path = dirname( dirname( __FILE__ ) ) . '/' . $plugin . '/' . $plugin . '.php';
        $plugin_data = get_plugin_data( $plugin_path );
        deactivate_plugins( $plugin_path );
        
        // Output a message to tell the admin what's going on
        $message = '<div id="message" class="error"><p><strong>The plugin ' . $plugin_data['Name'] . ' has an important update available. It has been disabled until it has been updated.</strong></p></div>';
        print $message;
      } else {
        require_once( dirname( dirname( __FILE__ ) ) . '/' . $plugin . '/main.php' );
      }
      
    }
  }
  
}

add_action( 'plugins_loaded', 'clockwork_loader' );
