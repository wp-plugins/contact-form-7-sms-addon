<table class="widefat" style="margin-top: 1em;">
	<thead>
		<tr>
			<th scope="col" colspan="2">SMS</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="2">
				<input type="checkbox" id="wpcf7-sms-active" name="wpcf7-sms[active]" value="1" <?php echo ($sms_opt["active"]) ? 'checked="checked"' : '' ?> />
				<label for="wpcf7-sms-active"><?php _e('Send SMS alerts', 'wpcf7_sms') ?></label>
			</td>
		</tr>
		<tr class="wpcf7-sms-row">
			<td style="width: 50%;">
				<div class="mail-field">
					<label for="wpcf7-sms-phone"><?php _e('Mobile number', 'wpcf7_sms') ?>:</label><br />
					<input type="text" id="wpcf7-sms-phone" name="wpcf7-sms[phone]" class="wide" value="<?php echo esc_attr($sms_opt["phone"]) ?>" />
				</div>
				<div class="mail-field">
					<label for="wpcf7-sms-message"><?php _e('Message body', 'wpcf7_sms') ?>:</label><br />
					<textarea id="wpcf7-sms-message" name="wpcf7-sms[message]"><?php echo esc_attr($sms_opt["message"]) ?></textarea>
				</div>
			</td>
			<td style="width: 50%;">
				<div class="mail-field">
					<label for="wpcf7-sms-username"><?php _e('Mediaburst username', 'wpcf7_sms') ?>:</label><br />
					<input type="text" id="wpcf7-sms-username" name="wpcf7-sms[username]" class="wide" value="<?php echo esc_attr($sms_opt["username"]) ?>"/>
				</div>
				<div class="mail-field">
					<label for="wpcf7-sms-password"><?php _e('Mediaburst password', 'wpcf7_sms') ?>:</label><br />
					<input type="password" id="wpcf7-sms-password" name="wpcf7-sms[password]" class="wide" value="<?php echo esc_attr($sms_opt["password"]) ?>" />
				</div>
				<div class="mail-field" style="padding-top:10px;">
					<?php _e('SMS Available', 'wpcf7_sms') ?>: <?php echo $sms_credit ?> 
					<a href="https://smsapi.mediaburst.co.uk/" target="_blank" class="button-secondary"><?php _e('Buy credits', 'wpcf7_sms') ?></a>
					<a id="wpcf7-sms-test" href="<?php echo WPCF7_SMS_PLUGIN_URL.'/ajax/test-send.php'?>" class="button-secondary"><?php _e('Test', 'wpcf7_sms') ?></a>			
				</div>
				<div id="wpcf7-sms-test-result" class="mail-field" style="display: none">
				</div>
			</td>
		</tr>
		<tr>
	</tbody>
</table>
