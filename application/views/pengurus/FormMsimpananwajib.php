<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('pengurus') ?>">Home</a>
				</li>
				<li class="active">Form Master Simpanan Wajib<li>
			</ul>
		</div>	
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Form Master Simpanan Wajib</h3>

					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<div class="table-header">
						<a href="<?php echo base_url().'pengurus/inptmsimpananwajib'; ?>" class="btn btn-success">Tambah Data</i></a>
					</div>

					<div>
						<table id="myTable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Tahun</th>
									<th>Jumlah</th>
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
											echo '<td>'.$key->tahun.'</td>';
											echo '<td>Rp '.number_format($key->jumlah).'</td>';
											echo '<td><a href="#my-modal" onclick="edit(this)" data-toggle="modal" data-id="'.$key->id_mst_swjib.'">Edit</a>|<a class="toblohapus" href="'.base_url().'pengurus/del_mwajib/'.$key->id_mst_swjib.'">Delete</a></td>';
										echo "</tr>";
									}
								 ?>
							</tbody>
						</table>
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
					<form class="form-horizontal" role="form" action="<?php echo base_url().'pengurus/upda_mwajib'; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tahun</label>
							<div class="input-group">
								<div class="col-sm-9">
									<select name="thn" id="form-field-select-1" class="thn" required="">
										
									</select>
								<input type="hidden" id="form-field-1"  class="col-xs-10 col-sm-5 id" name="id" value="" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah</label>

							<div class="col-sm-9">
								<input type="text" id="form-field-1" placeholder=""  class="col-xs-10 col-sm-5 jmlh" name="jmlh" required="" />
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
		</div>
	</div>
</div>

<script>
	function edit(row){var form_data = new FormData();
		form_data.append('idsimpananwajib',$(row).attr("data-id"));
		$.ajax({
			url:'<?php echo base_url() ?>pengurus/showdataeditsimpananwajib',
			dataType:'text',
			cache:false,
			contentType:false,
			processData:false,
			data:form_data,
			type:'post',
			success:function(asd){
            	var obj = JSON.parse(asd);
            	var print = ''
            	var tahun =''
            	for(var i in obj.show){
            		tahun = obj.show[i].tahun
            		$('.jmlh').val(obj.show[i].jumlah)
            		$('.id').val(obj.show[i].id_mst_swjib)
            	}
            	var nol = '2016'
            	for (var i = 0; i < 30; i++) {
            		nol = parseInt(nol)+1
        			if(nol==tahun){
            			print = print+'<option value="'+nol+'" selected>'+nol+'</option>'
        			}
        			else{
        				print = print+'<option value="'+nol+'">'+nol+'</option>'
        			}
            	}
        		$('.thn').empty()
        		$('.thn').append('<option value="">--- Pilih ---</option>')
        		$('.thn').append(print)

			}
		})
	}
</script>