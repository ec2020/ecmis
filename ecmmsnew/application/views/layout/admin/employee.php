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
							<h5>Employee </h5>
						</div>
						<div class="card-body">
							<!--form start -->
							<form class="form-horizontal" action="<?php echo base_url(); ?>employee/save" method="POST">
								<div class="form-group">
									<div class="row">
										<label for="emp_id" class="col-sm-3 control-label">Employee ID</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="emp_id" id="emp_id" placeholder="">
										<span class="text-danger"><?php echo form_error('emp_id'); ?></span>
										 </div>
										<div class="col-sm-3">
											<button type="button" class="btn btn-primary">Search </button>
										</div>
									</div>
								</div>
			
								<div class="form-group">
									<div class="row">
										<label for="emp_name" class="col-sm-3 control-label">Employee Name</label>
										<div class="col-sm-8">
										<input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="">
										<span class="text-danger"><?php echo form_error('emp_name'); ?></span>
									</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="emp_apt_date" class="col-sm-3 control-label">Date of First Appoinment</label>
										<div class="col-sm-4">
										<input type="date" class="form-control" name="emp_apt_date" id="emp_apt_date" >
										<span class="text-danger"><?php echo form_error('emp_apt_date'); ?></span>
									</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="emp_type" class="col-sm-3 control-label">Employee Type</label>
										<div class="col-sm-4">
										<select class="form-control" id="emp_type" name="emp_type">
										 	<option value="HOD">Exective</option>
											<option value="FRONT">User</option>
										</select>
										<span class="text-danger"><?php echo form_error('emp_type'); ?></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<label for="emp_desig" class="col-sm-3 control-label">Employee Designation</label>
										<div class="col-sm-4">
										<input type="text" class="form-control" name="emp_desig" id="emp_desig" placeholder="">
										<span class="text-danger"><?php echo form_error('emp_desig'); ?></span>
									</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="emp_dept" class="col-sm-3 control-label">Employee Department</label>
										<div class="col-sm-4">
										<select class="form-control" id="emp_dept" name="emp_dept">
											<option value="Admin">Admin</option>
											<option value="IT">IT</option>
											<option value="Planning">Planning</option>
											<option value="Secretary Office">Secretary Office</option>
										</select>
										<span class="text-danger"><?php echo form_error('emp_dept'); ?></span>
									</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label for="emp_anu_leave" class="col-sm-3 control-label">Anual Leaves</label>
										<div class="col-sm-2">
										<input type="text" class="form-control" name="emp_anu_leave" id="emp_anu_leave" placeholder="">
										<span class="text-danger"><?php echo form_error('emp_anu_leave'); ?></span>
									    </div>
										<label for="emp_cas_leave" class="col-sm-3 control-label">Casual Leaves</label>
										<div class="col-sm-2">
										<input type="text" class="form-control" name="emp_cas_leave" id="emp_cas_leave" placeholder="">
										<span class="text-danger"><?php echo form_error('emp_cas_leave'); ?></span>
									    </div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-6">
										    <button type="button" class="btn col-sm-3 btn-primary">Reset</button>
											<button type="submit" class="btn col-sm-3 btn-primary">Save</button>
										</div>
									</div><div>
								</div>
								
								</form>
							<!--form end -->
							
						</div>
					</div>
				</div>
	</div>