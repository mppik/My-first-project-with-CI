<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

class model_laporan extends CI_model {
	function simpananpokokseleksi($bulan,$tahun){
		return $this->db->query('select sum(jumlah) as total from simpanan_pokok where year(tanggal)="'.$tahun.'" and month(tanggal)="'.$bulan.'"')->row();
	}
	function simpananpokok(){
		return $this->db->query('select sum(jumlah) as total from simpanan_pokok')->row();
	}
	function simpananwajibseleksi($bulan,$tahun){
		return $this->db->query('select sum(jumlah) as total from simpanan_wajib join master_simpanan_wajib on simpanan_wajib.id_mst_swjib = master_simpanan_wajib.id_mst_swjib where simpanan_wajib.tahun="'.$tahun.'" and simpanan_wajib.bulan="'.$bulan.'"')->row();
	}
	function simpananwajib(){
		return $this->db->query('select sum(jumlah) as total from simpanan_wajib join master_simpanan_wajib on simpanan_wajib.id_mst_swjib = master_simpanan_wajib.id_mst_swjib')->row();
	}
	function pinjamanseleksi($bulan,$tahun){
		return $this->db->query('select sum(jumlah) as total from pinjaman where year(tanggal)="'.$tahun.'" and month(tanggal)="'.$bulan.'"')->row();
	}
	function pinjaman(){
		return $this->db->query('select sum(jumlah) as total from pinjaman')->row();
	}

	function bayarpinjaman(){
		return $this->db->query('select sum(jumlah) as total from pembayaran_pinjaman join detail_pinjaman on detail_pinjaman.id_ktpinjm = pembayaran_pinjaman.id_ktpinjm')->row();
	}
	function getdataanggotapeminjam($bulan,$tahun){
		return $this->db->query('select pinjaman.*,anggota.* from pinjaman join anggota on pinjaman.id_anggota = anggota.id_anggota where year(tanggal)="'.$tahun.'" and month(tanggal) = "'.$bulan.'"')->result();
	}
	function seleksilaporananggota(){
		$this->db->where('pinjaman.id_anggota',$this->input->post('idanggota'));
		$this->db->join('anggota','pinjaman.id_anggota=anggota.id_anggota');
		return $this->db->get('pinjaman')->result();
	}
	function getdetail($s){
		$this->db->where('detail_pinjaman.idpinjm',$s);
		$this->db->join('pembayaran_pinjaman','pembayaran_pinjaman.id_ktpinjm=detail_pinjaman.id_ktpinjm','left');
		return $this->db->get('detail_pinjaman')->result();

	}
}
?>