<div class="container-fluid">
<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success" role="alert">
					<h3>
						<?php echo $this->session->flashdata('success'); ?>
					</h3>
					</div>
	<?php } ?>
	<?php if ($this->session->flashdata('fail')) { ?>
					<div class="alert alert-success" role="alert">
					<h3>
						<?php echo $this->session->flashdata('fail'); ?>
					</h3>
					</div>
	<?php } ?>

			<div class="row justify-content-center align-items-center">
				<div class="col-md-10">
					<div class="card text-center ">
						<div class="card-header">
							<h5>Change Password </h5>
						</div>
						<div class="card-body">
							<!--form start -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>password/change" method="POST">
								<div class="form-group">
									<div class="row">
										<label for="halltitle" class="col-sm-3 control-label">New Password</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" id="pw" name="pw"  placeholder="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="halltitle" class="col-sm-3 control-label">Retype New Password</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" id="pw1" name="pw1" placeholder="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-10">
										<?php echo $cap['image']; ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
									<div class="col-sm-3"></div>
										<div class="col-sm-4">
										<label for="halltitle" class=" control-label">Please enter above text </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="hall_title" id="hall_title" placeholder="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-9"></div>
										<div class="col-sm-3">
											<button type="submit" class="btn btn-primary">Save</button>
										</div>
									</div><div>
								</div>
								
								</form>
							<!--form end -->
							
						</div>
					</div>
				</div>
			</div>

	</div>