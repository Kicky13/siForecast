<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_penjualan');
    }

	public function index(){
        $nama = $_SESSION['nama'];
		  $data = $this->m_penjualan->getBarang();
			$datapenjualan = $this->m_penjualan->getPenjualan();
			$this->load->view('penjualan/penjualanUser', array('data' => $data, 'datapenjualan' => $datapenjualan, 'nama' => $nama));
	}

	public function addPenjualan(){   
	    $id_user= $_SESSION['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah= $_POST['jumlah'];
        $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
        $this->m_penjualan->addPenjualan($id_user,  $id_barang, $jumlah, $tgl_kadaluarsa);
        echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
        $this->index();
    }

    public function viewUpdate($id_penjualan){
        $nama = $_SESSION['nama'];
        $data = $this->m_penjualan->getEdit($id_penjualan);
        $this->load->view('penjualan/editPenjualan', array('nama'=>$nama, 'data' => $data, 'nama' => $nama));

    }

    public function updatePenjualan(){
        if ("update"){
            $id = $_POST['id'];
            $jumlah = $_POST['jumlah'];
            $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
            $this->m_penjualan->updatePenjualan($id, $jumlah, $tgl_kadaluarsa);
            echo '<script type="text/javascript">alert("Data berhasil diubah.")</script>';
            $this->index();
        }
    }
	
	public function harian(){
        $bulan="";
        $tahun="";
        if(isset($_GET['bulan'])){
        $bulan= $_GET['bulan'];
        }
        if(isset($_GET['tahun'])){
        $tahun= $_GET['tahun'];
        }
        $tanggal = $this->m_penjualan->getTanggal($bulan, $tahun);
        $nama = $_SESSION['nama'];
		$this->load->view('penjualan/lapHarian', array('nama' => $nama, 'tanggal' => $tanggal));
	}

    public function detailHarian($tgl_penjualan){
        $nama = $_SESSION['nama'];
        $data = $this->m_penjualan->getDetail($tgl_penjualan);      
        $tanggal = $this->m_penjualan->cetaktanggal($tgl_penjualan); 
        $this->load->view('penjualan/detailHarian', array('nama' => $nama, 'data' => $data, 'tanggal' => $tanggal));

    }

	public function bulanan(){
        $nama = $_SESSION['nama'];
        $tahun="";
        if(isset($_GET['tahun'])){
        $tahun= $_GET['tahun'];
        }
        $bulanan = $this->m_penjualan->getBulan($tahun);
        $data = $this->m_penjualan->getBulanan(); 
		$this->load->view('penjualan/lapBulanan', array('nama'=>$nama, 'data' => $data, 'bulanan' => $bulanan));
	}

    public function detailBulan($bulan, $tahun){
        $nama = $_SESSION['nama'];
        $data = $this->m_penjualan->getdetailBulan($bulan, $tahun); 
        $bulans = [
            "Januari","Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        $this->load->view('penjualan/detailBulanan',[
            'nama' => $nama,
            'data' => $data,
            'bulan' => $bulans[$bulan-1],
        ]);
    }
	
}