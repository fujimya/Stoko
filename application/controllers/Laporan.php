<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$data['barang'] = $this->db->get('tbl_barang')->result();
		$this->load->view('Header');
		$this->load->view('Barang_Laporan',$data);
		$this->load->view('Footer');
	}
	public function cetak()
	{
         $this->load->library('email');
	 $data['barang'] = $this->db->query("SELECT * FROM tbl_barang ORDER BY stok ASC")->result();
	 $notif = $this->load->view('Barang_Laporan_Cetak',$data,TRUE);

	$config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "tokotyasnangkabaru@gmail.com";
        $config['smtp_pass'] = "12345tyas";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $this->email->initialize($config);

        $from_email = "tokotyasnangkabaru@gmail.com"; 
//        $to_email = 'putrisukmadewi.hws@gmail.com' ;
        $to_email = 'alfalaqproject@gmail.com' ;
       
        $this->email->from($from_email,"Toko Tyas Nangka Baru"); 
        $this->email->to($to_email);
        $this->email->subject('Laporan Persedian Barang'); 
        $this->email->message($notif);
        if($this->email->send()){
        $this->load->view('Barang_Laporan_Cetak',$data);
        }else{
        echo $this->email->print_debugger();
}
	}
}
