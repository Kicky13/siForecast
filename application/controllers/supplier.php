<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->library('session');

    }

    public function index()
	{
		$nama = $_SESSION['nama'];
		$level = $_SESSION['level'];
		if ($level == 1) {
			$data = $this->m_supplier->getSupplier();
			$this->load->view('supplier/supplierAdmin', array('data' => $data, 'nama' => $nama));
		} else {
			$data = $this->m_supplier->getSupplier();
			$this->load->view('supplier/supplierUser' , array('data' => $data, 'nama' => $nama));
		}
	}
	
	public function viewaddsupplier(){
		$nama = $_SESSION['nama'];
		$this->load->view('supplier/addSupplier', array('nama' => $nama));
	}

	public function addSupplier(){
		if ('submit'){
			$nama_supplier = $_POST['nama_supplier'];
			$alamat = $_POST['alamat'];
			$no_tlp = $_POST['no_tlp'];
			$this->m_supplier->addSupplier($nama_supplier, $alamat, $no_tlp);
            echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
            $this->index();			
		}
	}

	 public function viewUpdate($id_supplier){
	 	$nama = $_SESSION['nama'];
        $data = $this->m_supplier->getEdit($id_supplier);
        $this->load->view('supplier/editSupplier', array('data' => $data, 'nama' => $nama));

    }

    public function updateSupplier()
    {
        if ("update"){
            $id = $_POST['id'];
            $nama_supplier = $_POST['nama_supplier'];
            $alamat = $_POST['alamat'];
            $no_tlp = $_POST['no_tlp'];
            $this->m_supplier->updateSupplier($id, $nama_supplier, $alamat, $no_tlp);
            echo '<script type="text/javascript">alert("Data berhasil diubah.")</script>';
            $this->index();
        }
    }
}