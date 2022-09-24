<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('keuangan') ?>">Home</a>
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
						<a href="<?php echo base_url().'keuangan/forminptpinjamananggota'; ?>" class="btn btn-success">Tambah Data</i></a>
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
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$nol=0;
									foreach ($pinjaman as $key) {
										$nol =$nol+1;
										echo '<tr>';
											echo '<td>'.$nol.'</td>';
											echo '<td>'.$key->id_anggota.'</td>';
											foreach ($this->modelkeuangan->changejbtnpinjaman($key->id_anggota) as $z) {
												echo '<td>'.$z->nama.'</td>';
											}
											echo '<td>'.$key->tanggal.'</td>';
											echo '<td>Rp '.number_format($key->jumlah).'</td>';
											echo '<td><a href="#my-modal" onclick="detail(this)" data-toggle="modal" data-id="'.$key->id_pinjm.'">Detail</a></td>';
											echo '<td class="center"><a class="toblohapus" href="'.base_url().'keuangan/del_pinjaman/'.$key->id_pinjm.'">Delete</a></td>';
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
</div>
<script type="text/javascript">
	function detail(row){
		$('#totalpinjm').val('')
		var form_data = new FormData();
		form_data.append('idanggota',$(row).attr("data-id"));
		$.ajax({
			url:'<?php echo base_url() ?>keuangan/getdatapinjamanwhere',
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
            	}
            	for (var i in obj.detailpinjam) {
            		var selectedmonth = months[obj.detailpinjam[i].bulan]
            	print += '<tr>'
								+'<td>'+obj.detailpinjam[i].jumlah+'</td>'
								+'<td>'+selectedmonth+'</td>'
								+'<td>'+obj.detailpinjam[i].tahun+'</td>'
								+'</tr>';
            	}
        		$('.totalpinjm').val(jumlah_pinjaman);
            	$('.lamangsur').val(obj.jumlah.length+' Bulan')
            	$('.yangdiganti').empty()
            	$('.yangdiganti').append(print)
			}
		})
	}
</script>