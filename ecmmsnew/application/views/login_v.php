<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo "EC-MMS" ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <style>
		.login{
			margin-top: 10%;
		}

		.form-control{
			margin-bottom: 3%;
		}

		.login_form{
			
		}

		.normal_form .form-control{
			margin-bottom: 3%;
		}
  </style>
</head>
<body>
	<div class="container-fluid">
		<div class="login">
			<div class="row justify-content-center align-items-center">
				<div class="col-md-4">
					<div class="card text-center shadow-lg">
						<div class="card-header">
							<h5>Welcome to The Election Commission Maintenance Management Syatem </h5>
						</div>
						<div class="card-body">
							
							<form class="login_form" action="<?php echo base_url(); ?>login"  method="POST">
								<div class="form-group row">
									<label for="username" class="col-sm-4 col-form-label">Username</label>
									<div class="col-sm-8">
									<input type="text" class="form-control" name="user_name" id="user_name" placeholder="Username">
									<span class="text-danger"><?php echo form_error('user_name'); ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="password" class="col-sm-4 col-form-label">Password</label>
									<div class="col-sm-8">
									<input type="password" class="form-control" name="user_pw" id="user_pw" placeholder="Password">
									<span class="text-danger"><?php echo form_error('user_pw'); ?></span>
									</div>
								</div>
								<?php if(isset($db_err)){					
								echo "<span class='text-danger'>".$db_err."</span>";
							}
							?>
								<button type="submit" class="btn btn-primary btn-user btn-block">
                     			Login
                    			</button> 
							</form>
						</div>
						<div class="card-footer text-muted">
							<h6 style="font-size:8px">Copyright © 2019, Election Commision , Sri Lanka. All rights reserved. | Version 0.1.0 Alfa</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>