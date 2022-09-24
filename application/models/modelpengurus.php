<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

class modelpengurus extends CI_model {

	function anggota(){
		return $this->db->get('anggota')->result();
	}

	function ceknomr(){
		$this->db->order_by('id_anggota','desc');
		$this->db->limit(1,0);
		return $this->db->get('anggota')->result();
	}

	function upda_anggota($dt,$id){
		$this->db->where('id_anggota',$id);
		$this->db->update('anggota',$dt);
	}
	function simpan_anggota($dt){
		$this->db->insert('anggota',$dt);
	}
	function del_anggota($id){
		$this->db->where('id_anggota',$id);
		$this->db->delete('anggota');
	}
	function showdataeditanggota($id){
		$this->db->where('id_anggota',$id);
		return $this->db->get('anggota')->result();
	}
//////////////////////////
	function msimpananwajib(){
		return $this->db->get('master_simpanan_wajib')->result();
	}

	function cekidmwajib(){
		$this->db->order_by('id_mst_swjib','desc');
		$this->db->limit(1,0);
		return $this->db->get('master_simpanan_wajib')->result();
	}

	function msimpanwajib($dt){
		$this->db->insert('master_simpanan_wajib',$dt);
	}
	function cektahunmswjib($cek){
		$this->db->where('tahun',$cek);
		return $this->db->get('master_simpanan_wajib')->num_rows();
	}
	function del_mwajib($id){
		$this->db->where('id_mst_swjib',$id);
		$this->db->delete('master_simpanan_wajib');
	}
	function showdataeditsimpananwajib($id){
		$this->db->where('id_mst_swjib',$id);
		return $this->db->get('master_simpanan_wajib')->result();
	}
	function upda_mwajib($dt,$id){
		$this->db->where('id_mst_swjib',$id);
		$this->db->update('master_simpanan_wajib',$dt);

	}
///////////////////
	function getdatasimpananpokok(){
		return $this->db->query('select simpanan_pokok.*,anggota.* from simpanan_pokok join anggota on anggota.id_anggota = simpanan_pokok.id_anggota')->result();
	}
	function upda_simpokok($dt,$id){
		$this->db->where('id_spokok',$id);
		$this->db->update('simpanan_pokok',$dt);

	}
	function del_simpokok($id){
		$this->db->where('id_spokok',$id);
		$this->db->delete('simpanan_pokok');
	}
	function cekidspokok(){
		$this->db->order_by('id_spokok','desc');
		$this->db->limit(1,0);
		return $this->db->get('simpanan_pokok')->result();
	}
	function showdataeditsimpokok($id){
		$this->db->from('simpanan_pokok');
		$this->db->join('anggota','anggota.id_anggota = simpanan_pokok.id_anggota');
		$this->db->where('id_spokok',$id);
		return $this->db->get()->result();

	}
	function modelanggotasimpananpokok(){
		return $this->db->query('select * from anggota where id_anggota not in(select id_anggota from simpanan_pokok);')->result();
	}
	function simpokok($dt){
		$this->db->insert('simpanan_pokok',$dt);
	}
	function getdatabayaransimpananwajib(){
		return $this->db->query('select * from anggota where id_anggota in(select id_anggota from simpanan_pokok) and id_anggota not in(select id_anggota from simpanan_wajib where  bulan ="'.date("m").'" and tahun="'.date("Y").'")')->result();
	}
	function selectmswjib(){
		$d = date('Y');
		return $this->db->query('select * from master_simpanan_wajib where tahun ="'.$d.'"')->result();
	}
	
	function getdatabayaransimpananwajib2($m,$y){
		return $this->db->query('select * from anggota where id_anggota in(select id_anggota from simpanan_pokok) and id_anggota not in(select id_anggota from simpanan_wajib where bulan="'.$m.'" and tahun ="'.$y.'")')->result();
	}
	function selectmswjib2($d){
		return $this->db->query('select * from master_simpanan_wajib where tahun ="'.$d.'"')->result();
	}
	function cekidpembsimpwajib(){
		$this->db->order_by('id_swajib','desc');
		$this->db->limit(1,0);
		return $this->db->get('simpanan_wajib')->result();
	}
	function simpan_pembsmimpwajib($dt){
		$this->db->insert('simpanan_wajib',$dt);
	}

	function cekidsimpananwajib(){
		$this->db->order_by('id_swajib','desc');
		$this->db->limit(1,0);
		return $this->db->get('simpanan_wajib')->result();

	}
	function simpan_pembsimpwajib($dt){
		$this->db->insert('simpanan_wajib',$dt);
	}
	function getanggotaforpinjaman(){
		return $this->db->query('SELECT * FROM anggota where id_anggota in (select id_anggota from simpanan_pokok) and id_anggota not in (SELECT id_anggota FROM `pinjaman` where ket ="belumlunas" group by id_anggota order by id_pinjm desc)')->result();
	}
	function changejbtnpinjaman($d){
		$this->db->where('id_anggota',$d);
		return $this->db->get('anggota')->result();
	}
	function cekidpinjaman(){
		$this->db->order_by('id_pinjm','desc');
		$this->db->limit(1,0);
		return $this->db->get('pinjaman')->result();
	}
	function simpan_pinjaman($dt){
		$this->db->insert('pinjaman',$dt);
	}
	function simpandetailpinjaman($dt){
		$this->db->insert('detail_pinjaman',$dt);
	}
	function getdatapinjaman($id){
		$this->db->where('idpinjm',$id);
		return $this->db->get('pinjaman');
	}
	function getdatapinjaman2(){
		return $this->db->get('pinjaman')->result();
	}
	function getdatapinjamanwhere($d){
		$this->db->where('id_pinjm',$d);
		$this->db->join('anggota','pinjaman.id_anggota=anggota.id_anggota');
		$this->db->from('pinjaman');
		return $this->db->get()->result();
	}
	function getdatapinjamanjumlah($d){
		$this->db->where('idpinjm',$d);
		return $this->db->get('detail_pinjaman')->result();
	}
	function tampilpembayaranpinjaman($m,$y){
		return $this->db->query('select detail_pinjaman.*,anggota.* from detail_pinjaman join pinjaman on pinjaman.id_pinjm = detail_pinjaman.idpinjm join anggota on anggota.id_anggota = pinjaman.id_anggota where detail_pinjaman.bulan = "'.$m.'" and detail_pinjaman.tahun = "'.$y.'" and detail_pinjaman.id_ktpinjm not in (select id_ktpinjm from pembayaran_pinjaman)')->result();
	}
	function getkodepembpinjaman(){
		$this->db->order_by('id_byr','desc');
		$this->db->limit(1,0);
		return $this->db->get('pembayaran_pinjaman')->result();

	}
	function delupdasimpanwajib($id){
		$this->db->where('idpinjm',$id);
		$this->db->delete('detail_pinjaman');
	}
	function upda_pinjaman($dt,$id){
		$this->db->where('id_pinjm',$id);
		$this->db->update('pinjaman',$dt);
	}
	function del_pinjaman($id){
		$this->db->where('id_pinjm',$id);
		$this->db->delete('pinjaman');

		$this->db->where('idpinjm',$id);
		$this->db->delete('detail_pinjaman');
	}
	function simpanpembpinjaman($dt){
		$this->db->insert('pembayaran_pinjaman',$dt);
	}
	function checkstatusbelumlunas(){
		return $this->db->query('SELECT sum(detail_pinjaman.jumlah)as "total_dibayar",detail_pinjaman.idpinjm,pinjaman.jumlah FROM `detail_pinjaman` JOIN pinjaman on pinjaman.id_pinjm = detail_pinjaman.idpinjm WHERE detail_pinjaman.id_ktpinjm in (select `id_ktpinjm` from pembayaran_pinjaman) and detail_pinjaman.idpinjm in(select id_pinjm from pinjaman where ket = "belumlunas") group by detail_pinjaman.idpinjm ')->result();
	}
	function updatedbstatuspinjaman($id,$dt){
		$this->db->where('id_pinjm',$id);
		$this->db->update('pinjaman',$dt);
	}
	function sisapinjaman($s){
		$this->db->select('sum(detail_pinjaman.jumlah) as jumlah');
		$this->db->group_by('detail_pinjaman.idpinjm');
		$this->db->where('pinjaman.id_pinjm',$s);
		$this->db->join('detail_pinjaman','detail_pinjaman.idpinjm=pinjaman.id_pinjm','left');
		$this->db->join('pembayaran_pinjaman','detail_pinjaman.id_ktpinjm=pembayaran_pinjaman.id_ktpinjm');
		$this->db->from('pinjaman');
		return $this->db->get()->result();
	}
}
?>