<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getSupplier(){
    	$this->db->select('*');
    	$this->db->from('tb_supplier');
    	$data = $this->db->get();
    	return $data->result();
    }

    public function getEdit($id_supplier){
        $this->db->select('*');
        $this->db->from('tb_supplier');
        $this->db->WHERE('id_supplier',$id_supplier);
        $data = $this->db->get();
        return $data->result_object();
    }

    public function addSupplier($nama_supplier, $alamat, $no_tlp){
    	$data= array(
    		'id_supplier' => 'null',
    		'nama_supplier' => $nama_supplier,
    		'alamat' => $alamat,
    		'no_tlp' => $no_tlp
    	);
    	$this->db->insert('tb_supplier', $data);
    }

    public function updateSupplier($id, $nama_supplier, $alamat, $no_tlp)
    {
        $this->db->set('nama_supplier', $nama_supplier);
        $this->db->set('alamat', $alamat);
        $this->db->set('no_tlp', $no_tlp);
        $this->db->where('id_supplier = '.$id);
        $this->db->update('tb_supplier');
    }

}