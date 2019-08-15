<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
		//$id = chr(rand(65,90)).rand(10,100).rand(100,10000).chr(rand(65,90))

		$user = $this->session->userdata('user');
		$data['customer'] = $this->db->get('tbl_customer')->result();
		$data['barang'] = $this->db->get('tbl_barang')->result();
		$data['keranjang_jual'] = $this->db->query('SELECT
     tbl_keranjang_jual.id
    ,tbl_keranjang_jual.nik
    , tbl_keranjang_jual.kode
    , tbl_barang.nama_barang
    , tbl_keranjang_jual.jumlah
    , tbl_keranjang_jual.satuan
    , tbl_keranjang_jual.harga
    , tbl_keranjang_jual.diskon
FROM
    db_stoko.tbl_keranjang_jual 
    INNER JOIN db_stoko.tbl_barang 
        ON (tbl_keranjang_jual.kode = tbl_barang.kode) WHERE tbl_keranjang_jual.nik = '.$user['nik'].';')->result();
		$this->load->view('Header');
		$this->load->view('Penjualan',$data);
		$this->load->view('Footer');
	}

	public function keranjang_jualSimpan(){
		$user = $this->session->userdata('user');

		$data = array(
				'nik' => $user['nik'],
				'kode' => $this->input->post('kode'),
				'satuan' => $this->input->post('satuan'),
                'harga' => (preg_replace("/[^0-9]/", "", $this->input->post('harga_jual')) * $this->input->post('jumlah_jual')),
                'jumlah' => $this->input->post('jumlah_jual'),
                'diskon' => preg_replace("/[^0-9]/", "", $this->input->post('diskon')),
				
			);
		if($this->db->insert('tbl_keranjang_jual', $data)){
			redirect('penjualan');
		}
	}

	public function Hapus_keranjang_jual($id)
	{
		if($this->db->delete('tbl_keranjang_jual',array('id'=>$id))){
						redirect('penjualan'); 
	    }
	}


	public function JualSimpan(){
		$user = $this->session->userdata('user');

		$data = array(
				'faktur' => $this->input->post('faktur'),
				'id_customer' => $this->input->post('customer'),
				'total_jual' => $this->input->post('total'),
                'diskon' => $this->input->post('diskon'),
				
			);
		if($this->db->insert('tbl_penjualan', $data)){
			// redirect('penjualan');
			$keranjang_jual = $this->db->query('SELECT
     tbl_keranjang_jual.id
    ,tbl_keranjang_jual.nik
    , tbl_keranjang_jual.kode
    , tbl_barang.nama_barang
    , tbl_keranjang_jual.jumlah
    , tbl_keranjang_jual.satuan
    , tbl_keranjang_jual.harga
    , tbl_keranjang_jual.diskon
FROM
    db_stoko.tbl_keranjang_jual 
    INNER JOIN db_stoko.tbl_barang 
        ON (tbl_keranjang_jual.kode = tbl_barang.kode) WHERE tbl_keranjang_jual.nik = '.$user['nik'].';')->result();

			foreach ($keranjang_jual as $ker) {
				$data = array(
				'kode' => $ker->kode,
				'satuan' => $ker->satuan,
                'harga' => $ker->harga,
                'jumlah' => $ker->jumlah,
                'diskon' => $ker->diskon,				
			);
				if($this->db->insert('tbl_detail_jual', $data)){

				if($this->db->delete('tbl_keranjang_jual',array('id'=>$ker->id))){
						 
	    }
		}
			}

		}
		redirect('penjualan');
	}
}
