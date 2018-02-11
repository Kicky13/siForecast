<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_peramalan');
    }

	public function index(){
    	$nama = $_SESSION['nama'];
    	$data = $this->m_peramalan->getBarang();
        $hasil = $this->m_peramalan->getramal();
    	$this->load->view('peramalan/ramal',  array('hasil' => $hasil, 'data' => $data, 'nama' => $nama));	
    }

    public function ramal(){
        $id_barang = $_POST['id_barang'];        
        $data = $this->m_peramalan->hitung($id_barang);  
        print_r($data);
        $this->index();
    }  
    
     public function getSaran(){
        $data1 = $this->m_peramalan->ramalBulan();
        $id = $data1[0]['id_barang'];
        $data2 = $this->m_peramalan->getStok($id);
        $stok = $data2[0]['pemasukan'] - $data2[0]['penjualan'] - $data2[0]['pengembalian'];
        $saran = $data1[0]['nilai_ramal'] - $stok;
        $namaBrg = $data1[0]['nama_barang'];
        echo 'Menurut Perhitungan, '.$namaBrg.' Membutuhkan Stok tambahan sebanyak '.$saran;
    }

}