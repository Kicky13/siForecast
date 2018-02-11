<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barangmasuk extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    public function getBarangmasuk(){
        $this->db->select('*');
        $this->db->from('tb_barangmasukdetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_barangmasukdetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_barangmasukdetail.id_user');
        $data = $this->db->get();
        return $data->result();
    }

    public function getTanggal($bulan,$tahun){
        $this->db->select('*, MONTH(tgl_barangmasuk) AS bulan, YEAR(tgl_barangmasuk) as tahun');
        $this->db->from('tb_barangmasukdetail');
        if($bulan!=""){
        $this->db->where('MONTH(tgl_barangmasuk)',$bulan);            
        }
        if ($tahun!="") {
        $this->db->where("YEAR(tgl_barangmasuk)",$tahun);
        }

        $this->db->group_by("tgl_barangmasuk");
        $data = $this->db->get();
        return $data->result();
    }

    public function getBarang(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $data = $this->db->get();
        return $data->result();
    }

    public function getDetail($tgl_barangmasuk){
        $this->db->select('*');
        $this->db->from('tb_barangmasukdetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_barangmasukdetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_barangmasukdetail.id_user');
        $where = "date(tgl_barangmasuk) = ' $tgl_barangmasuk'";
        $this->db->WHERE($where);        
        $data = $this->db->get();
        return $data->result();
    }

    public function getDetailTanggal($tgl_barangmasuk){
        $this->db->select('*');
        $this->db->from('tb_barangmasukdetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_barangmasukdetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_barangmasukdetail.id_user');
        $where = "date(tgl_barangmasuk) = ' $tgl_barangmasuk'";
        $this->db->WHERE($where);
        $this->db->group_by('tgl_barangmasuk');
        $data = $this->db->get();
        return $data->result_array();
    }

    
   public function addBM($id_user, $id_barang, $jumlah, $tgl_kadaluarsa, $batas_pengembalian){
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $data = array(
            'id_barangmasuk' => 'null',
            'tgl_barangmasuk' => $now,
            'id_user' => $id_user, 
            'id_barang'=> $id_barang,
            'jumlah'=>$jumlah,
            'tgl_kadaluarsa'=>$tgl_kadaluarsa,
            'batas_pengembalian'=>$batas_pengembalian
        );
        $this->db->insert('tb_barangmasukdetail', $data);
    }

     public function getEdit($id_barangmasuk){
        $this->db->select('*');
        $this->db->from('tb_barangmasukdetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang= tb_barangmasukdetail.id_barang');
        $this->db->WHERE('id_barangmasuk', $id_barangmasuk);
        $data = $this->db->get();
        return $data->result();
    }

    public function updateBM($id, $jumlah, $tgl_kadaluarsa, $batas_pengembalian)
    {
        $this->db->set('jumlah', $jumlah);
        $this->db->set('tgl_kadaluarsa', $tgl_kadaluarsa);
        $this->db->set('batas_pengembalian', $batas_pengembalian);
        $this->db->where('id_barangmasuk = '.$id);
        $this->db->update('tb_barangmasukdetail');
    }
}
