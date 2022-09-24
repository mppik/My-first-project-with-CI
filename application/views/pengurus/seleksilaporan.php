<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pengurus') ?>">Home</a>
				</li>
				<li class="active">Form Anggota<li>
			</ul>
		</div>	
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Laporan Koperasi</h3>

				<div class="clearfix">
					<div class="pull-right tableTools-container"></div>
				</div>
				<form action="" method="post">
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-2">
								<select id="form-field-select-1" name="bulan" class="jd1">
									<option value="">--- Pilih Bulan ---</option>
									<?php 
										foreach ($bulan as $key => $value) {
											if($key==date('m')){
												echo '<option value="'.date('m').'" selected>'.$value.'</option>';
											}
											else{
												echo '<option value="'.$key.'">'.$value.'</option>';
											}
										}
									 ?>
								</select>
							</div>
							<div class="col-xs-2">
								<select id="form-field-select-1" class="jd2" name="tahun">
									<option value="">--- Pilih Tahun ---</option>
									<?php 
										$nol = 2016;
											for ($i=0; $i < 30; $i++) { 
												$nol = $nol+1;
												if($nol==date('Y')){
													echo '<option value="'.date('Y').'" selected>'.date('Y').'</option>';
												}
												else{
													echo '<option value="'.$nol.'">'.$nol.'</option>';
												}
											}
										 ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-12">
								<br>
								<button type="submit" formaction="<?php echo base_url('laporan') ?>" class="btn btn-info col-xs-4" style="border-radius: 4px" formtarget="_blank">Print
							<i class="menu-icon fa fa-print"></i></button>
							</div>
						</div>
					</div>
				</form>

				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Laporan Peranggota</h3>

				<div class="clearfix">
					<div class="pull-right tableTools-container"></div>
				</div>
				<form action="" method="post">
					<div class="row">
						<div class="col-xs-12">
							<div class="col-xs-2">
								<select id="form-field-select-1" name="idanggota">
									<option value="">--- Pilih Anggota ---</option>
									<?php 
										foreach ($anggota as $key) {
											echo '<option value="'.$key->id_anggota.'">'.$key->id_anggota.'|'.$key->nama.'</option>';
										}
									 ?>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-12">
								<br>
								<button type="submit" formaction="<?php echo base_url('laporan/anggota') ?>" class="btn btn-info col-xs-4" style="border-radius: 4px" formtarget="_blank">Print
							<i class="menu-icon fa fa-print"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>