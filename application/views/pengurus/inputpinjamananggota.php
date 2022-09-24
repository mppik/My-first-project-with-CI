

			<div class="main-content">
				<div class="main-content-inner">
						
						<div class="breadcrumbs ace-save-state" id="breadcrumbs">
							<ul class="breadcrumb">
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="<?php echo base_url('pengurus') ?>">Home</a>
								</li>
								<li class="active"><a href="<?php echo base_url('pengurus/formpinjaman'); ?>">Form Pinjaman Anggota</a></li>
								<li>Tambah data</li>
							</ul>
						</div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/simpan_pinjaman'; ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Peminjam</label>
										<div class="input-group">
											<div class="col-sm-9">
												<select name="idanggota" id="form-field-select-1" class="idanggota" required="">
													<option value="">--- Pilih ---</option>
													<?php 
														foreach ($anggota as $key) {
															echo '<option value="'.$key->id_anggota.'">'.$key->id_anggota.' | '.$key->nama.'</option>';
														}
													 ?>
												</select>
												<input type="text" hidden="" name="kd" value="<?php echo $kd ?>">
											</div>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jabatan</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="" value="" readonly="" class="col-xs-10 col-sm-5 jbtn" name="jbtn" required="" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1" required="" >Jumlah Pinjaman</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5 jumlahpnjm" name="jumlahpnjm" required="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-11">Keterangan Pinjaman</label>
										<div class="col-sm-9">
											<textarea id="form-field-1" class="col-xs-10 col-sm-5" name="alasanpinjaman" class="autosize-transition form-control" required=""></textarea>
										</div>
									</div>
									<div class="hr hr-18 dotted hr-double"></div>
										<div class="row">
											<div class="col-sm-5">
												<div class="widget-box">
													<div class="widget-header">
														<h4 class="widget-title">Angsuran</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main no-padding">
															<br>
															<div class="form-group">
																
																<label class="col-xs-2 control-label no-padding-left" for="form-field-1">Bulan</label>

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

															<div class="form-group">
																
																<label class="col-xs-2 control-label no-padding-left" for="form-field-1">Jumlah</label>

																<input type="text" placeholder="Jumlah angsuran /bulan" class="jmlhangsuran" />
															</div>

															<div class="form-actions center">
																<button type="button" class="btn btn-sm btn-success tambah">
																	Tambah
																	<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
																</button>
															</div>
															<div class="form-group">
																
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-7">
												<div class="widget-box">
													<div class="widget-header">
														<h4 class="widget-title">Detail Angsuran</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															<table class="table" id="tableID">
																<thead>
																	<tr>
																		<th class="center">Bulan</th>
																		<th class="center">Jumlah</th>
																	</tr>
																</thead>
																<tbody class="dttableangsuran">
																</tbody>
															</table>
														</div>
													</div>
												</div>
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
											<input type="text" required="" hidden class="goib2" required="">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

<script>


	$('.idanggota').change(function(){
		$('.jbtn').val('');
		var form_data = new FormData();
		form_data.append('idanggota',$('.idanggota').val());
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/changejbtnpinjaman',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	for(var i in obj.dt){
            		$('.jbtn').val(obj.dt[i].jabatan);
            	}
			}
		})
	})

	$('.jumlahpnjm').keyup(function(){
		$('.dttableangsuran').empty()
	});

	$('.tambah').click(function(){
		bulan = $('.jd1').val()
		bulan2 = $('.jd1 option:selected').text();
		var b = $('.jmlhangsuran').val();
		var sum = 0
		var cobaya = 0
		$('.price').each(function(){
			var value = $(this).text();
			sum+=parseInt(value)
		})
		
		cobaya = parseInt($('[name="jumlahpnjm"]').val()) - sum
		var table = $('.table tbody')
		var bulannich = '';
		table.find('tr').each(function(i,el){
			var tds = $(this).find('td')
			 bulannich  += tds.eq(0).text()+','
		})
		if (sum < $('[name="jumlahpnjm"]').val()) {
			if(parseInt(b) <= parseInt($('[name="jumlahpnjm"]').val())&&parseInt(b)<=parseInt(cobaya)) {
				var data = '<tr>'+
					'<td class="center bulannich">'+bulan2+'<input type="hidden" name="bulan[]" value="'+bulan+'"/></td>'+
					'<td class="center price">'+parseInt(b)+'<input type="hidden" name="jmlhangsuran[]" value="'+b+'"/></td>'+
					'<td class="center"><a href="#" onclick="remove(this)"><span class="glyphicon glyphicon-remove"></span></a></td>'+
					'</tr>'
				$('.table tbody').append(data)
				var staryt = bulannich.split(",");
				for (var i = 0; i < staryt.length - 1; i++) {
					if(bulan2==staryt[i]){
						var tablenew = document.getElementById('tableID')
						var rowcount = tablenew.rows.length
						var minus = (rowcount -1)
						tablenew.deleteRow(minus)
						alert('Data tidak falid')
					}
				}
			}
			else{
				alert('Data tidak falid')
			}
		}
		else{
			alert('Data tidak falid')
		}
		

		var sum2 = 0
		var cobaya2 = 0
		$('.price').each(function(){
			var value2 = $(this).text();
			sum2+=parseInt(value2)
		})
		
		cobaya2 = parseInt($('[name="jumlahpnjm"]').val()) - sum2
		if (cobaya2==0){
			$('.goib2').val('done')
		}
		else{
			$('.goib2').empty()
		}
	})
	function remove(row){
		$(row).closest('tr').remove();
		var sum = 0
		var cobaya = 0
		$('.price').each(function(){
			var value = $(this).text();
			sum+=parseInt(value)
		})
		cobaya = parseInt($('[name="jumlahpnjm"]').val()) - sum
		if (cobaya==0){
			$('.goib2').val('done')
		}
		else{
			$('.goib2').val('')
		}
	}
</script>
