
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php  echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/ace.min.css" />


		<link rel="stylesheet" href="<?php  echo base_url() ?>assets/css/ace-rtl.min.css" />
		<link rel="icon" href="<?php echo base_url() ?>assets/images/avatars/logop3i.png" type="image/png">
		<script src="<?php  echo base_url() ?>assets/js/ace-extra.min.js"></script>
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="blue">Koperasi</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Editor By Mpik</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

														<?php 
														$msg = $this->session->flashdata('err_message');
															if (isset($msg)) {
																echo '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert">
																	<i class="ace-icon fa fa-times"></i>
																</button>
																	'.$this->session->flashdata('err_message').'
																<br />
															</div>';
															}
															$this->session->unset_userdata('err_message')
														?>
											<form action="<?php echo base_url().'login/cek_login'; ?>" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username"  name="username" required="" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->
										<div class="toolbar clearfix">
											<div>
												<a href="#" class="forgot-password-link">
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<script src="<?php  echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="<?php  echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<script src="<?php  echo base_url() ?>assets/js/wizard.min.js"></script>
		<script src="<?php  echo base_url() ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php  echo base_url() ?>assets/js/select2.min.js"></script>

		<script src="<?php  echo base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php  echo base_url() ?>assets/js/ace.min.js"></script>
		
	</body>
</html>
