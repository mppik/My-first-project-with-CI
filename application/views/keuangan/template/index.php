
	<?php 
	
	echo $navbar;
	echo $content;
	?>
	

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							Application Editor By &copy; Taufiq (Mpik)
						</span>

					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
	</body>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	 
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/dist/sweetalert2.all.min.js"></script>
	<script>
		$(document).ready( function () {
	    	$('#myTable').DataTable();
		} );
		$('.toblohapus').on('click',function(e){
			e.preventDefault()
			const href = $(this).attr('href')

			swal.fire({
				title: "Apakah Anda Yakin?",
				text: "Data ini akan dihapus!",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonYexy: "Hapus Data"
			}).then((result)=>{
				if (result.value) {
					document.location.href = href
				}
			})
		})
	</script>
</html>