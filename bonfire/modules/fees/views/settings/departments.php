
<div class="admin-box">

	<?php echo form_open(); ?>
		<div class="table-responsive">
			<fieldset>
				<table class="table table-striped">
					<thead>
						<tr>
	                        <th class="column-check"><input class="check-all"  type="checkbox" /></th>
							<th>Department Title</th>
							<th style="width:10em">Date</th>
						</tr>
					</thead>
					<tfoot>
	                    <tr>
	                        <td colspan="3">
	                            With selected:
	                            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
	                        </td>
	                    </tr>
	                </tfoot>
					<tbody>
						<?php if (isset($departments) && is_array($departments) && count($departments)) : ?>
							<?php foreach($departments as $department) : ?>
								<tr>
									<td><input type="checkbox" name="checked[]" value="<?php echo $department->id ?>" /></td>
									<td><?php echo anchor(SITE_AREA .'/settings/fees/update_department/'. $department->id, $department->department_title); ?></td>
									<td><?php e($department->created_on); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="3">
									<br/>
									<div class="alert alert-warning">
										No Departments Found
									</div>
								</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</fieldset>
		</div>
	<?php echo form_close(); ?>
</div>