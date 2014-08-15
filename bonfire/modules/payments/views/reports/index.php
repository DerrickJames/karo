<div class="admin-box">

	<?php echo form_open(); ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
                        <!-- <th class="column-check"><input class="check-all" type="checkbox" /></th> -->
						<th>Names</th>
						<th>Programme</th>
						<th>Payment Mode</th>
						<th>Amount</th>
						<th>Code</th>
						<th>Date</th>
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
					<?php if (isset($payments) && is_array($payments) && count($payments)) : ?>
						<?php foreach($payments as $payment) : ?>
							<tr>
								<td><?php e($payment->username); ?></td>
								<td><?php e($payment->programme); ?></td>
								<td><?php e($payment->payment_mode); ?></td>
								<td><?php e($payment->amount); ?></td>
								<td><?php e($payment->code); ?></td>
								<td><?php e($payment->created_on); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				<tbody>
			</table>
		</div>
	<?php echo form_close(); ?>

</div>