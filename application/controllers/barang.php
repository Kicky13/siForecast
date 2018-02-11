<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->library('session');

    }
	public function index()
	{	
        $nama = $_SESSION['nama'];	
		$level = $_SESSION['level'];
		if ($level == 1) {
			$data = $this->m_barang->getBarang();
			$this->load->view('barang/barangAdmin', array('data' => $data, 'nama' => $nama));
		} else {
			$data = $this->m_barang->getBarang();
			$this->load->view('barang/BarangUser', array('data' => $data, 'nama' => $nama));
		}
	}


	public function formbarang(){
        $nama = $_SESSION['nama'];  
		$data = $this->m_barang->getSupplier();
		$this->load->view('barang/addBarang', array('data' => $data, 'nama' => $nama));
	}
	

	public function addBarang(){        
            $nama_barang = $_POST['nama_barang'];
            $id_supplier = $_POST['id_supplier'];
            $harga_barang = $_POST['harga_barang'];
            $waktu_pengiriman = $_POST['waktu_pengiriman'];
            $this->m_barang->addBarang($nama_barang, $id_supplier, $harga_barang, $waktu_pengiriman);
            echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
            $this->index();
                  
    }

    public function viewUpdate($id_barang){
        $nama = $_SESSION['nama'];  
        $data = $this->m_barang->getEdit($id_barang);
        $this->load->view('barang/editBarang', array('data' => $data, 'nama' => $nama));

    }

    public function updateBarang()
    {
        if ("update"){
            $id = $_POST['id'];
            $nama_barang = $_POST['nama_barang'];
            $harga_barang = $_POST['harga_barang'];
            $waktu_pengiriman = $_POST['waktu_pengiriman'];
            $this->m_barang->updateBarang($id, $nama_barang, $harga_barang, $waktu_pengiriman);
            echo '<script type="text/javascript">alert("Data berhasil diubah.")</script>';
            $this->index();
        }
    }

	public function statusbarang($id_barang){
            $this->m_barang->nonaktifbarang($id_barang);
            echo '<script type="text/javascript">alert("Berhasil mengubah status menjadi tidak aktif!")</script>';
            redirect('/barang');
    }
}



