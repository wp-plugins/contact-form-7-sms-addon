<?php 

/* 
 * WordPress MB HTTP class
 * 
 * Extends the mediaburstHTTP wrapper class to use the 
 * WordPress HTTP API for HTTP calls, attempts to work 
 * round the differences in PHP versions, such as SSL 
 * & curl support
 *
 * If you prefer to integrate with an existing set of HTTP 
 * functionality in your framework or CMS, you can extend
 * or completely replace this class, then pass the new
 * class name into your mediaburstSMS instance as the
 * http_class option (string).
 * 
 * @package	mediaburstSMS
 * @since	1.1
 */
class WordPressMBHTTP extends mediaburstHTTP { 

	/*
	 * Check if the WordPress HTTP API can support SSL
	 *
	 * @returns bool True if SSL is supported
	 */
	public function SSLSupport() {
		return wp_http_supports( array( 'ssl' ) );
	}

	/* 
	 * Make an HTTP POST using the WordPress HTTP API.
	 *
	 * @param string url URL to send to
	 * @param string type MIME Type of data
	 * @param string data Data to POST
	 * @return string Response returned by server
	 */
	public function Post($url, $type, $data) {
		
		$args = array(
			'body' => $data,
			'headers' => array( 'Content-Type' => 'text/xml' ),
			'timeout' => 10, // Seconds
		);

		if( stristr( $url, 'https://' ) ) {		
			$args['sslverify'] = $this->SSLVerify();
		}	

		$result = wp_remote_post( $url, $args );
		if ( is_wp_error( $result ) ) {
			error_log( "POST failed: " . $result->get_error_message() );
			throw new mediaburstException("HTTP Call failed - Error: ".$result->get_error_message());
		}

		return $result[ 'body' ];
	}

	private function SSLVerify() {

		$opt = get_option( 'mediaburst_http' );
		if( !$opt )
			$opt = array();

		if( !array_key_exists( 'sslverify', $opt ) ) {
			$args = array(
				'timeout' => 10, // Seconds
			);
			$result = wp_remote_post( $url, $args );
			if( is_wp_error( $result ) ) {
				$opt['sslverify'] = false;
			} else {
				$opt['sslverify'] = true;
			}
			update_option( 'mediaburst_http', $opt );
		}
		return $opt['sslverify'];
	}

}
