<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getUser(){
    	$this->db->select('*');
    	$this->db->from('tb_user');
    	$this->db->join('tb_level', 'tb_user.id_level = tb_level.id_level');
    	$this->db->join('tb_status', 'tb_user.id_status = tb_status.id_status');
    	$this->db->WHERE('tb_user.id_status = 1');
    	$data = $this->db->get();
    	return $data->result();
    }

    public function getDetail($id_user){
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level', 'tb_user.id_level = tb_level.id_level');
        $this->db->WHERE('id_user', $id_user);
        $data = $this->db->get();
        return $data->result();
    }

    public function cekUser($user){
        $sql = $this->db->query('SELECT * from tb_user WHERE username = "'.$user.'"')->num_rows();
        return $sql;
    }

    public function addUser($nama_user, $id_level,$no_ktp,$alamat, $tgl_lahir, $no_telp, $jabatan,  $username,  $password){
        $data = array(
            'id_user' => 'null',
            'nama_user' => $nama_user,
            'id_level' => $id_level,
            'no_ktp' => $no_ktp,
            'alamat' => $alamat,
            'tgl_lahir' => $tgl_lahir,
            'no_telp' => $no_telp,
            'jabatan' => $jabatan,
            'username' => $username,
            'password' => $password,
            'id_status' => 1
        );
        $this->db->insert('tb_user', $data);
    }


    public function updateUser($id, $nama_user, $id_level, $alamat, $no_telp, $jabatan)
    {
        $this->db->set('nama_user', $nama_user);
        $this->db->set('id_level', $id_level);
        $this->db->set('alamat', $alamat);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('jabatan', $jabatan);
        $this->db->where('id_user = '.$id);
        $this->db->update('tb_user');
    }

    public function nonaktif($id_user){
        $this->db->set('id_status', 2, FALSE);
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user');
    }
}
