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
});
