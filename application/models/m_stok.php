<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stok extends CI_Model {

    public function __construct(){
        parent::__construct();
    }


   public function getBarang(){
        $today = date('Y-m-d H:i:s');
        $data = $this->db->query('SELECT *, IFNULL((SELECT SUM(jumlah) FROM tb_barangmasukdetail WHERE id_barang = b.id_barang),0) pemasukan, 
				        IFNULL((SELECT SUM(jumlah) FROM tb_penjualandetail WHERE id_barang = b.id_barang),0) penjualan, 
				        IFNULL((SELECT SUM(jumlah) FROM tb_pengembaliandetail WHERE id_barang = b.id_barang),0) pengembalian 
				        FROM tb_barang b join tb_supplier s on b.id_supplier = s.id_supplier
				        WHERE (IFNULL((SELECT SUM(jumlah) FROM tb_barangmasukdetail WHERE id_barang = b.id_barang),0) - 
				        IFNULL((SELECT SUM(jumlah) FROM tb_penjualandetail WHERE id_barang = b.id_barang),0) - 
				        IFNULL((SELECT SUM(jumlah) FROM tb_pengembaliandetail WHERE id_barang = b.id_barang),0) ) > 0');
        return $data->result();
    }

    public function notif(){
        $barangs = $this->db->get('tb_barang')->result();
        foreach ($barangs as $barang) {
            $as = $this->getDetail($barang->id_barang);
            foreach ($as as $a) {
                $tglMingguLalu = new DateTime();
                $tglMingguLalu->modify('+1 week');
                $t = $tglMingguLalu->format('Y-m-d');
                if ($a['batas_pengembalian'] == $t) {
                    $data = [
                        'notif' => $barang->nama_barang." , jumlah = ".$a['stock']." harus dikembalikan pada tanggal ",
                        'batas_pengembalian' => $t,
                        'id_barang' =>  $barang->id_barang,
                    ];
                    $this->db->query("DELETE FROM tb_notif WHERE batas_pengembalian < CURRENT_DATE ");
                    $this->db->query("DELETE FROM tb_notif WHERE id_barang = ".$barang->id_barang);
                    $this->db->insert('tb_notif',$data);
                }
            }
        }
    }

    public function printnotif(){
     $this->db->select('*');
        $this->db->from('tb_notif');
        $data = $this->db->get();
        return $data->result_array();   
    }

    public function getDetail($id_barang)
    {
    	$pemasukans = [];
    	$sql = "SELECT * FROM tb_barangmasukdetail c join tb_barang a on c.id_barang = a.id_barang  WHERE a.id_barang = $id_barang ";
    	$data = $this->db->query($sql);
    	foreach ($data->result() as $item) {
    		$sqlPenjualan = "SELECT IFNULL(SUM(jumlah),0) as jml FROM tb_penjualandetail 
    						WHERE id_barang = $id_barang AND tgl_kadaluarsa = '".$item->tgl_kadaluarsa."'";
			$dataPenjualan = $this->db->query($sqlPenjualan)->result();
			$sqlPengembalian = "SELECT IFNULL(SUM(jumlah),0) as jml FROM tb_pengembaliandetail 
    						WHERE id_barang = $id_barang AND tgl_kadaluarsa = '".$item->tgl_kadaluarsa."'";
			$dataPengembalian = $this->db->query($sqlPengembalian)->result();
			if ($item->jumlah > ($dataPenjualan[0]->jml + $dataPengembalian[0]->jml) ) {
				$a['nama_barang'] = $item->nama_barang;
                $a['tgl_barangmasuk'] = $item->tgl_barangmasuk;
				$a['tgl_kadaluarsa'] = $item->tgl_kadaluarsa;
				$a['batas_pengembalian'] = $item->batas_pengembalian;
				$a['stock'] = $item->jumlah - ($dataPenjualan[0]->jml + $dataPengembalian[0]->jml);
				$pemasukans[] = $a;
			}
		}
		return $pemasukans;	
    }

    public function nama($id_barang){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->WHERE('id_barang', $id_barang);
        $data = $this->db->get();
        return $data->result_array();
    }



}