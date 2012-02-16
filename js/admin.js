jQuery(document).ready(function() {
	try {
		if( ! jQuery('#wpcf7-sms-active').is(':checked') )
			jQuery('tr.wpcf7-sms-row').hide();
		
		jQuery('#wpcf7-sms-active').click(function() {
			if( jQuery('#wpcf7-sms-active').is(':checked') )
				jQuery('tr.wpcf7-sms-row').show();
			else
				jQuery('tr.wpcf7-sms-row').hide();
		});
	} catch (e) {

	}

	try {
		jQuery('#wpcf7-sms-test').click(function() {
			var data = {
				action: 'test_send',
				user: jQuery('#wpcf7-sms-username').val(),
				pass: jQuery('#wpcf7-sms-password').val(),
				to: jQuery('#wpcf7-sms-phone').val()
			};
			jQuery('#wpcf7-sms-test-result').show().html('Sending test message');
			jQuery.post(ajaxurl, data, function(resp) { 
				jQuery('#wpcf7-sms-test-result').html(resp);
				
			});
			return false;
		});
	} catch(e) {

	}
});
