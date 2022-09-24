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
					<h3 class="header smaller lighter blue">Form Data Anggota</h3>

					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						<a href="<?php echo base_url().'pengurus/inputanggota'; ?>" class="btn btn-success">Tambah Data <i class="ace-icon glyphicon glyphicon-plus"></i></a>
					</div>

					<div>
						<table id="myTable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Id</th>
									<th>Nama</th>
									<th>JK</th>
									<th>No HP</th>
									<th>Jabatan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no=0;
									foreach ($data as $key) {
										$no=$no+1;
										echo "<tr>";
											echo '<td>'.$no.'</td>';
											echo '<td>'.$key->id_anggota.'</td>';
											echo '<td>'.$key->nama.'</td>';
											if ($key->jk == 'L') {
												echo '<td>Laki-Laki</td>';
											}
											else{
												echo '<td>Perempuan</td>';
											}
											echo '<td>'.$key->nomor_telepon.'</td>';
											echo '<td>'.$key->jabatan.'</td>';

											echo '<td class="center"><a href="#my-modal" onclick="edit(this)" data-toggle="modal" data-id="'.$key->id_anggota.'">Edit</a>|<a class="toblohapus" href="'.base_url().'pengurus/del_anggota/'.$key->id_anggota.'">Delete</a></td>';
											// echo '<td class="center"><a href="#my-modal" onclick="edit(this)" data-toggle="modal" data-id="'.$key->id_anggota.'">Edit</a>|<a class="toblohapus" href="'.base_url().'pengurus/del_anggota/">Delete</a></td>';
										echo "</tr>";
									}
								 ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="my-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="smaller lighter blue no-margin">Form Edit</h3>
				</div>

				<div class="modal-body">
						<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/upda_anggota'; ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Nama Anggota"  class="nmanggota col-xs-10 col-sm-5" name="nmanggota" required="" />

											<input type="text" id="form-field-1" placeholder="" value="" hidden class="col-xs-10 col-sm-5 id" name="id" required="" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis Kelamin </label>

										<div class="input-group">
											<div class="col-sm-9">
												<select name="jk" id="form-field-select-1" class="jk" required="">
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

												<input class="input-mask-phone col-xs-10 col-sm-5 nomor_tlp" type="text" id="form-field-1" name="nomor_tlp" required="" />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jabatan</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="Jabatan" class="col-xs-10 col-sm-5 jbtn" name="jbtn" required="" />
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

				<div class="modal-footer">
					<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Close
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function edit(row){
		var form_data = new FormData();
		form_data.append('idanggota',$(row).attr("data-id"));
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/showdataeditanggota',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var change=''
            	var jk = '';
            	for(var i in obj.show){
            		jk = obj.show[i].jk
        			$('.nmanggota').val(obj.show[i].nama)
        			$('.nomor_tlp').val(obj.show[i].nomor_telepon)
        			$('.jbtn').val(obj.show[i].jabatan)
        			$('.id').val(obj.show[i].id_anggota)
            	}
            	var jeniskelamin = new Array()
            	jeniskelamin = ['Laki-Laki','Perempuan']
            	if (jk=='L') {
            		jk = '1'
            	}
            	else{
            		jk = '2'
            	}
            	if(jk=='1'){
            		change = '<option value="">--- Pilih ---</option>'
								+'<option value="L" selected>Laki-Laki</option>'
								+'<option value="P">Perempuan</option>'
            	}
            	else{
            		change = '<option value="">--- Pilih ---</option>'
								+'<option value="L">Laki-Laki</option>'
								+'<option value="P" selected>Perempuan</option>'
            	}
            	$('.jk').empty();
            	$('.jk').append(change);
			}
		})
	}
</script>