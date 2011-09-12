<table class="widefat" style="margin-top: 1em;">
	<thead>
		<tr>
			<th scope="col" colspan="2">SMS</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="2">
				<!-- TODO: make this checkbox work -->
				<input type="checkbox" id="wpcf7-sms-active" name="wpcf7-sms[active]" value="1" <?php echo ($sms_opt["active"]) ? 'checked="checked"' : '' ?> />
				<label for="wpcf7-sms-active">Send SMS alerts</label>
			</td>
		</tr>
		<tr class="wpcf7-sms-row">
			<td style="width: 50%;">
				<div class="mail-field">
					<label for="wpcf7-sms-phone">Mobile number:</label><br />
					<input type="text" id="wpcf7-sms-phone" name="wpcf7-sms[phone]" class="wide" value="<?php echo esc_attr($sms_opt["phone"]) ?>" />
				</div>
				<div class="mail-field">
					<label for="wpcf7-sms-message">Message body:</label><br />
					<textarea id="wpcf7-sms-message" name="wpcf7-sms[message]"><?php echo esc_attr($sms_opt["message"]) ?></textarea>
				</div>
			</td>
			<td style="width: 50%;">
				<div class="mail-field">
					<label for="wpcf7-sms-username">Mediaburst username:</label><br />
					<input type="text" id="wpcf7-sms-username" name="wpcf7-sms[username]" class="wide" value="<?php echo esc_attr($sms_opt["username"]) ?>"/>
				</div>
				<div class="mail-field">
					<label for="wpcf7-sms-password">Mediaburst password:</label><br />
					<input type="password" id="wpcf7-sms-password" name="wpcf7-sms[password]" class="wide" value="<?php echo esc_attr($sms_opt["password"]) ?>" />
				</div>
				<div class="mail-field">
					SMS Available: <?php echo $sms_credit ?><br /><a href="https://smsapi.mediaburst.co.uk/" target="_blank">Buy credits</a>
				</div>
			</td>
		</tr>
		<tr>
	</tbody>
</table>
