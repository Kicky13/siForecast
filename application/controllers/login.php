<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('session');
    }
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		if ('login') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$hasil = $this->m_login->autentikasi($username, $password);
			if ($hasil > 0) {
				$array = $this->m_login->getData($username);
				$_SESSION['level'] = $array[0]['id_level'];
				$_SESSION['nama'] = $array[0]['nama_user'];
				$_SESSION['id'] = $array[0]['id_user'];
				$_SESSION['ktp'] = $array[0]['no_ktp'];
				$_SESSION['alamat'] = $array[0]['alamat'];
				$_SESSION['lahir'] = $array[0]['tgl_lahir'];
				$_SESSION['no_telp'] = $array[0]['no_telp'];
				$_SESSION['username'] = $array[0]['username'];
				$_SESSION['pass'] = $array[0]['password'];
				echo $_SESSION['level'];
				echo '<script type="text/javascript">alert("Anda Berhasil Login!.")</script>';
				if ($_SESSION['level'] == 1) {
					redirect('/dashboard/index/2');
				}
				else{
					redirect('/dashboard/indexuser');
				}
                
			} else {
				echo '<script type="text/javascript">alert("Username atau Password Salah!")</script>';;
				$this->index();
			}
		}
	}

	public function logout(){
        $this->session->unset_userdata('data');
        unset(
            $_SESSION['level']
        );
        $this->index();
    }
}
