<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('m_barangmasuk');
        $this->load->library('session');

    }

	public function index()
    {
        $nama = $_SESSION['nama'];
		$level = $_SESSION['level'];
		if ($level == 1) {
            $bulan="";
            $tahun="";
            if(isset($_GET['bulan'])){
                $bulan= $_GET['bulan'];
             }
            if(isset($_GET['tahun'])){
                $tahun= $_GET['tahun'];
            }
            $tanggal = $this->m_barangmasuk->getTanggal($bulan,$tahun);
			$data = $this->m_barangmasuk->getBarangmasuk();
            $this->load->view('barangmasuk/bmAdmin', array('data' => $data, 'tanggal' => $tanggal, 'nama' => $nama));
		} else {
			
			$datamasuk = $this->m_barangmasuk->getBarangmasuk();
            $data = $this->m_barangmasuk->getBarang();
			$this->load->view('barangmasuk/bmUser', array('data' => $data, 'datamasuk' => $datamasuk, 'nama' => $nama));
		}
	}


	public function addBarangmasuk(){   
	     	$id_user= $_SESSION['id'];
            $id_barang = $_POST['id_barang'];
            $jumlah= $_POST['jumlah'];
            $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
            $batas_pengembalian = $_POST['batas_pengembalian'];
            $this->m_barangmasuk->addBM($id_user, $id_barang, $jumlah, $tgl_kadaluarsa,  $batas_pengembalian);
            echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
            $this->index();
    }
 	
 	public function viewUpdate($id_barangmasuk){
        $nama = $_SESSION['nama'];
        $data = $this->m_barangmasuk->getEdit($id_barangmasuk);
        $this->load->view('barangmasuk/editBM', array('data' => $data, 'nama' => $nama));

    }

    public function updateBarang()
    {
        if ("update"){
            $id = $_POST['id'];
            $jumlah = $_POST['jumlah'];
            $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
            $batas_pengembalian = $_POST['batas_pengembalian'];
            $this->m_barangmasuk->updateBM($id, $jumlah, $tgl_kadaluarsa, $batas_pengembalian);
            echo '<script type="text/javascript">alert("Data berhasil diubah.")</script>';
            $this->index();
        }
    }

    public function viewDetail($tgl_barangmasuk){
        $nama = $_SESSION['nama'];
        $data = $this->m_barangmasuk->getDetail($tgl_barangmasuk);
        $tanggal = $this->m_barangmasuk->getDetailTanggal($tgl_barangmasuk);
        $this->load->view('barangmasuk/detailBm', array('data' => $data, 'nama' => $nama, 'tanggal'=>$tanggal));

    }

}
