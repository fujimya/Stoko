<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
		//$id = chr(rand(65,90)).rand(10,100).rand(100,10000).chr(rand(65,90))

		$user = $this->session->userdata('user');
		$data['suplier'] = $this->db->get('tbl_suplier')->result();
		$data['barang'] = $this->db->get('tbl_barang')->result();
		$data['keranjang'] = $this->db->query('SELECT
     tbl_keranjang.id
    ,tbl_keranjang.nik
    , tbl_keranjang.kode
    , tbl_barang.nama_barang
    , tbl_keranjang.jumlah
    , tbl_keranjang.satuan
    , tbl_keranjang.harga
    , tbl_keranjang.diskon
FROM
    db_stoko.tbl_keranjang 
    INNER JOIN db_stoko.tbl_barang 
        ON (tbl_keranjang.kode = tbl_barang.kode) WHERE tbl_keranjang.nik = '.$user['nik'].';')->result();
		$this->load->view('Header');
		$this->load->view('Pembelian',$data);
		$this->load->view('Footer');
	}

	public function keranjangSimpan(){
		$user = $this->session->userdata('user');

		$data = array(
				'nik' => $user['nik'],
				'kode' => $this->input->post('kode'),
				'satuan' => $this->input->post('satuan'),
                'harga' => (preg_replace("/[^0-9]/", "", $this->input->post('harga_beli')) * $this->input->post('jumlah_beli')),
                'jumlah' => $this->input->post('jumlah_beli'),
                'diskon' => preg_replace("/[^0-9]/", "", $this->input->post('diskon')),
				
			);
		if($this->db->insert('tbl_keranjang', $data)){
			redirect('Pembelian');
		}
	}

	public function Hapus_Keranjang($id)
	{
		if($this->db->delete('tbl_keranjang',array('id'=>$id))){
						redirect('Pembelian'); 
	    }
	}


	public function BeliSimpan(){
		$user = $this->session->userdata('user');

		$data = array(
				'faktur' => $this->input->post('faktur'),
				'id_suplier' => $this->input->post('suplier'),
				'total_beli' => $this->input->post('total'),
                'diskon' => $this->input->post('diskon'),
				
			);
		if($this->db->insert('tbl_pembelian', $data)){
			// redirect('Pembelian');
			$keranjang = $this->db->query('SELECT
     tbl_keranjang.id
    ,tbl_keranjang.nik
    , tbl_keranjang.kode
    , tbl_barang.nama_barang
    , tbl_keranjang.jumlah
    , tbl_keranjang.satuan
    , tbl_keranjang.harga
    , tbl_keranjang.diskon
FROM
    db_stoko.tbl_keranjang 
    INNER JOIN db_stoko.tbl_barang 
        ON (tbl_keranjang.kode = tbl_barang.kode) WHERE tbl_keranjang.nik = '.$user['nik'].';')->result();

			foreach ($keranjang as $ker) {
				$data = array(
				'kode' => $ker->kode,
				'satuan' => $ker->satuan,
                'harga' => $ker->harga,
                'jumlah' => $ker->jumlah,
                'diskon' => $ker->diskon,				
			);
				if($this->db->insert('tbl_detail_beli', $data)){

				if($this->db->delete('tbl_keranjang',array('id'=>$ker->id))){
						 
	    }
		}
			}

		}
		redirect('Pembelian');
	}
}
