<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_retur');
    }
	public function index(){
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
            $tanggal = $this->m_retur->getTanggal($bulan,$tahun);
			$data = $this->m_retur->getRetur();
            $this->load->view('retur/returAdmin', array('data' => $data, 'tanggal' => $tanggal,'nama' => $nama));
		} else {            
			$data = $this->m_retur->getBarang();
			$dataretur = $this->m_retur->getRetur();
			$this->load->view('retur/returUser', array('data' => $data, 'dataretur' => $dataretur, 'nama' => $nama));
		}
	}

	public function addRetur(){   
	     $id_user= $_SESSION['id'];
        $id_barang = $_POST['id_barang'];
        $jumlah= $_POST['jumlah'];
        $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
        $this->m_retur->addRetur($id_user,  $id_barang, $jumlah, $tgl_kadaluarsa);
        echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
        $this->index();
    }

    public function viewUpdate($id_pengembalian){
        $nama = $_SESSION['nama'];  
        $data = $this->m_retur->getEdit($id_pengembalian);
        $this->load->view('retur/editRetur', array('data' => $data, 'nama' => $nama));

    }

    public function updateRetur()
    {
        if ("update"){
            $id = $_POST['id'];
            $jumlah = $_POST['jumlah'];
            $tgl_kadaluarsa = $_POST['tgl_kadaluarsa'];
            $this->m_retur->updateRetur($id, $jumlah, $tgl_kadaluarsa);
            echo '<script type="text/javascript">alert("Data berhasil diubah.")</script>';
            $this->index();
        }
    }

     public function viewDetail($tgl_pengembalian){
        $nama = $_SESSION['nama'];
        $data = $this->m_retur->getDetail($tgl_pengembalian);
        $this->load->view('retur/detailRetur', array('data' => $data, 'nama' => $nama));

    }
	

}