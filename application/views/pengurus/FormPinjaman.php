<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pengurus') ?>">Home</a>
				</li>
				<li class="active">Form Pinjaman Anggota<li>
			</ul>
		</div>	
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Form Pinjaman Anggota</h3>

					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						<a href="<?php echo base_url().'pengurus/forminptpinjamananggota'; ?>" class="btn btn-success">Tambah Data</i></a>
					</div>

					<div>
						<table id="myTable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Anggota</th>
									<th>Nama</th>
									<th>Tanggal Pinjaman</th>
									<th>Jumlah Pinjaman</th>
									<th>Sisa Pinjaman</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$nol=0;
									foreach ($pinjaman as $key) {
									$sisa = '';
										$nol =$nol+1;
										echo '<tr>';
											echo '<td>'.$nol.'</td>';
											echo '<td>'.$key->id_anggota.'</td>';
											foreach ($this->modelpengurus->changejbtnpinjaman($key->id_anggota) as $z) {
												echo '<td>'.$z->nama.'</td>';
											}
											echo '<td>'.$key->tanggal.'</td>';
											echo '<td>Rp '.number_format($key->jumlah).'</td>';
											if($this->modelpengurus->sisapinjaman($key->id_pinjm)){
												foreach ($this->modelpengurus->sisapinjaman($key->id_pinjm) as $z) {
														$sisa = $z->jumlah- $key->jumlah;
												}
											}
											else{
												$sisa = $key->jumlah;
											}
											echo '<td>Rp '.number_format($sisa).'</td>';
											echo '<td><a href="#my-modal" onclick="detail(this)" data-toggle="modal" data-id="'.$key->id_pinjm.'">Detail</a></td>';
											echo '<td class="center"><a href="#my-modaledit" onclick="edit(this)" data-toggle="modal" data-id="'.$key->id_pinjm.'">Edit</a>|<a class="toblohapus" href="'.base_url().'pengurus/del_pinjaman/'.$key->id_pinjm.'">Delete</a></td>';
										echo '</tr>';
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
						<h3 class="smaller lighter blue no-margin">Detail Pinjaman</h3>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label for="">Total Pinjaman :</label>
							<input type="text" id="form-field-1" class="totalpinjm" readonly="" />
						</div>
						<div class="form-group">
							<label for="">Lama Angsuran :</label>
							<input type="text" id="form-field-1" class="lamangsur" readonly="" />
						</div>
						<div class="form-group">
							<label for="">Detail :</label>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th>Angsuran</th>
									<th>Bulan</th>
									<th>Tahun</th>
								</tr>
							</thead>
							<tbody class="yangdiganti">
								
							</tbody>
						</table>
					</div>

					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
							<i class="ace-icon fa fa-times"></i>
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<div id="my-modaledit" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="smaller lighter blue no-margin">Form Edit</h3>
					</div>

					<div class="modal-body">
						<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/upda_pinjaman'; ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Peminjam</label>
								<div class="input-group">
									<div class="col-sm-9">
										<input type="text" class="nama" readonly="" value="">
										<input type="hidden" class="kd" name="kd" value="">
										<input type="hidden" class="idanggota" name="idanggota" value="">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jabatan</label>

								<div class="col-sm-9">
									<input type="text" id="form-field-1" placeholder="" value="" readonly="" class="col-xs-10 col-sm-5 jbtn" name="jbtn" />
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
									<textarea id="form-field-1" class="col-xs-10 col-sm-5" name="alasanpinjaman" class="autosize-transition form-control"></textarea>
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
														
														<label class="col-xs-4 control-label no-padding-left" for="form-field-1">Bulan</label>

														<select id="form-field-select-1" name="jd1" class="jd1">
															<option value="">--- Pilih Bulan ---</option>
															<?php 

																$bulan = array(
																	'01' => 'Januari',
																	'02' => 'Februari',
																	'03' => 'Maret',
																	'04' => 'April',
																	'05' => 'Mei',
																	'06' => 'Juni',
																	'07' => 'Juli',
																	'08' => 'Agustus',
																	'09' => 'September',
																	'10' => 'Oktober',
																	'11' => 'November',
																	'12' => 'Desember',
																);
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
														
														<label class="col-xs-4 control-label no-padding-left" for="form-field-1">Jumlah</label>

														<input type="text" placeholder="Jumlah angsuran /bulan" class="jmlhangsuran col-xs-7" />
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
													<table class="table tablenich" id="tableID">
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
									<input type="text" class="goib2" required="" hidden="">
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
</div>
<script type="text/javascript">
	function detail(row){
		$('#totalpinjm').val('')
		var form_data = new FormData();
		form_data.append('idanggota',$(row).attr("data-id"));
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/getdatapinjamanwhere',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var jumlah_pinjaman = ''
            	var print =''
            	var ribuan =''
            	// var months = ['January','February','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
            	var months = new Array();
            	months['01'] = 'January'
            	months['02'] = 'February'
            	months['03'] = 'Maret'
            	months['04'] = 'April'
            	months['05'] = 'Mei'
            	months['06'] = 'Juni'
            	months['07'] = 'Juli'
            	months['08'] = 'Agustus'
            	months['09'] = 'September'
            	months['10'] = 'Oktober'
            	months['11'] = 'November'
            	months['12'] = 'Desember'
            	for(var i in obj.dataanggota){
            		jumlah_pinjaman = obj.dataanggota[i].jumlah
            	}
            	for (var i in obj.detailpinjam) {
            		var selectedmonth = months[obj.detailpinjam[i].bulan]
            	 	if(obj.detailpinjam[i].jumlah){
	            	 	var reverse = obj.detailpinjam[i].jumlah.toString().split('').reverse().join(''),
	            	 		ribuan = reverse.match(/\d{1,3}/g)
	            	 		ribuan = 'Rp '+ribuan.join(',').split('').reverse().join('')
            	 	}
            			print += '<tr>'
								+'<td>'+ribuan+'</td>'
								+'<td>'+selectedmonth+'</td>'
								+'<td>'+obj.detailpinjam[i].tahun+'</td>'
								+'</tr>';
            	}

        	 	var reverse2 = jumlah_pinjaman.toString().split('').reverse().join(''),
        	 		ribuan2 = reverse2.match(/\d{1,3}/g)
        	 		ribuan2 = 'Rp '+ribuan2.join(',').split('').reverse().join('')
        		$('.totalpinjm').val(ribuan2);
            	$('.lamangsur').val(obj.jumlah.length+' Bulan')
            	$('.yangdiganti').empty()
            	$('.yangdiganti').append(print)
			}
		})
	}
</script>

<script type="text/javascript">
	function edit(row){
		$('#totalpinjm').val('')
		var form_data = new FormData();
		form_data.append('idanggota',$(row).attr("data-id"));
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/editdatapinjamancontroller',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var jumlah_pinjaman = ''
            	var print =''

            	// var months = ['January','February','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
            	var months = new Array();
            	months['01'] = 'January'
            	months['02'] = 'February'
            	months['03'] = 'Maret'
            	months['04'] = 'April'
            	months['05'] = 'Mei'
            	months['06'] = 'Juni'
            	months['07'] = 'Juli'
            	months['08'] = 'Agustus'
            	months['09'] = 'September'
            	months['10'] = 'Oktober'
            	months['11'] = 'November'
            	months['12'] = 'Desember'
            	for(var i in obj.dataanggota){
            		jumlah_pinjaman = obj.dataanggota[i].jumlah	
            		$('.nama').val(obj.dataanggota[i].nama);
            		$('[name="idanggota"]').val(obj.dataanggota[i].id_anggota);
	        		$('.kd').val(obj.dataanggota[i].id_pinjm);
	        		$('[name="alasanpinjaman"]').val(obj.dataanggota[i].alasan);
	        		$('.jbtn').val(obj.dataanggota[i].jabatan);
            	}
            	for (var i in obj.detailpinjam) {
            		var selectedmonth = months[obj.detailpinjam[i].bulan]
            			print += '<tr>'
								+'<td class="center bulannich">'+selectedmonth+'<input type="hidden" name="bulan[]" value="'+obj.detailpinjam[i].bulan+'"/></td>'
								+'<td class="center price">'+obj.detailpinjam[i].jumlah+'<input type="hidden" name="jmlhangsuran[]" value="'+obj.detailpinjam[i].jumlah+'"/></td>'
								+'<td class="center"><a href="#" onclick="remove(this)"><span class="glyphicon glyphicon-remove"></span></a></td>'+
								+'</tr>';
            	}
        		$('.jumlahpnjm').val(jumlah_pinjaman);
            	$('.tablenich tbody').empty()
            	$('.tablenich tbody').append(print)
				$('.goib2').val('done')
			}
		})
	}

	function remove(row){$(row).closest('tr').remove();
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

	$('.tambah').click(function(){
		bulan = $('.jd1').val()
		bulan2 = $('.jd1 option:selected').text();
		var b = $('.jmlhangsuran').val();
		var sum = 0
		var cobaya = 0
		var table = $('.tablenich tbody')
		var bulannich = '';
		
		$('.price').each(function(){
			var value = $(this).text();
			sum+=parseInt(value)
		})
		
		cobaya = parseInt($('[name="jumlahpnjm"]').val()) - sum
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
				$('.tablenich tbody').append(data)
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
	
</script>