<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('Login');
	}

	public function masuk(){
   	$nik = $this->input->post('nik');
    $password = $this->input->post('password');
    if($data = $this->db->select('*')->from('tbl_user')->where('nik',$nik)->limit(1)->get()->result()){
    	foreach ($data as $use) {
    	if($use->password == $password){
    		// echo "berhasil";
        $sess_array = array (
                'nik' =>$nik ,
                'nama' => $use->nama,
                'jabatan' => $use->jabatan,
            );
        $this->session->set_userdata('user',$sess_array);
        redirect('Admin'); 
    	}else{
    		redirect('Login'); 
    	}
    	}
	}else{
		redirect('Login');
	}
    
   }

   public function Keluar(){
        $this->session->unset_userdata('user');
        redirect('Login');
   }
}
