<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengurus extends MY_Controller {
		public function index(){
			$this->pengurus_call('pengurus/home');
		}

		public function formanggota(){
			$dt['data'] = $this->modelpengurus->anggota();
			$this->pengurus_call('pengurus/FormAnggota',$dt);
		}

		public function inputanggota(){

			$cekdata = $this->modelpengurus->ceknomr();
			$id_anggota['id']='';
			if(empty($cekdata)){
				$id_anggota['id']='AGT001';
			}
			else{
				$kodelama = '';
				foreach ($cekdata as $key) {
					$kodelama = $key->id_anggota;
				}
				$urutan = substr($kodelama, 3);
				$int = (int)$urutan;
				$next = $int+1;
				$strlen = strlen($next);
				$nol =0;
				for ($i=0; $i < 2 - $strlen; $i++) { 
					$nol = $nol.'0';
				}
				$id_anggota['id'] = 'AGT'.$nol.$next;
			}

			$this->pengurus_call('pengurus/inputanggota',$id_anggota);
		}
		public function simpan_anggota(){
			$dt=array(
				'id_anggota' => $this->input->post('id'),
				'nama' => $this->input->post('nmanggota'),
				'jk' => $this->input->post('jk'),
				'nomor_telepon' => $this->input->post('nomor_tlp'),
				'jabatan' => $this->input->post('jbtn')
			);
			$this->modelpengurus->simpan_anggota($dt);
			redirect('pengurus/formanggota');
		}
		public function upda_anggota(){
			$id = $this->input->post('id');
			$dt=array(
				'nama' => $this->input->post('nmanggota'),
				'jk' => $this->input->post('jk'),
				'nomor_telepon' => $this->input->post('nomor_tlp'),
				'jabatan' => $this->input->post('jbtn')
			);
			$this->modelpengurus->upda_anggota($dt,$id);
			redirect('pengurus/formanggota');
		}

		public function del_anggota(){
			$id = $this->uri->segment(3);
			$this->modelpengurus->del_anggota($id);
			redirect('pengurus/formanggota');
		}

		public function showdataeditanggota(){
			$data['show'] = $this->modelpengurus->showdataeditanggota($this->input->post('idanggota'));
			echo json_encode($data);
		}
//////////////////////////////// Mastersimpanan wajib
		public function msimpananwajib(){
			$dt['data'] = $this->modelpengurus->msimpananwajib();
			$this->pengurus_call('pengurus/FormMsimpananwajib',$dt);
		}
		public function inptmsimpananwajib(){

			$cekdata = $this->modelpengurus->cekidmwajib();
			$nomor['id']='';
			if(empty($cekdata)){
				$nomor['id']='SW001';
			}
			else{
				$kodelama = '';
				foreach ($cekdata as $key) {
					$kodelama = $key->id_mst_swjib;
				}
				$urutan = substr($kodelama, 2);
				$int = (int)$urutan;
				$next = $int+1;
				$strlen = strlen($next);
				$nol =0;
				for ($i=0; $i < 2 - $strlen; $i++) { 
					$nol = $nol.'0';
				}
				$nomor['id'] = 'SW'.$nol.$next;
			}

			$this->pengurus_call('pengurus/inputMsimpananwajib',$nomor);
		}
		public function del_mwajib(){
			$id= $this->uri->segment(3);
			$this->modelpengurus->del_mwajib($id);
			redirect('pengurus/msimpananwajib');
		}
		public function simpan_mwajib(){
			$cektahunswjib = $this->modelpengurus->cektahunmswjib($this->input->post('thn'));
			if($cektahunswjib>0){
				$this->session->set_flashdata('err_thn_wjib','Maaf Tahun yang anda input sudah terdaftar pada database');
				redirect('pengurus/inptmsimpananwajib');
			}
			else{
				$dt=array(
					'id_mst_swjib'=>$this->input->post('id'),
					'tahun'=> $this->input->post('thn'),
					'jumlah'=> $this->input->post('jmlh')
				);
				$this->modelpengurus->msimpanwajib($dt);
				redirect('pengurus/msimpananwajib');
			}
		}
		public function showdataeditsimpananwajib(){
			$data['show'] = $this->modelpengurus->showdataeditsimpananwajib($this->input->post('idsimpananwajib'));
			echo json_encode($data);
		}
		public function upda_mwajib(){
			$id = $this->input->post('id');
			$dt=array(
				'tahun'=> $this->input->post('thn'),
				'jumlah'=> $this->input->post('jmlh')
			);
			$this->modelpengurus->upda_mwajib($dt,$id);

			redirect('pengurus/msimpananwajib');
		}
///////////////////////
		public function formsimpananpokok(){
			$dt['data'] = $this->modelpengurus->getdatasimpananpokok();
			$this->pengurus_call('pengurus/FormSimpananPokok',$dt);
		}
		public function del_simpokok(){
			$id=$this->uri->segment(3);
			$this->modelpengurus->del_simpokok($id);
			redirect('pengurus/formsimpananpokok');
		}
		public function showdataeditsimpokok(){
			$data['show'] = $this->modelpengurus->showdataeditsimpokok($this->input->post('idspokok'));
			echo json_encode($data);
		}
		public function upda_simpokok(){

			$id = $this->input->post('id');
			$dt= array(
				'id_anggota'=>$this->input->post('idanggota'),
				'tanggal'=>$this->input->post('tgl'),
				'jumlah'=>$this->input->post('jmlh')
			);
			$this->modelpengurus->upda_simpokok($dt,$id);
			redirect('pengurus/formsimpananpokok');

		}
		public function inptsimipananpokok(){
			$cekdata = $this->modelpengurus->cekidspokok();
			$nomor['id']='';
			if(empty($cekdata)){
				$nomor['id']='SP001';
			}
			else{
				$kodelama = '';
				foreach ($cekdata as $key) {
					$kodelama = $key->id_spokok;
				}
				$urutan = substr($kodelama, 2);
				$int = (int)$urutan;
				$next = $int+1;
				$strlen = strlen($next);
				$nol =0;
				for ($i=0; $i < 2 - $strlen; $i++) { 
					$nol = $nol.'0';
				}
				$nomor['id'] = 'SP'.$nol.$next;
			}
			$nomor['idanggota']=$this->modelpengurus->modelanggotasimpananpokok();
			$this->pengurus_call('pengurus/inputsimpananpokok',$nomor);
		}
		public function simpan_simpokok(){
			$dt= array(
				'id_spokok'=>$this->input->post('id'),
				'id_anggota'=>$this->input->post('idanggota'),
				'tanggal'=>$this->input->post('tgl'),
				'jumlah'=>$this->input->post('jmlh')
			);
			$this->modelpengurus->simpokok($dt);
			redirect('pengurus/formsimpananpokok');
		}

////////////////////////////
		public function formsimpananwajib(){
			$data['bulan'] = array(
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
			$data['dt'] = $this->modelpengurus->getdatabayaransimpananwajib();
			$data['mswjib']= $this->modelpengurus->selectmswjib();
			$this->pengurus_call('pengurus/FormSimpananWajib',$data);
		}
		public function changesimpananwajib(){
			$bulan =$this->input->post('bulan');
			$thn =$this->input->post('tahun');
			$data['dt']= $this->modelpengurus->getdatabayaransimpananwajib2($bulan,$thn);
			$data['mswjib']= $this->modelpengurus->selectmswjib2($thn);

			echo json_encode($data);
		}
		public function simpan_pembsimpwajib(){
			$jmlhsimpananwajibanggota='';
			$jmlhsimpananwajib = $this->modelpengurus->selectmswjib2($this->input->post('jd2'));
			foreach ($jmlhsimpananwajib as $key) {
				$jmlhsimpananwajibanggota = $key->id_mst_swjib;
			}


			$idanggota = $this->input->post('idanggota');
			for ($i=0; $i < count($idanggota) ; $i++) { 

				$cekdata = $this->modelpengurus->cekidsimpananwajib();
				$nomor['id']='';
				if(empty($cekdata)){
					$nomor['id']='SWA0001';
				}
				else{
					$kodelama = '';
					foreach ($cekdata as $key) {
						$kodelama = $key->id_swajib;
					}
					$urutan = substr($kodelama, 3);
					$int = (int)$urutan;
					$next = $int+1;
					$strlen = strlen($next);
					$nol =0;
					for ($u=0; $u < 3 - $strlen; $u++) { 
						$nol = $nol.'0';
					}
					$nomor['id'] = 'SWA'.$nol.$next;
				}

				$dt = array(
					'id_swajib' => $nomor['id'], 
					'id_anggota' => $idanggota[$i], 
					'id_mst_swjib' => $jmlhsimpananwajibanggota, 
					'tanggal' => date('Y-m-d'), 
					'bulan' => $this->input->post('jd1'),
					'tahun' => $this->input->post('jd2') 
				);
				if($jmlhsimpananwajibanggota){
					$this->modelpengurus->simpan_pembsimpwajib($dt);
				}
			}
			redirect('pengurus/formsimpananwajib');
		}

		///////////// pinjaman
		public function formpinjaman(){
			$data['pinjaman'] = $this->modelpengurus->getdatapinjaman2();
			$this->pengurus_call('pengurus/formpinjaman',$data);
		}
		public function forminptpinjamananggota(){
			$data['bulan'] = array(
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
			$cekdata = $this->modelpengurus->cekidpinjaman();

			$data['kd']='';
			if(empty($cekdata)){
				$data['kd']='PJM0001';
			}
			else{
				$kodelama = '';
				foreach ($cekdata as $key) {
					$kodelama = $key->id_pinjm;
				}
				$urutan = substr($kodelama, 3);
				$int = (int)$urutan;
				$next = $int+1;
				$strlen = strlen($next);
				$nol =0;
				for ($u=0; $u < 3 - $strlen; $u++) { 
					$nol = $nol.'0';
				}
				$data['kd'] = 'PJM'.$nol.$next;
			}
			$data['anggota'] = $this->modelpengurus->getanggotaforpinjaman();
			$this->pengurus_call('pengurus/inputpinjamananggota',$data);
		}
		public function changejbtnpinjaman(){
			$getdata['dt'] = $this->modelpengurus->changejbtnpinjaman($this->input->post('idanggota'));
			echo json_encode($getdata);
		}
		public function simpan_pinjaman(){
			$dt = array(
				'id_pinjm'=>$this->input->post('kd'),
				'id_anggota'=>$this->input->post('idanggota'),
				'jumlah'=>$this->input->post('jumlahpnjm'),
				'tanggal'=> date('Y-m-d'),
				'ket'=>'belumlunas',
				'alasan' =>$this->input->post('alasanpinjaman')
			);
			$this->modelpengurus->simpan_pinjaman($dt);

			for ($i=0; $i < count($this->input->post('bulan')); $i++) { 
				$dt2 = array(
					'idpinjm'=>$this->input->post('kd'),
					'jumlah'=>$this->input->post('jmlhangsuran')[$i],
					'bulan'=> $this->input->post('bulan')[$i],
					'tahun'=>date('Y')
				);
				$this->modelpengurus->simpandetailpinjaman($dt2);
			}
			redirect('pengurus/formpinjaman');
		}
		public function upda_pinjaman(){
			$dt = array(
				'id_anggota'=>$this->input->post('idanggota'),
				'jumlah'=>$this->input->post('jumlahpnjm'),
				'tanggal'=> date('Y-m-d'),
				'alasan' =>$this->input->post('alasanpinjaman')
			);
			$this->modelpengurus->upda_pinjaman($dt,$this->input->post('kd'));
			$this->modelpengurus->delupdasimpanwajib($this->input->post('kd'));

			for ($i=0; $i < count($this->input->post('bulan')); $i++) { 
				$dt2 = array(
					'idpinjm'=>$this->input->post('kd'),
					'jumlah'=>$this->input->post('jmlhangsuran')[$i],
					'bulan'=> $this->input->post('bulan')[$i],
					'tahun'=>date('Y')
				);
				$this->modelpengurus->simpandetailpinjaman($dt2);
			}
			redirect('pengurus/formpinjaman');
		}
		public function getdatapinjamanwhere(){
			$id = $this->input->post('idanggota');
			$data['dataanggota'] =$this->modelpengurus->getdatapinjamanwhere($id);
			$data['jumlah'] =$this->modelpengurus->getdatapinjamanjumlah($id);
			$data['detailpinjam'] =$this->modelpengurus->getdatapinjamanjumlah($id);
			echo json_encode($data);
		}
		//////////////////////
		public function formpembayaranpinjaman(){
			$data['pmbyaran'] = $this->modelpengurus->tampilpembayaranpinjaman(date('m'),date('Y'));
			$data['bulan'] = array(
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
			$this->pengurus_call('pengurus/formpembayaranpinjaman',$data);
		}
		public function changepembayaransimpananwajib(){
			$data['tmpil'] = $this->modelpengurus->tampilpembayaranpinjaman($this->input->post('bulan'),$this->input->post('tahun'));
			echo json_encode($data);
		}
		public function simpanpembpinjaman(){
			for ($i=0; $i < count($this->input->post('id_ktpinjm')); $i++) { 
				$getkode = $this->modelpengurus->getkodepembpinjaman();
				$kodenya ='';
				if(empty($getkode)){
					$kodenya = 'BYR0001';
				}
				else{
					$kodelama = '';
					foreach ($getkode as $key) {
						$kodelama = $key->id_byr;
					}
					$urutan = substr($kodelama, 3);
					$int = (int)$urutan;
					$next = $int+1;
					$strlen = strlen($next);
					$nol=0;
					for ($u=0; $u < 3 - $strlen; $u++) { 
						$nol = $nol.'0';
					}
					$kodenya = 'BYR'.$nol.$next;
				}
				$dt = array(
					'id_byr'=> $kodenya,
					'id_ktpinjm'=> $this->input->post('id_ktpinjm')[$i],
					'status'=> 'Lunas',
					'tanggal_byr'=> date('Y-m-d')
				);
				$this->modelpengurus->simpanpembpinjaman($dt);
			}
			$checkstatus = $this->modelpengurus->checkstatusbelumlunas();
			$updatestatuspeminjam= array(
				'ket' =>'lunas'
			);
			foreach ($checkstatus as $key) {
				if($key->total_dibayar==$key->jumlah){
					$this->modelpengurus->updatedbstatuspinjaman($key->idpinjm,$updatestatuspeminjam);
				}
			}
			redirect('pengurus/formpembayaranpinjaman');
		}
		public function del_pinjaman(){
			$id = $this->uri->segment(3);
			$this->modelpengurus->del_pinjaman($id);
			redirect('pengurus/formpinjaman');	
		}
		public function editdatapinjamancontroller(){
			$id = $this->input->post('idanggota');
			$data['dataanggota'] =$this->modelpengurus->getdatapinjamanwhere($id);
			$data['jumlah'] =$this->modelpengurus->getdatapinjamanjumlah($id);
			$data['detailpinjam'] =$this->modelpengurus->getdatapinjamanjumlah($id);
			echo json_encode($data);

		}
		public function laporan(){
			$data['bulan'] = array(
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
			$data['anggota'] = $this->modelpengurus->anggota();
			$this->pengurus_call('pengurus/seleksilaporan',$data);
		}
		public function cetaklaporan(){
		    $this->load->library('pdf/fpdf');
		    $pdf = new Fpdf('P', 'cm', 'A4');
				
			$pdf->AddPage();
			$pdf->SetMargins(2, 1, 2);
			$pdf->SetTitle('Report Koperasi');
			$pdf->Image('logop3i.png', 2, 0.5, 2.8);
			$pdf->SetFont('Arial', 'B', 16);
			$pdf->SetX(8.9);		
			$pdf->Cell(5, 0.7,'PLJ Kampus Cileungsi', 0, 1, 'C');
			$pdf->SetFont('Arial', '', 11);
			$pdf->SetX(6.5);
			$pdf->Cell(11, 0.7,'Jl. Raya Jonggol - Cileungsi No.KM. 3, Cileungsi Kidul,', 0, 1);
			$pdf->SetX(7.8);
			$pdf->Cell(11, 0.7,'Kec. Cileungsi, Bogor, Jawa Barat 16820', 0, 1);

			$pdf->SetX(9);
			$pdf->Line(2.8,4,18,4);
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(11, 0.7,'Telpon : (021) 8249-9707', 0, 1);
			

			$pdf->Ln(1.5);		
			$pdf->SetFont('Arial', 'B', 14);
			$pdf->Cell(18, 0.7,'Laporan Koperasi Bulan', 0, 2, 'C');
			$pdf->Ln(1);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Simpanan pokok bulan ini', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Total simpanan pokok', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Simpanan wajib bulan ini ', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Total simpanan wajib', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Jumlah Koperasi bulan ini', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Jumlah keseluruhan koperasi', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Total peminjaman bulan ini', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Arial', 'B', 11);
			$pdf->Cell(6, 0.7, 'Total peminjaman', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, '-', 0, 0);

			$pdf->Ln(3);
			$pdf->Cell(18.5, 0.7,'DISERAHKAN OLEH', 0, 2, 'C');
			$pdf->Ln(2);
			$pdf->Cell(18.5, 0.7,'DEPT FINANCE', 0, 2, 'C');
			$pdf->Output();
		}
}
?>
