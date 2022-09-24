<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_model {

	public function ceklogin($d,$s){
		$this->db->where('username',$d);
		$this->db->where('password',$s);
		return $this->db->get('user')->result();
	}
	public function chckloginadmin(){
		if($this->session->userdata('keter')=="admin"){

		}
		else{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	public function chckloginkeuangan(){
		if($this->session->userdata('keter')=="keuangan"){

		}
		else{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}
?>