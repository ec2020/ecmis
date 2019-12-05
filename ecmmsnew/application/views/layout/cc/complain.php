<div class="container-fluid">
				<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success" role="alert">
					<h3>
						<?php echo $this->session->flashdata('success'); ?>
					</h3>
					</div>
				<?php } ?>
				<?php if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger" role="alert">
					<h3>
						<?php echo $this->session->flashdata('error'); ?>
					</h3>
					</div>
				<?php } ?>
			<div class="row justify-content-center align-items-center">
				<div class="col-sm-10">
					<div class="card text-center ">
						<div class="card-header">
							<h5>Add Your Maintainance Need </h5>
						</div>
						<div class="card-body">
						<!---Form start-->

						<form class="form-horizontal">
							<div class="form-group">
								<div class="row">
									<label for="cmp_tittle" class="col-sm-3 control-label">Title</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="cmp_tittle" id="cmp_tittle" placeholder="Title">
									<span class="text-danger"><?php echo form_error('cmp_tittle'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="cmp_description" class="col-sm-3 control-label">Description</label>
									<div class="col-sm-8">
									<textarea class="form-control" name="cmp_description" id="cmp_description" placeholder="Description"></textarea>
									<span class="text-danger"><?php echo form_error('cmp_description'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="cmp_location" class="col-sm-3 control-label">Location</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="cmp_location" id="cmp_location" placeholder="Location">
									<span class="text-danger"><?php echo form_error('cmp_location'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<label for="cmp_img" class="col-sm-3 control-label">Image</label>
									<div class="col-sm-4">
									<input type="file" class="form-control" name="cmp_img" id="cmp_img" placeholder="">
									<span class="text-danger"><?php echo form_error('cmp_img'); ?></span>
								</div>
							</div>
						</form>

						<!---Form close--->
						</div>
					</div>
				</div>
			</div>