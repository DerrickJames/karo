<?php if (validation_errors()) : ?>
<div class="alert alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<div class="admin-box">

	<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

	<fieldset>
		<legend>Make Payments</legend>

		<div class="control-group <?php echo form_has_error('programme') ? 'error' : ''; ?>">
			<label class="control-label" for="programme">Programme</label>
			<div class="controls">
				<input type="text" name="programme" id="programme" class="input-xxlarge" value="<?php echo set_value('programme', isset($payment) ? $payment->programme : '') ?>" />
				<span class="help-inline"><?php echo form_error('programme'); ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('payment_mode') ? 'error' : ''; ?>">
			<label class="control-label" for="payment_mode">Payment Mode</label>
			<div class="controls">
				<select name="payment_mode" id="payment_mode" class="input-xxlarge">
					<option value="">Select Payment Mode</option>
					<option value="M-PESA">M-PESA</option>
					<option value="BANK">BANK</option>
				</select>
				<span class="help-inline"><?php echo form_error('payment_mode'); ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('amount') ? 'error' : ''; ?>">
			<label class="control-label" for="amount">Amount</label>
			<div class="controls">
				<input type="text" name="amount" id="amount" class="input-xxlarge" value="<?php echo set_value('amount', isset($payment) ? $payment->amount : '') ?>" />
				<span class="help-inline"><?php echo form_error('amount'); ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('code') ? 'error' : ''; ?>">
			<label class="control-label" for="code">M-PESA CODE / BANK SLIP NUMBER</label>
			<div class="controls">
				<input type="text" name="code" id="code" class="input-xxlarge" value="<?php echo set_value('code', isset($payment) ? $payment->code : '') ?>"  />
				<span class="help-inline"><?php echo form_error('code') ? form_error('code') : " "; ?></span>
			</div>
		</div>

		</fieldset>

		<div class="form-actions">
			<input type="submit" name="submit" class="btn btn-default" value="Save" /> or <?php echo anchor(SITE_AREA .'/admin/portal', 'Cancel'); ?>
		</div>

	<?php echo form_close(); ?>
</div>
