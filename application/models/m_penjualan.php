<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

	public function getPenjualan(){
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('tb_penjualandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_penjualandetail.id_barang');
         $this->db->where('tgl_penjualan', $now);
        $data = $this->db->get();
        return $data->result();
    }

    public function getBarang(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $data = $this->db->get();
        return $data->result();
    }


    public function addPenjualan($id_user, $id_barang, $jumlah, $tgl_kadaluarsa){
        date_default_timezone_set('Asia/Jakarta'); 
        $now = date('Y-m-d H:i:s');
        $data = array(
            'id_penjualan' => 'null',
            'tgl_penjualan' => $now,
            'id_user' => $id_user, 
            'id_barang'=> $id_barang,
            'jumlah'=>$jumlah,
            'tgl_kadaluarsa'=>$tgl_kadaluarsa
        );
        $this->db->insert('tb_penjualandetail', $data);
    }

    public function getEdit($id_penjualan){
        $this->db->select('*');
        $this->db->from('tb_penjualandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang= tb_penjualandetail.id_barang');
        $this->db->WHERE('id_penjualan', $id_penjualan);
        $data = $this->db->get();
        return $data->result();
    }

    public function updatePenjualan($id, $jumlah, $tgl_kadaluarsa)
    {
        $this->db->set('jumlah', $jumlah);
        $this->db->set('tgl_kadaluarsa', $tgl_kadaluarsa);
        $this->db->where('id_penjualan = '.$id);
        $this->db->update('tb_penjualandetail');
    }

    public function getTanggal($bulan,$tahun){
        $this->db->select('*, MONTH(tgl_penjualan) AS bulan, YEAR(tgl_penjualan) as tahun');
        $this->db->from('tb_penjualandetail');
        if($bulan!=""){
        $this->db->where('MONTH(tgl_penjualan)',$bulan);            
        }
        if ($tahun!="") {
        $this->db->where("YEAR(tgl_penjualan)",$tahun);
        }

        $this->db->group_by("tgl_penjualan");
        $data = $this->db->get();
        return $data->result();
    }

    public function getBulan($tahun){
        $this->db->select('*, month(tgl_penjualan) as bulan , YEAR(tgl_penjualan) as tahun, SUM(jumlah) as total');
        $this->db->from('tb_penjualandetail');
         if ($tahun!="") {
        $this->db->where("YEAR(tgl_penjualan)",$tahun);
        }
        $this->db->group_by("month(tgl_penjualan), YEAR(tgl_penjualan)");
         $data = $this->db->get();
        return $data->result();
        
    }

   public function getBulanan(){
        $this->db->select('month(tgl_penjualan) as bulan, YEAR(tgl_penjualan) as tahun, nama_barang, SUM(jumlah) as total');
        $this->db->from('tb_penjualandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_penjualandetail.id_barang');       
        $this->db->group_by("month(tgl_penjualan), YEAR(tgl_penjualan), tb_penjualandetail.id_barang");
        $data = $this->db->get(); 
        return $data->result();     
        }

    public function getDetail($tgl_penjualan){
        $this->db->select('*, SUM(jumlah) as total');
        $this->db->from('tb_penjualandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_penjualandetail.id_barang');
        $this->db->join('tb_user', 'tb_user.id_user = tb_penjualandetail.id_user');
        $this->db->join('tb_supplier', 'tb_barang.id_supplier = tb_supplier.id_supplier');
        $where = "date(tgl_penjualan) = ' $tgl_penjualan'";
        $this->db->WHERE($where);
        $this->db->group_by("tgl_penjualan, tb_penjualandetail.id_barang");
        $data = $this->db->get();
        return $data->result();
    }

    public function cetaktanggal($tgl_penjualan){
        $this->db->select('*');
        $this->db->from('tb_penjualandetail');
        $this->db->WHERE('tgl_penjualan', $tgl_penjualan);
        $this->db->group_by('tgl_penjualan');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function getdetailBulan($bulan, $tahun){
        $this->db->select('*,SUM(jumlah) as total, SUM(jumlah*harga_barang) as totalharga, month(tgl_penjualan) as bulan, YEAR(tgl_penjualan) as tahun');
        $this->db->from('tb_penjualandetail');
        $this->db->join('tb_barang', 'tb_barang.id_barang = tb_penjualandetail.id_barang');
         $this->db->join('tb_user', 'tb_user.id_user = tb_penjualandetail.id_user');
        $this->db->join('tb_supplier', 'tb_barang.id_supplier = tb_supplier.id_supplier');        
        $where = "month(tgl_penjualan) = ' $bulan' and YEAR(tgl_penjualan) = '$tahun'";
        $this->db->WHERE($where);
        $this->db->group_by("month(tgl_penjualan), tb_penjualandetail.id_barang,  YEAR(tgl_penjualan)");
        $data = $this->db->get();
        return $data->result();
    }
}