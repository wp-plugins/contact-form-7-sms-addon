<?php
class Clockwork_CF7_Plugin extends Clockwork_Plugin {  

  protected $plugin_name = 'Contact Form 7 SMS';  
  protected $language_string = 'wpcf7_sms';
  protected $prefix = 'clockwork_cf7';
  protected $folder = '';
  
  /**
   * Constructor: setup callbacks and plugin-specific options
   *
   * @author James Inman
   */
  public function __construct() {
    parent::__construct();
    
    // Set the plugin's Clockwork SMS menu to load the contact forms
    $this->plugin_callback = array( $this, 'wpcf7' );    
    $this->plugin_dir = basename( dirname( __FILE__ ) );
    
    // Setup options for each Contact Form 7 form
    add_action( 'wpcf7_admin_after_form', array( &$this, 'setup_form_options' ) ); 
    add_action( 'wpcf7_after_save', array( &$this, 'save_form' ) );
    add_action( 'wpcf7_before_send_mail', array( &$this, 'send_sms' ) );
  }

  /**
   * Include the template for each contact form's SMS options
   *
   * @param $form Contact form to display
   * @return void
   * @author James Inman
   */
  public function setup_form_options( $form ) {    
    if ( wpcf7_admin_has_edit_cap() ) {
      $options = get_option( 'wpcf7_sms_' . $form->id );
      if( empty( $options ) || !is_array( $options ) ) {
        $options = array( 'phone' => '', 'message' => '' );
      }
      $this->render_template( 'form-options', $options );
    }
  }
  
  /**
   * Setup the admin navigation
   *
   * @return void
   * @author James Inman
   */
  public function setup_admin_navigation() {
    parent::setup_admin_navigation();
  }
  
  /**
   * Setup HTML for the admin <head>
   *
   * @return void
   * @author James Inman
   */
  public function setup_admin_head() {
    echo '<link rel="stylesheet" type="text/css" href="' . plugins_url( 'css/clockwork.css', __FILE__ ) . '">';
  }
  
  /**
   * Empty function to provide a callback for the main plugin action page
   *
   * @return void
   * @author James Inman
   */
  public function wpcf7() {}

  /**
   * Send SMS on contact form submission
   *
   * @param object $form Contact form to send  
   * @return void
   * @author James Inman
   */
  public function send_sms( $form ) {
    $options = array_merge( get_option( 'clockwork_options' ), get_option( 'wpcf7_sms_' . $form->id ) );
    if( isset( $options['api_key'] ) && isset( $options['phone'] ) && $options['phone'] != '' && isset( $options['message'] ) && $options['message'] != '' ) { 
      
      // Replace merged Contact Form 7 fields
      if( defined( 'WPCF7_VERSION' ) && WPCF7_VERSION < 3.1 ) {
        $regex = '/\[\s*([a-zA-Z_][0-9a-zA-Z:._-]*)\s*\]/';
      } else {
        $regex = '/(\[?)\[\s*([a-zA-Z_][0-9a-zA-Z:._-]*)\s*\](\]?)/';
      }
      
      $callback = array( &$form, 'mail_callback' );
      $message = preg_replace_callback( $regex, $callback, $options['message'] );
      $phone = preg_replace_callback( $regex, $callback, $options['phone'] );
      $phone = explode( ',', $phone );
    
      try {
        $clockwork = new WordPressClockwork( $options['api_key'] );
        $messages = array();
        foreach( $phone as $to ) {
          $messages[] = array( 'to' => $to, 'message' => $message );          
        }
        $result = $clockwork->send( $messages );
      } catch( ClockworkException $e ) {
        $result = "Error: " . $e->getMessage();
      } catch( Exception $e ) { 
        $result = "Error: " . $e->getMessage();
      }
    }
  }
  
  /**
   * Save SMS options when contact form is saved
   *
   * @param object $cf Contact form
   * @return void
   * @author James Inman
   */
  public function save_form( $form ) {
    update_option( 'wpcf7_sms_' . $form->id, $_POST['wpcf7-sms'] );
  }
  
  /**
   * Check if username and password have been entered
   *
   * @return void
   * @author James Inman
   */
  public function get_existing_username_and_password(){
    if( !defined( WPCF7_PLUGIN_DIR ) ) {
      define( WPCF7_PLUGIN_DIR, WP_PLUGIN_DIR . '/contact-form-7/' );
    }
    
		if( !class_exists( 'WPCF7_ContactForm' ) ) {
			require_once( WPCF7_PLUGIN_DIR . '/includes/functions.php' );
			require_once( WPCF7_PLUGIN_DIR . '/includes/classes.php' );
    }

		$forms = WPCF7_ContactForm::find( array() );
    foreach( $forms as $form ) {
      $options = get_option( 'wpcf7_sms_' . $form->id );
      if( isset( $options['username'] ) && isset( $options['password'] ) ) {
        return array( 'username' => $options['username'], 'password' => $options['password'] );
      }
    }
    
    return false;
  }
  
}

$cp = new Clockwork_CF7_Plugin();