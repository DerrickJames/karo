<ul class="nav nav-pills">
	<li <?php echo $this->uri->segment(4) == 'departments' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/fees/departments') ?>">Departments</a>
	</li>
	<li <?php echo $this->uri->segment(4) == 'create_department' ? 'class="active"' : '' ?>>
		<a href="<?php echo site_url(SITE_AREA .'/settings/fees/create_department') ?>">Create Department</a>
	</li>
</ul>