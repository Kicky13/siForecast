<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_stok');
    }
	
	public function index()
    {
    	$nama = $_SESSION['nama']; 
    	$data = $this->m_stok->getBarang(); 
		$this->load->view('stok/stok', array( 'nama' => $nama,'data' => $data));
	}

	public function detail($id_barang){
		$nama = $_SESSION['nama'];
		$level = $_SESSION['level'];		
		$data = $this->m_stok->getDetail($id_barang);
		$barang= $this->m_stok->nama($id_barang);
		if ($level == 1) {
		$this->load->view('stok/detailStok',['data' => $data, 'nama' => $nama, 'barang'=>$barang]);
	}else{
		$this->load->view('stok/detailStokUser',['data' => $data, 'nama' => $nama, 'barang'=>$barang]);
	} 
	
	}


}