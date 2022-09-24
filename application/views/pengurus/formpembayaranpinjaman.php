			<div class="main-content">
				<div class="main-content-inner">
						<div class="breadcrumbs ace-save-state" id="breadcrumbs">
							<ul class="breadcrumb">
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="<?php echo base_url('pengurus') ?>">Home</a>
								</li>
								<li class="active">Form Pembayaran Pinjaman<li>
							</ul>
						</div>
					<form action="<?php echo base_url().'pengurus/simpanpembpinjaman' ?>" method="post">		
						<div class="page-content">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="header smaller lighter blue">Pembayaran Pinjaman</h3>

									<div class="row">
										<div class="col-xs-12">
											<div class="col-xs-2">
												<select id="form-field-select-1" name="jd1" class="jd1">
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
												<select id="form-field-select-1" class="jd2" name="jd2">
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
									</div>
									
									<div class="clearfix">
										<div class="pull-right tableTools-container"></div>
									</div>
									<div class="table-header">
										<button class="btn btn-success">Simpan</button>
									</div>

									<div>
										<table id="myTable" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<td></td>
													<th>No</th>
													<th>Id Anggota</th>
													<th>Nama Anggota</th>
													<th>Jumlah</th>
												</tr>
											</thead>
											<tbody class="isitabl">
												<?php  
												$nol = 0;
													foreach ($pmbyaran as $key) {
													$nol =$nol+1;
														echo '<tr>';
															echo '<td class="center">
																	<label class="pos-rel">
																		<input type="checkbox" class="ace" name="id_ktpinjm[]" value="'.$key->id_ktpinjm.'"/>
																		<span class="lbl"></span>
																	</label>
																</td>';
															echo '<td>'.$nol.'</td>';
															echo '<td>'.$key->id_anggota.'</td>';
															echo '<td>'.$key->nama.'</td>';
															echo '<td>Rp '.number_format($key->jumlah).'</td>';
														echo '</tr>';
													}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

<script>
	$('.jd1').change(function(){
		var form_data = new FormData();
		form_data.append('bulan',$('.jd1').val());
		form_data.append('tahun',$('.jd2').val());
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/changepembayaransimpananwajib',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var print =''
            	var ktping = ''
            	var nol = 0;
            	var ribuan = ''
            	for(var i in obj.tmpil){
            		nol = nol+1
            		ktping = obj.tmpil[i].id_ktpinjm
            	 	if(obj.tmpil[i].jumlah){
	            	 	var reverse = obj.tmpil[i].jumlah.toString().split('').reverse().join(''),
	            	 		ribuan = reverse.match(/\d{1,3}/g)
	            	 		ribuan = 'Rp '+ribuan.join(',').split('').reverse().join('')
            	 	}
            		print += '<tr>'
			       			 +'<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" name="id_ktpinjm[]" value="'+obj.tmpil[i].id_ktpinjm+'"/><span class="lbl"></span></label></td>'
			       			 +'<td>'+nol+'</td>'
			       			 +'<td>'+obj.tmpil[i].id_anggota+'</td>'
			       			 +'<td>'+obj.tmpil[i].nama+'</td>'
			       			 +'<td>'+ribuan+'</td>'
			        		+'</tr>';
            	}
            	$('#myTable').DataTable().destroy()
            	$('#myTable tbody').empty()
            	$('#myTable tbody').append(print)
            	$('#myTable').DataTable()
			}
		})
	})
	$('.jd2').change(function(){
		var form_data = new FormData();
		form_data.append('bulan',$('.jd1').val());
		form_data.append('tahun',$('.jd2').val());
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/changepembayaransimpananwajib',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var print =''
            	var ktping = ''
            	var nol = 0;
            	var ribuan = ''	
            	for(var i in obj.tmpil){
            		nol = nol+1
            		ktping = obj.tmpil[i].id_ktpinjm
            	 	if(obj.tmpil[i].jumlah){
	            	 	var reverse = obj.tmpil[i].jumlah.toString().split('').reverse().join(''),
	            	 		ribuan = reverse.match(/\d{1,3}/g)
	            	 		ribuan = 'Rp '+ribuan.join(',').split('').reverse().join('')
            	 	}
            		print += '<tr>'
			       			+'<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" name="id_ktpinjm[]" value="'+obj.tmpil[i].id_ktpinjm+'"/><span class="lbl"></span></label></td>'
			       			 +'<td>'+nol+'</td>'
			       			 +'<td>'+obj.tmpil[i].id_anggota+'</td>'
			       			 +'<td>'+obj.tmpil[i].nama+'</td>'
			       			 +'<td>'+ribuan+'</td>'
			        		+'</tr>';
            	}
            	$('#myTable').DataTable().destroy()
            	$('#myTable tbody').empty()
            	$('#myTable tbody').append(print)
            	$('#myTable').DataTable()
			}
		})
	})
</script>