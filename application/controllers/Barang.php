<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index()
	{
		$data['barang'] = $this->db->get('tbl_barang')->result();
		$this->load->view('Header');
		$this->load->view('Barang',$data);
		$this->load->view('Footer');
	}

	public function barangSimpan(){
		$data = array(
				'kode' => $this->input->post('kode'),
				'nama_barang' => $this->input->post('nama_barang'),
                'harga_beli' => preg_replace("/[^0-9]/", "", $this->input->post('harga_beli')),
                'harga_jual' => preg_replace("/[^0-9]/", "", $this->input->post('harga_jual')),
				
			);
		if($this->db->insert('tbl_barang', $data)){
			redirect('Barang');
		}
	}

	public function BarangUbah()
	{
		$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
                'harga_beli' => preg_replace("/[^0-9]/", "", $this->input->post('harga_beli')),
                'harga_jual' => preg_replace("/[^0-9]/", "", $this->input->post('harga_jual')),
				
			);
		if($this->db->update('tbl_barang', $data, array('kode' => $this->input->post('kode')))){
            redirect('Barang'); 
         }
	}

	public function Hapus_Barang($id)
	{
		if($this->db->delete('tbl_barang',array('kode'=>$id))){
						redirect('Barang'); 
	    }
	}
}
