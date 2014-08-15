<?php if (validation_errors()) : ?>
<div class="alert alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<div class="admin-box">

	<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

	<fieldset>
		<legend>Prospectus</legend>

		<div class="control-group <?php echo form_has_error('department') ? 'error' : ''; ?>">
			<label class="control-label" for="department">Department</label>
			<div class="controls">
				<select name="department" id="department" class="input-xxlarge">
					<option value="">Select Department</option>
					<?php if (isset($departments)) : ?>
						<?php foreach($departments as $department) : ?>
							<option value="<?php e($department->id); ?>"><?php e($department->department_title); ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
				<span class="help-inline"><?php echo form_error('department'); ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('programme') ? 'error' : ''; ?>">
			<label class="control-label" for="programme">Programme</label>
			<div class="controls">
				<input type="text" name="programme" id="programme" class="input-xxlarge" value="<?php echo set_value('programme', isset($fee) ? $fee->programmes : '') ?>" />
				<span class="help-inline"><?php echo form_error('programme'); ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('admission') ? 'error' : ''; ?>" style="vertical-align: top">
			<label class="control-label" for="admission">Admission</label>
			<div class="controls">
				<textarea name="admission" id="admission" rows="3" class="input-xxlarge"><?php echo set_value('admission', isset($fee) ? $fee->admission : '') ?></textarea>
				<span class="help-inline"><?php echo form_error('admission') ? form_error('admission') : ""; ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('fees') ? 'error' : ''; ?>">
			<label class="control-label" for="duration">Duration</label>
			<div class="controls">
				<input type="text" name="duration" id="duration" class="input-xxlarge" value="<?php echo set_value('duration', isset($fee) ? $fee->duration : '') ?>"  />
				<span class="help-inline"><?php echo form_error('duration') ? form_error('duration') : " "; ?></span>
			</div>
		</div>

		<div class="control-group <?php echo form_has_error('fees') ? 'error' : ''; ?>">
			<label class="control-label" for="fees">Fees</label>
			<div class="controls">
				<input type="text" name="fees" id="fees" class="input-xxlarge" value="<?php echo set_value('fees', isset($fee) ? $fee->fees : '') ?>"  />
				<span class="help-inline"><?php echo form_error('fees') ? form_error('fees') : " "; ?></span>
			</div>
		</div>

		</fieldset>

		<div class="form-actions">
			<input type="submit" name="submit" class="btn btn-default" value="Save" /> or <?php echo anchor(SITE_AREA .'/settings/fees', 'Cancel'); ?>
		</div>

	<?php echo form_close(); ?>
</div>
