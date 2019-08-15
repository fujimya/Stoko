<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$data['customer'] = $this->db->get('tbl_customer')->result();
		$this->load->view('Header');
		$this->load->view('Customer',$data);
		$this->load->view('Footer');
	}
	public function CustomerSimpan()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nope' => $this->input->post('nope'),
                'alamat' => $this->input->post('alamat'),
                
				
			);
		if($this->db->insert('tbl_customer', $data)){
			redirect('Customer');
		}
	}

	public function Hapus_Customer($id)
	{
		if($this->db->delete('tbl_customer',array('id'=>$id))){
						redirect('Customer'); 
	    }
	}

	public function CustomerUbah()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nope' => $this->input->post('nope'),
                'alamat' => $this->input->post('alamat'),
			);
		if($this->db->update('tbl_customer', $data, array('id' => $this->input->post('id')))){
            redirect('Customer'); 
         }
	}
}
