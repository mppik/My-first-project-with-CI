

			<div class="main-content">
				<div class="main-content-inner">
						
						<div class="breadcrumbs ace-save-state" id="breadcrumbs">
							<ul class="breadcrumb">
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="<?php echo base_url('pengurus') ?>">Home</a>
								</li>
								<li class="active"><a href="<?php echo base_url('pengurus/formanggota'); ?>">Form anggota</a></li>
								<li>Tambah data anggota</li>
							</ul>
						</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/simpan_anggota'; ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama</label>

										<div class="col-sm-9">
											<input type="text" required="" id="form-field-1" placeholder="Nama Anggota"  class="col-xs-10 col-sm-5" name="nmanggota" />

											<input required="" type="text" id="form-field-1" placeholder="" value="<?php echo $id; ?>" hidden class="col-xs-10 col-sm-5" name="id" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kelamin </label>

										<div class="input-group">
											<div class="col-sm-9">
												<select name="jk" id="form-field-select-1" required="">
													<option value="">--- Pilih ---</option>
													<option value="L">Laki-Laki</option>
													<option value="P">Perempuan</option>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> No.Hp</label>

										<div class="col-sm-9">
										
											<div class="input-group">
												<span class="input-group-addon">
													<i class="ace-icon fa fa-phone"></i>
												</span>

												<input class="input-mask-phone col-xs-10 col-sm-5" type="text" id="form-field-1" name="nomor_tlp" required="" />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Jabatan"  class="col-xs-10 col-sm-5" name="jbtn" required=""/>
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


								<!-- PAGE CONTENT ENDS -->
							</div>
						</div>
					</div>
				</div>
			</div>