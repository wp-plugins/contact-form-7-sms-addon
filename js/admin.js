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
			var url = jQuery('#wpcf7-sms-test').attr('href');
			url += "?user="+encodeURIComponent(jQuery('#wpcf7-sms-username').val());
			url += "&pass="+encodeURIComponent(jQuery('#wpcf7-sms-password').val());
			url += "&to="+encodeURIComponent(jQuery('#wpcf7-sms-phone').val());

			jQuery('#wpcf7-sms-test-result').show().html('Sending test message');
			jQuery.get(url, function(data) { 
				jQuery('#wpcf7-sms-test-result').html(data);
				
			});
			return false;
		});
	} catch(e) {

	}
});
