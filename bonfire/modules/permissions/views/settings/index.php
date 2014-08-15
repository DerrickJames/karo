<?php

$num_columns = 5;
$has_results = isset($results) && is_array($results) && count($results);

?>
<div class="admin-box">
	<p class="intro"><?php e(lang('permissions_intro')); ?></p>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="column-check"><input class="check-all" type="checkbox" /></th>
					<th><?php echo lang('permissions_id'); ?></th>
					<th><?php echo lang('permissions_name'); ?></th>
					<th><?php echo lang('permissions_description'); ?></th>
					<th><?php echo lang('permissions_status'); ?></th>
				</tr>
			</thead>
			<?php if ($has_results) : ?>
			<tfoot>
				<tr>
					<td colspan="<?php echo $num_columns; ?>">
						<?php echo lang('bf_with_selected') ?>
						<input type="submit" name="delete" class="btn btn-danger" id="delete-me" value="<?php echo lang('bf_action_delete') ?>" onclick="return confirm('<?php e(js_escape(lang('permissions_delete_confirm'))); ?>')">
					</td>
				</tr>
			</tfoot>
			<?php endif;?>
			<tbody>
				<?php
				if ($has_results) :
					foreach ($results as $record) :
						$record = (array) $record;
				?>
				<tr>
					<td class="column-check"><input type="checkbox" name="checked[]" value="<?php echo $record['permission_id']; ?>" /></td>
					<td><?php echo $record['permission_id']; ?></td>
					<td>
						<a href="<?php echo site_url(SITE_AREA . '/settings/permissions/edit/' . $record['permission_id']); ?>">
							<?php e($record['name']); ?>
						</a>
					</td>
					<td><?php e($record['description']); ?></td>
					<td><?php e(ucfirst($record['status'])); ?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan="<?php echo $num_columns; ?>"><?php echo lang('permissions_no_records'); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php
	echo form_close();

	echo $this->pagination->create_links();
	?>
</div>