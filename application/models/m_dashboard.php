<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function grafik($idBarang){
    	/*$data = $this->db->query("SELECT * from tb_hasilramal where id_barang = $idBarang and tgl_ramal <= (SELECT max(tgl_ramal) from tb_hasilramal where id_barang = $idBarang)");
        return $data->result();*/
		$data = $this->db->query("SELECT month(max(tgl_ramal)) as tanggal from tb_hasilramal a
		join tb_barang b on a.id_barang=b.id_barang where a.id_barang = $idBarang");
		$b = $data->result();
		$a = $b[0]->tanggal;
//return $a;
		$ia = intval($a);
		$n = $ia+1;
		for ($i=12; $i > 0 ; $i--) { 
			if(($n-1) == 0){
				$bln[] = 12;
				$n = 12;
			}else{
				$bln[] = $n-1;
				$n -= 1;
			}
			$g = $this->db->query("SELECT * from tb_hasilramal where id_barang = $idBarang and month(tgl_ramal) = $n and tgl_ramal <= (SELECT max(tgl_ramal) from tb_hasilramal where id_barang = $idBarang) limit 1");
			$ga = $g->result();
			if(isset($ga[0])){
				$d[] = $ga[0]->nilai_aktual;
				$f[] = $ga[0]->nilai_ramal;
			}else{
				$d[] = 0;
				$f[] = 0;
			}
			$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
			//return 'asdsads';
		}
		
		$semua['bulan'] = $bulan;
		$semua['blnAda'] = $bln;
		$semua['nilai'] = $d;
		$semua['ramal'] = $f;

        return $semua;
    }

    public function getBarang(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $data = $this->db->get();
        return $data->result();
    }

    public function cetaknama($idBarang){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->WHERE('id_barang', $idBarang);
        $data = $this->db->get();
        return $data->result_array();
    }
  }