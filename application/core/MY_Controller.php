<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function pengurus_call($isi, $dt = NULL){
		$this->model_login->chckloginadmin();
		$data['navbar'] = $this->load->view('pengurus/template/mainmenu',$dt, true);
        $data['content'] = $this->load->view($isi,$dt, true);
        $this->load->view('pengurus/template/index', $data);
	}
	public function keuangan_call($isi, $dt = NULL){
		$this->model_login->chckloginkeuangan();
		$data['navbar'] = $this->load->view('keuangan/template/mainmenu',$dt, true);
        $data['content'] = $this->load->view($isi,$dt, true);
        $this->load->view('keuangan/template/index', $data);
	}
}
?>
