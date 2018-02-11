<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_retur extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

	public function getRetur(){
        $this->db->select('* ');
        $this->db->from('tb_pengembaliandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_pengembaliandetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_pengembaliandetail.id_user');
      
        $data = $this->db->get();
        return $data->result();
    }


    public function getBarang(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $data = $this->db->get();
        return $data->result();
    }

 	public function addRetur($id_user, $id_barang, $jumlah, $tgl_kadaluarsa){
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d H:i:s');
        $data = array(
            'id_pengembalian' => 'null',
            'tgl_pengembalian' => $now,
            'id_user' => $id_user, 
            'id_barang'=> $id_barang,
            'jumlah'=>$jumlah,
            'tgl_kadaluarsa'=>$tgl_kadaluarsa
        );
        $this->db->insert('tb_pengembaliandetail', $data);
    }

     public function getEdit($id_pengembalian){
        $this->db->select('*');
        $this->db->from('tb_pengembaliandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang= tb_pengembaliandetail.id_barang');
        $this->db->WHERE('id_pengembalian', $id_pengembalian);
        $data = $this->db->get();
        return $data->result();
    }

    public function updateRetur($id, $jumlah, $tgl_kadaluarsa)
    {
        $this->db->set('jumlah', $jumlah);
        $this->db->set('tgl_kadaluarsa', $tgl_kadaluarsa);
        $this->db->where('id_pengembalian = '.$id);
        $this->db->update('tb_pengembaliandetail');
    }


    public function getTanggal($bulan,$tahun){
        $this->db->select('*, MONTH(tgl_pengembalian) AS bulan, YEAR(tgl_pengembalian) as tahun');
        $this->db->from('tb_pengembaliandetail');
          if($bulan!=""){
        $this->db->where('MONTH(tgl_pengembalian)',$bulan);            
        }
        if ($tahun!="") {
        $this->db->where("YEAR(tgl_pengembalian)",$tahun);
        }
        $this->db->group_by("tgl_pengembalian");
        $data = $this->db->get();
        return $data->result();
    }

    public function getDetail($tgl_pengembalian){
        $this->db->select('*');
        $this->db->from('tb_pengembaliandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_pengembaliandetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_pengembaliandetail.id_user');
        $where = "date(tgl_pengembalian) = ' $tgl_pengembalian'";
        $this->db->WHERE($where);
        $data = $this->db->get();
        return $data->result();
    }

 }