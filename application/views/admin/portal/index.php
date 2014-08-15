<div class="admin-box">

	<?php echo form_open(); ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
                        <!-- <th class="column-check"><input class="check-all" type="checkbox" /></th> -->
						<th>Programmes</th>
						<th>Admission Requirements</th>
						<th>Duration &amp; Fees</th>
					</tr>
				</thead>
				<!-- <tfoot>
                    <tr>
                        <td colspan="4">
                            With selected:
                            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                        </td>
                    </tr>
                </tfoot> -->
                <tbody>
					<?php $header_written = FALSE; ?>
					<?php if (isset($departments) && is_array($departments) && count($departments)) : ?>
						<?php foreach($departments as $department) : ?>
							<?php foreach($fees as $fee => $f): ?>
								<?php
									if (in_array($department->department_title, $f))
									{
										if (!$header_written)
										{
											echo "<tr style='background:#E2E2E2'><th colspan='3'>" . $f['department_title'] . "</th></tr>";
										} 
										// $html =  '<tr><td><input type="checkbox" name="checked[]" value="' . $f['id'] . '" /></td>';
										$html = '<tr><td>' . anchor(SITE_AREA .'/portal/create', $f['programmes']) .'</td>';
										// $html = '<tr><td><a href="' . site_url('admin/portal/create')  . '">'.$f['programmes'].'</a></td>'; 
										$html .= '<td>'. $f['admission'] .'</td>';
										$html .= '<td>'. $f['duration'] .'<br/>'. $f['fees'] .'</td></tr>';
										echo $html;
										$header_written = true;
									} else {
										$header_written = false;
									}  
								 ?>
							<?php endforeach; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				<tbody>
			</table>
		</div>
	<?php echo form_close(); ?>

</div>