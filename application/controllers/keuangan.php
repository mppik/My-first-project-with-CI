<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class keuangan extends MY_Controller {
		public function index(){
			$this->keuangan_call('keuangan/home');
		}
		public function formsimpananpokok(){
			$dt['data'] = $this->modelkeuangan->getdatasimpananpokok();
			$this->keuangan_call('keuangan/FormSimpananPokok',$dt);
		}
		public function inptsimipananpokok(){
			$cekdata = $this->modelkeuangan->cekidspokok();
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
			$nomor['idanggota']=$this->modelkeuangan->modelanggotasimpananpokok();
			$this->keuangan_call('keuangan/inputsimpananpokok',$nomor);
		}
		public function simpan_simpokok(){
			$dt= array(
				'id_spokok'=>$this->input->post('id'),
				'id_anggota'=>$this->input->post('idanggota'),
				'tanggal'=>$this->input->post('tgl'),
				'jumlah'=>$this->input->post('jmlh')
			);
			$this->modelkeuangan->simpokok($dt);
			redirect('keuangan/formsimpananpokok');
		}
		public function showdataeditsimpokok(){
			$data['show'] = $this->modelkeuangan->showdataeditsimpokok($this->input->post('idspokok'));
			echo json_encode($data);
		}
		public function upda_simpokok(){
			$id = $this->input->post('id');
			$dt= array(
				'id_anggota'=>$this->input->post('idanggota'),
				'tanggal'=>$this->input->post('tgl'),
				'jumlah'=>$this->input->post('jmlh')
			);
			$this->modelkeuangan->upda_simpokok($dt,$id);
			redirect('keuangan/formsimpananpokok');
		}
		public function del_simpokok(){
			$id=$this->uri->segment(3);
			$this->modelkeuangan->del_simpokok($id);
			redirect('keuangan/formsimpananpokok');
		}
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
			$data['dt'] = $this->modelkeuangan->getdatabayaransimpananwajib();
			$data['mswjib']= $this->modelkeuangan->selectmswjib();
			$this->keuangan_call('keuangan/FormSimpananWajib',$data);
		}
		public function changesimpananwajib(){
			$bulan =$this->input->post('bulan');
			$thn =$this->input->post('tahun');
			$data['dt']= $this->modelkeuangan->getdatabayaransimpananwajib2($bulan,$thn);
			$data['mswjib']= $this->modelkeuangan->selectmswjib2($thn);

			echo json_encode($data);
		}
		public function simpan_pembsimpwajib(){
			$jmlhsimpananwajibanggota='';
			$jmlhsimpananwajib = $this->modelkeuangan->selectmswjib2($this->input->post('jd2'));
			foreach ($jmlhsimpananwajib as $key) {
				$jmlhsimpananwajibanggota = $key->id_mst_swjib;
			}


			$idanggota = $this->input->post('idanggota');
			for ($i=0; $i < count($idanggota) ; $i++) { 

				$cekdata = $this->modelkeuangan->cekidsimpananwajib();
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
					$this->modelkeuangan->simpan_pembsimpwajib($dt);
				}
			}
			redirect('keuangan/formsimpananwajib');
		}

		public function formpinjaman(){
			$data['pinjaman'] = $this->modelkeuangan->getdatapinjaman2();
			$this->keuangan_call('keuangan/formpinjaman',$data);
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
			$cekdata = $this->modelkeuangan->cekidpinjaman();

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
			$data['anggota'] = $this->modelkeuangan->getanggotaforpinjaman();
			$this->keuangan_call('keuangan/inputpinjamananggota',$data);
		}
		public function changejbtnpinjaman(){
			$getdata['dt'] = $this->modelkeuangan->changejbtnpinjaman($this->input->post('idanggota'));
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
			$this->modelkeuangan->simpan_pinjaman($dt);

			for ($i=0; $i < count($this->input->post('bulan')); $i++) { 
				$dt2 = array(
					'idpinjm'=>$this->input->post('kd'),
					'jumlah'=>$this->input->post('jmlhangsuran')[$i],
					'bulan'=> $this->input->post('bulan')[$i],
					'tahun'=>date('Y')
				);
				$this->modelkeuangan->simpandetailpinjaman($dt2);
			}
			redirect('keuangan/formpinjaman');
		}
		public function getdatapinjamanwhere(){
			$id = $this->input->post('idanggota');
			$data['dataanggota'] =$this->modelkeuangan->getdatapinjamanwhere($id);
			$data['jumlah'] =$this->modelkeuangan->getdatapinjamanjumlah($id);
			$data['detailpinjam'] =$this->modelkeuangan->getdatapinjamanjumlah($id);
			echo json_encode($data);
		}
		public function del_pinjaman(){
			$id = $this->uri->segment(3);
			$this->modelkeuangan->del_pinjaman($id);
			redirect('keuangan/formpinjaman');	
		}
		public function upda_pinjaman(){
			$dt = array(
				'id_anggota'=>$this->input->post('idanggota'),
				'jumlah'=>$this->input->post('jumlahpnjm'),
				'tanggal'=> date('Y-m-d'),
				'alasan' =>$this->input->post('alasanpinjaman')
			);
			$this->modelkeuangan->upda_pinjaman($dt,$this->input->post('kd'));
			$this->modelkeuangan->delupdasimpanwajib($this->input->post('kd'));

			for ($i=0; $i < count($this->input->post('bulan')); $i++) { 
				$dt2 = array(
					'idpinjm'=>$this->input->post('kd'),
					'jumlah'=>$this->input->post('jmlhangsuran')[$i],
					'bulan'=> $this->input->post('bulan')[$i],
					'tahun'=>date('Y')
				);
				$this->modelkeuangan->simpandetailpinjaman($dt2);
			}
			redirect('keuangan/formpinjaman');
		}
		public function editdatapinjamancontroller(){
			$id = $this->input->post('idanggota');
			$data['dataanggota'] =$this->modelkeuangan->getdatapinjamanwhere($id);
			$data['jumlah'] =$this->modelkeuangan->getdatapinjamanjumlah($id);
			$data['detailpinjam'] =$this->modelkeuangan->getdatapinjamanjumlah($id);
			echo json_encode($data);

		}
		public function formpembayaranpinjaman(){
			$data['pmbyaran'] = $this->modelkeuangan->tampilpembayaranpinjaman(date('m'),date('Y'));
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
			$this->keuangan_call('keuangan/formpembayaranpinjaman',$data);
		}

		public function changepembayaransimpananwajib(){
			$data['tmpil'] = $this->modelkeuangan->tampilpembayaranpinjaman($this->input->post('bulan'),$this->input->post('tahun'));
			echo json_encode($data);
		}
		public function simpanpembpinjaman(){
			for ($i=0; $i < count($this->input->post('id_ktpinjm')); $i++) { 
				$getkode = $this->modelkeuangan->getkodepembpinjaman();
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
				$this->modelkeuangan->simpanpembpinjaman($dt);
			}
			$checkstatus = $this->modelkeuangan->checkstatusbelumlunas();
			$updatestatuspeminjam= array(
				'ket' =>'lunas'
			);
			foreach ($checkstatus as $key) {
				if($key->total_dibayar==$key->jumlah){
					$this->modelkeuangan->updatedbstatuspinjaman($key->idpinjm,$updatestatuspeminjam);
				}
			}
			redirect('keuangan/formpembayaranpinjaman');
		}
}
?>
