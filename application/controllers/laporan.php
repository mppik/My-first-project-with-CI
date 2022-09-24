<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {
	public function index(){
		$this->model_login->chckloginadmin();
		
		$datasimpananpokokseleksi = $this->model_laporan->simpananpokokseleksi($this->input->post('bulan'),$this->input->post('tahun'));
		$datasimpananpokok = $this->model_laporan->simpananpokok();

		$datasimpananwajibseleksi = $this->model_laporan->simpananwajibseleksi($this->input->post('bulan'),$this->input->post('tahun'));
		$datasimpananwajib = $this->model_laporan->simpananwajib();

		$datapinjamanseleksi = $this->model_laporan->pinjamanseleksi($this->input->post('bulan'),$this->input->post('tahun'));
		$datapinjaman = $this->model_laporan->pinjaman();

		$databayarpinjaman = $this->model_laporan->bayarpinjaman();

		$jmlhkoperasi = ((($datasimpananpokok->total+$datasimpananwajib->total)-$datapinjaman->total)+$databayarpinjaman->total);

		$arraybulan = array(
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
		$bulan = '';
		foreach ($arraybulan as $key => $value) {
			if($key==$this->input->post('bulan')){
				$bulan = $value;
			}
		}

		$this->load->library('pdf/fpdf');
	    $pdf = new Fpdf('P', 'cm', 'A4');
		
		$pdf->AddPage();
		$pdf->SetMargins(2, 1, 2);
		$pdf->SetTitle('Report Koperasi');
		$pdf->Image('logop3i.png', 2, 0.5, 2.8);
		$pdf->SetFont('Times', 'B', 16);
		$pdf->SetX(8.9);		
		$pdf->Cell(5, 0.7,'PLJ Kampus Cileungsi', 0, 1, 'C');
		$pdf->SetFont('Times', '', 11);
		$pdf->SetX(6.5);
		$pdf->Cell(11, 0.7,'Jl. Raya Jonggol - Cileungsi No.KM. 3, Cileungsi Kidul,', 0, 1);
		$pdf->SetX(7.8);
		$pdf->Cell(11, 0.7,'Kec. Cileungsi, Bogor, Jawa Barat 16820', 0, 1);

		$pdf->SetX(9);
		$pdf->Line(2.8,4,18,4);
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(11, 0.7,'Telpon : (021) 8249-9707', 0, 1);
		

		$pdf->Ln(1.5);		
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(18, 0.7,'Laporan Koperasi Bulan', 0, 2, 'C');
		$pdf->Ln(0);
		$pdf->Cell(18, 0.7,$bulan, 0, 2, 'C');

		$pdf->Ln(1);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Simpanan pokok bulan ini', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7,'Rp '.number_format($datasimpananpokokseleksi->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Total simpanan pokok', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($datasimpananpokok->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Simpanan wajib bulan ini ', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($datasimpananwajibseleksi->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Total simpanan wajib', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($datasimpananwajib->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Total peminjaman bulan ini', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($datapinjamanseleksi->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Total peminjaman', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($datapinjaman->total), 0, 0);

		$pdf->Ln(0.5);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Jumlah koperasi', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);
		$pdf->Cell(6, 0.7, 'Rp '.number_format($jmlhkoperasi), 0, 0);

		$pdf->Ln(2);
		$pdf->SetFont('Times', 'B', 11);
		$pdf->Cell(6, 0.7, 'Anggota yang meminjam dibulan ini', 0, 0);
		$pdf->Cell(0.5, 0.7, ' :', 0, 0);


		$dataanggotapeminjam = $this->model_laporan->getdataanggotapeminjam($this->input->post('bulan'),$this->input->post('tahun'));
		$nol = 0;
		$pdf->Ln(1);
		$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
		$pdf->Cell(6, 0.7, 'Nama Anggota', 1, 0);
		$pdf->Cell(4, 0.7, 'Tanggal Pinjaman', 1, 0);
		$pdf->Cell(6, 0.7, 'Jumlah Pinjaman', 1, 1);

		foreach ($dataanggotapeminjam as $key) {
			$pdf->Cell(1, 0.7, $nol+=1, 1, 0, 'C');
			$pdf->Cell(6, 0.7, $key->nama, 1, 0);
			$pdf->Cell(4, 0.7, $key->tanggal, 1, 0);
			$pdf->Cell(6, 0.7, $key->jumlah, 1, 1);
		}

		$pdf->Output();
	}
	public function anggota(){
		$this->model_login->chckloginadmin();
		

		$this->load->library('pdf/fpdf');
	    $pdf = new Fpdf('P', 'cm', 'A4');
		foreach ($this->model_laporan->seleksilaporananggota() as $key) {
			# code...
			$pdf->AddPage();
			$pdf->SetMargins(2, 1, 2);
			$pdf->SetTitle('Report Koperasi');
			$pdf->Image('logop3i.png', 2, 0.5, 2.8);
			$pdf->SetFont('Times', 'B', 16);
			$pdf->SetX(8.9);		
			$pdf->Cell(5, 0.7,'PLJ Kampus Cileungsi', 0, 1, 'C');
			$pdf->SetFont('Times', '', 11);
			$pdf->SetX(6.5);
			$pdf->Cell(11, 0.7,'Jl. Raya Jonggol - Cileungsi No.KM. 3, Cileungsi Kidul,', 0, 1);
			$pdf->SetX(7.8);
			$pdf->Cell(11, 0.7,'Kec. Cileungsi, Bogor, Jawa Barat 16820', 0, 1);

			$pdf->SetX(9);
			$pdf->Line(2.8,4,18,4);
			$pdf->SetFont('Times', '', 10);
			$pdf->Cell(11, 0.7,'Telpon : (021) 8249-9707', 0, 1);
			

			$pdf->Ln(1.5);		
			$pdf->SetFont('Times', 'B', 14);
			$pdf->Cell(18, 0.7,'Laporan Pinjaman '.$key->nama.$key->id_pinjm, 0, 2, 'C');
			$pdf->Ln(0);
			$pdf->Cell(18, 0.7,'Tanggal '.$key->tanggal, 0, 2, 'C');


			$pdf->Ln(1);		
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
			$pdf->Cell(6, 0.7, 'Bulan&Tahun Pembayaran', 1, 0);
			$pdf->Cell(4, 0.7, 'Jumlah Angsuran', 1, 0);
			$pdf->Cell(6, 0.7, 'Dibayar', 1, 1);
			$nol = 1;
			$jumlah='';
			foreach ($this->model_laporan->getdetail($key->id_pinjm) as $key2) {
				$pdf->SetFont('Times', '', 12);
				$pdf->Cell(1, 0.7, $nol++, 1, 0, 'C');
				$pdf->Cell(6, 0.7, $key2->bulan.'-'.$key2->tahun, 1, 0);
				$pdf->Cell(4, 0.7, 'Rp '.number_format($key2->jumlah), 1, 0);
				if (!$key2->id_byr) {
					$pdf->Cell(6, 0.7, '-', 1, 1);
					$jumlah=$jumlah;
				}
				else{
					$jumlah=$jumlah+$key2->jumlah;
					$pdf->Cell(6, 0.7,'Rp '.number_format($key2->jumlah), 1, 1);
				}
			}
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(11, 0.7, 'Total', 1, 0, 'C');
			$pdf->Cell(6, 0.7, 'Rp '.number_format($jumlah), 1, 1);

			$pdf->Ln(1.5);
			$pdf->SetFont('Times', 'B', 11);
			$pdf->Cell(4, 0.7, 'Total Pinjaman', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, 'Rp '.number_format($key->jumlah), 0, 0);

			$pdf->Ln(0.5);
			$pdf->SetFont('Times', 'B', 11);
			$pdf->Cell(4, 0.7, 'Sisa Pinjaman', 0, 0);
			$pdf->Cell(0.5, 0.7, ' :', 0, 0);
			$pdf->Cell(6, 0.7, 'Rp '.number_format($jumlah), 0, 0);
		}
		$pdf->Output();
	}
}
?>
