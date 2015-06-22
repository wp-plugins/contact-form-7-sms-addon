<div id="sms-sortables" class="meta-box-sortables ui-sortable">
<h3>SMS Notifications</h3>
<fieldset>
<legend>In the following fields, you can use these tags:<br />
	<?php $data['form']->suggest_mail_tags(); ?>
</legend> 
<table class="form-table">
	<tbody>
	<tr>
		<th scope="row">
		  	<label for="wpcf7-sms-recipient">To:</label>
		</th>
		<td>
		  	<input type="text" id="wpcf7-sms-recipient" name="wpcf7-sms[phone]" class="wide" size="70" value="<?php echo $data['phone']; ?>">
		</td>
	</tr>

	<tr>
		 <th scope="row">
			<label for="wpcf7-mail-body">Message body:</label>
		</th>
		<td>
			<textarea id="wpcf7-mail-body" name="wpcf7-sms[message]" cols="100" rows="6" class="large-text code"><?php echo $data['message']; ?></textarea>
		</td>
	</tr>
	</tbody>
</table>
</fieldset>
