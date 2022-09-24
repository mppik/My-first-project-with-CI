<div class="main-content">
	<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo base_url('keuangan') ?>">Home</a>
					</li>
					<li class="active"><a href="<?php echo base_url('keuangan/formsimpananpokok'); ?>">Form Simpanan Pokok</a></li>
					<li>Tambah data</li>
				</ul>
			</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<form class="form-horizontal" role="form" action="<?php echo base_url().'keuangan/simpan_simpokok'; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Anggota</label>

							<div class="input-group">
								<div class="col-sm-12">
									<select name="idanggota" id="form-field-select-1" required="">
										<option value="">--- Pilih ---</option>
										<?php 
											foreach ($idanggota as $key) {
												echo '<option value="'.$key->id_anggota.'">'.$key->id_anggota.' | '.$key->nama.'</option>';
											}
										 ?>
									</select>
								<input type="text" id="form-field-1" placeholder="Nama Anggota" hidden=""  class="col-xs-10 col-sm-5" name="id" value="<?php echo $id; ?>" />
								</div>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jumlah</label>

							<div class="col-sm-5">
								<input type="text" id="form-field-1" placeholder=""  class="col-xs-10 col-sm-5" name="jmlh" required="" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal</label>

							<div class="col-sm-3">
								<input type="date" id="form-field-1" placeholder=""  class="col-xs-10 col-sm-5" name="tgl" required="" />
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Simpan
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>