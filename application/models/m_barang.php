<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getBarang(){
    	$this->db->select('*');
    	$this->db->from('tb_barang');
    	$this->db->join('tb_supplier', 'tb_barang.id_supplier = tb_supplier.id_supplier');
    	$this->db->join('tb_status', 'tb_barang.id_status = tb_status.id_status');
    	$this->db->WHERE('tb_barang.id_status = 1');
    	$data = $this->db->get();
    	return $data->result();
    }

    public function addBarang($nama_barang, $id_supplier, $harga_barang, $waktu_pengiriman){
        $data = array(
            'id_barang' => 'null',
            'nama_barang' => $nama_barang,
            'id_supplier' => $id_supplier,
            'harga_barang' => $harga_barang,
            'waktu_pengiriman' => $waktu_pengiriman,
            'id_status' => 1
        );
        $this->db->insert('tb_barang', $data);
    }

    public function getSupplier(){
        $this->db->select('*');
        $this->db->from('tb_supplier');
        $data = $this->db->get();
        return $data->result();
    }

     public function getEdit($id_barang){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('tb_supplier', 'tb_barang.id_supplier= tb_supplier.id_supplier');
        $this->db->WHERE('id_barang', $id_barang);
        $data = $this->db->get();
        return $data->result();
    }

    public function updateBarang($id, $nama_barang, $harga_barang, $waktu_pengiriman)
    {
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('harga_barang', $harga_barang);
        $this->db->set('waktu_pengiriman', $waktu_pengiriman);
        $this->db->where('id_barang = '.$id);
        $this->db->update('tb_barang');
    }

     public function nonaktifbarang($id_barang){
        $this->db->set('id_status', 2, FALSE);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
    }
}
