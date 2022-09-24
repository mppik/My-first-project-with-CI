<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Koperasi</title>
		<link rel="icon" href="<?php echo base_url() ?>assets/images/avatars/logop3i.png" type="image/png">
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />


		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
		

		
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>
		
		<script src="<?php echo base_url() ?>assets/js/autosize.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		
		<script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>

	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url().'keuangan'; ?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Simpan Pinjam Koperasi
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('username'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
																<li>
									<a href="<?php echo base_url('') ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo base_url().'keuangan'; ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Transaksi
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url('keuangan/formsimpananpokok'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Simpanan Pokok
								</a>

								<b class="arrow"></b>

								<a href="<?php echo base_url('keuangan/formsimpananwajib'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Simpanan wajib
								</a>

								<b class="arrow"></b>

								<a href="<?php echo base_url().'keuangan/formpinjaman' ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pinjaman
								</a>

								<b class="arrow"></b>


								<a href="<?php echo base_url().'keuangan/formpembayaranpinjaman'; ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pembayaran Pinjaman
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

