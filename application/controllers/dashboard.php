<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('m_stok');
        $this->load->model('m_dashboard');
        $this->m_stok->notif();
        $this->load->library('session');
    }
	public function index($idBarang)
	{
		$data = $this->m_stok->getBarang();
		$barang = $this->m_dashboard->getBarang();
		$nama = $_SESSION['nama'];
        $notif= $this->m_stok->printnotif();
        $grafik = $this->m_dashboard->grafik($idBarang);
        $namabarang = $this->m_dashboard->cetaknama($idBarang);
		$this->load->view('dashboard/dashboardAdmin', array('nama' => $nama, 'notif' => $notif, 'grafik'=>$grafik, 'barang' => $barang, 'namabarang' => $namabarang));		
	}
	public function set(){
    	$idBarang = $_POST['id_barang'];
    	$grafik = $this->m_dashboard->grafik($idBarang);        
        $this->index();
    }

	public function indexuser(){
		$data = $this->m_stok->getBarang();
		$nama = $_SESSION['nama'];
		$notif= $this->m_stok->printnotif();
		$this->load->view('dashboard/dashboardUser', array('nama' => $nama, 'data' => $data, 'notif' => $notif));
	}

}

