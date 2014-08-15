<?php if (validation_errors()) : ?>
<div class="alert alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<div class="admin-box">

	<?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

		<fieldset>
			<legend>Departments</legend>

			<div class="control-group <?php echo form_has_error('department') ? 'error' : ''; ?>">
				<label class="control-label" for="department">Department</label>
				<div class="controls">
					<input type="text" name="department" id="department" class="input-xxlarge" value="<?php echo set_value('department', isset($department) ? $department->department_title : '') ?>" />
					<span class="help-inline"><?php echo form_error('department'); ?></span>
				</div>
			</div>
		</fieldset>

		<div class="form-actions">
			<input type="submit" name="submit" class="btn btn-default" value="Save" /> or <?php echo anchor(SITE_AREA .'/settings/fees', 'Cancel'); ?>
		</div>

	<?php echo form_close(); ?>
</div>
