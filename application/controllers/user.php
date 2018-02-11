<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_user');
    }
	public function index()
    {
        $nama = $_SESSION['nama'];
    	$data = $this->m_user->getUser();
		$this->load->view('user/user', array('data' => $data,  'nama' => $nama));
	}
	
	public function viewadduser(){
        $nama = $_SESSION['nama'];
		$this->load->view('user/tambahUser', array('nama' => $nama));

    }
	public function viewdetail($id_user){
        $nama = $_SESSION['nama'];
		$data = $this->m_user->getDetail($id_user);
		$this->load->view('user/detailuser', array('data' => $data, 'nama' => $nama));

	}

    public function viewprofil($id_user){
        $nama = $_SESSION['nama'];
        $id_user = $_SESSION['id'];
        $level = $_SESSION['level'];
        if ($level == 1) {
            $data = $this->m_user->getDetail($id_user);
            $this->load->view('user/profilAdmin', array('data' => $data, 'nama' => $nama));
        } else {
            $data = $this->m_user->getDetail($id_user);
            $this->load->view('user/profilUser', array('data' => $data, 'nama' => $nama));
        }
       

    }

    public function viewUpdate($id_user){
        $nama = $_SESSION['nama'];
        $data = $this->m_user->getDetail($id_user);
        $this->load->view('user/editUser', array('data' => $data, 'nama' => $nama));

    }

	 public function addUser(){
        
            $nama_user = $_POST['nama_user'];
            $id_level = $_POST['id_level'];
            $no_ktp = $_POST['no_ktp'];
            $alamat = $_POST['alamat'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $no_telp = $_POST['no_telp'];
            $jabatan = $_POST['jabatan'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cek = $this->m_user->cekUser($username);
           if ($cek > 0){
                echo '<script type="text/javascript">alert("Username telah digunakan!.")</script>';
                $this->form();
            } else {
                $this->m_user->addUser($nama_user, $id_level,$no_ktp,$alamat, $tgl_lahir, $no_telp, $jabatan,  $username,  $password);
                 echo '<script type="text/javascript">alert("Berhasil ditambahkan!")</script>';
                $this->index();
            }        
    }

    public function updateUser()
    {
        if ("update"){
            $id = $_POST['id'];
            $nama_user = $_POST['nama_user'];
            $id_level = $_POST['id_level'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];
            $jabatan = $_POST['jabatan'];
            $this->m_user->updateUser($id, $nama_user, $id_level, $alamat, $no_telp, $jabatan); 
             echo '<script type="text/javascript">alert("Data Berhasil Diubah!")</script>';                  
            redirect('/user');
        }
    }

    public function statususer($id_user){
            $this->m_user->nonaktif($id_user);
             echo '<script type="text/javascript">alert("Berhasil dinon-aktifkan!")</script>';
            $this->index();
    }

}