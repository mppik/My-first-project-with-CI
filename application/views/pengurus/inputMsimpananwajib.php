			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url('pengurus') ?>">Home</a>
							</li>
							<li class="active"><a href="<?php echo base_url('pengurus/msimpananwajib'); ?>">Form Master Simpanan Wajib</a></li>
							<li>Tambah data</li>
						</ul>
					</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/simpan_mwajib'; ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tahun</label>
										<div class="input-group">
											<div class="col-sm-9">
												<select name="thn" id="form-field-select-1" required="">
													<option value="">--- Pilih ---</option>
													<?php 
													$nol = 2016;
														for ($i=0; $i < 30; $i++) { 
															$nol = $nol+1;
															echo '<option value="'.$nol.'">'.$nol.'</option>';
														}
													 ?>
												</select>
											<input type="text" id="form-field-1" placeholder="Nama Anggota" hidden=""  class="col-xs-10 col-sm-5" name="id" value="<?php echo $id; ?>" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder=""  class="col-xs-10 col-sm-5" name="jmlh" required="" />
										</div>
									</div>
									
														<?php 
														$msg = $this->session->flashdata('err_thn_wjib');
															if (isset($msg)) {
																echo '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert">
																	<i class="ace-icon fa fa-times"></i>
																</button>
																	'.$this->session->flashdata('err_thn_wjib').'
																<br />
															</div>';
															}
															$this->session->unset_userdata('err_thn_wjib')
														?>
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