<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('Header');
		$this->load->view('Utama');
		$this->load->view('Footer');

	}


	public function User()
	{
		$data['user'] = $this->db->get('tbl_user')->result();
		$this->load->view('Header');
		$this->load->view('User',$data);
		$this->load->view('Footer');

	}

	public function UserSimpan()
	{
		$data = array(
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
                'password' => $this->input->post('password'),
                
				
			);
		if($this->db->insert('tbl_user', $data)){
			redirect('Admin/User');
		}
	}

	public function Hapus_User($nik)
	{
		if($this->db->delete('tbl_user',array('nik'=>$nik))){
						redirect('Admin/User'); 
	    }
	}

	public function UserUbah()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'jabatan' => $this->input->post('jabatan'),
                'password' => $this->input->post('password'),
			);
		if($this->db->update('tbl_user', $data, array('nik' => $this->input->post('nik')))){
            redirect('Admin/User'); 
         }
	}

}
