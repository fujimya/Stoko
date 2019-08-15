<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

	public function index()
	{
		$data['suplier'] = $this->db->get('tbl_suplier')->result();
		$this->load->view('Header');
		$this->load->view('Suplier',$data);
		$this->load->view('Footer');
	}
	public function SuplierSimpan()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nope' => $this->input->post('nope'),
                'alamat' => $this->input->post('alamat'),
                
				
			);
		if($this->db->insert('tbl_Suplier', $data)){
			redirect('Suplier');
		}
	}

	public function Hapus_Suplier($id)
	{
		if($this->db->delete('tbl_suplier',array('id'=>$id))){
						redirect('Suplier'); 
	    }
	}

	public function SuplierUbah()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nope' => $this->input->post('nope'),
                'alamat' => $this->input->post('alamat'),
			);
		if($this->db->update('tbl_suplier', $data, array('id' => $this->input->post('id')))){
            redirect('Suplier'); 
         }
	}
}
