<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
		public function index(){
			$this->load->view('login/halamanlogin');
		}
		public function logout(){
			$this->session->sess_destroy();
			redirect('login');
		}
		public function cek_login(){
			$data = $this->model_login->ceklogin($this->input->post('username'),$this->input->post('password'));
			$dtpw = '';
			$dtunam = '';
			foreach ($data as $ke) {
				$dtpw = $ke->password;
				$dtunam = $ke->username;
			}
			if($this->input->post('username')==$dtunam&$this->input->post('password')==$dtpw){
				$datasession=array(
					'username'=>$ke->username,
					'password'=>$ke->password,
					'keter'=>$ke->keterangan,
					'id_user'=>$ke->id_user,
				);
				$this->session->set_userdata($datasession);
				if($ke->keterangan=='admin'){
					redirect('pengurus');
				}
				if($ke->keterangan=='keuangan'){
					redirect('keuangan');
				}
				else{
					$this->session->set_flashdata('err_message','Login is invalid. Please try again');
					redirect('login');
				}
			}
			
			else{
				$this->session->set_flashdata('err_message','Login is invalid. Please try again');
				redirect('login');
			}
		}
}
?>
