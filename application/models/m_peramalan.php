<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peramalan extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    public function getBarang(){
        $this->db->select('*');
        $this->db->from('tb_barang');
        $data = $this->db->get();
        return $data->result();
    }

    public function getramal(){
        $this->db->select('*');
        $this->db->from('tb_hasilramal');
        $this->db->join('tb_barang', 'tb_barang.id_barang= tb_hasilramal.id_barang');
        $where = "(nilai_ramal) <> 0";
        $this->db->where($where);
        $this->db->order_by('tgl_ramal desc');
        $data = $this->db->get();
        return $data->result();
    }
    public function ramalBulan(){
        $data = $this->db->query('SELECT * FROM tb_hasilramal h JOIN tb_barang b on b.id_barang = h.id_barang ORDER BY id_ramal DESC LIMIT 1');
        return $data->result_array();
    }
    public function getStok($id){
        $data = $this->db->query('SELECT *, IFNULL((SELECT SUM(jumlah) FROM tb_barangmasukdetail WHERE id_barang = b.id_barang),0) pemasukan, 
                        IFNULL((SELECT SUM(jumlah) FROM tb_penjualandetail WHERE id_barang = b.id_barang),0) penjualan, 
                        IFNULL((SELECT SUM(jumlah) FROM tb_pengembaliandetail WHERE id_barang = b.id_barang),0) pengembalian 
                        FROM tb_barang b join tb_supplier s on b.id_supplier = s.id_supplier
                        WHERE (IFNULL((SELECT SUM(jumlah) FROM tb_barangmasukdetail WHERE id_barang = b.id_barang),0) - 
                        IFNULL((SELECT SUM(jumlah) FROM tb_penjualandetail WHERE id_barang = b.id_barang),0) - 
                        IFNULL((SELECT SUM(jumlah) FROM tb_pengembaliandetail WHERE id_barang = b.id_barang),0) ) > 0 AND b.id_barang = '.$id);
        return $data->result_array();
    }

    public function hitung($idBarang){
        $alfasingle=0.4;
        $alfadouble=0.4;
        $alfatriple=0.4;    
        $data=$this->db->query("SELECT sum(jumlah) as jumlah, tgl_penjualan from tb_penjualandetail where id_barang =$idBarang group by month(tgl_penjualan) order by tgl_penjualan desc limit 1");
        

        $dataramal = $this->db->query("SELECT * from tb_ramalan_single where id_barang = $idBarang
            order by tgl_ramal desc limit 1");

        $ramala = $dataramal->result();
        $aktual = $data->result();

        $a = $aktual[0]->jumlah;
        $r1 = $ramala[0]->nilai_ramalan;
        $single = ($alfasingle*$a)+((1-$alfasingle)*$r1);
        $mapeSingle = (abs($a-$r1)/$a)*100;

        $data= array(      
            'nilai_mape' => $mapeSingle,
        );
        
         $this->db->where('id_ramal', ($ramala[0]->id_ramal));
        $this->db->update('tb_ramalan_single', $data);
   
        $dataramalsemua = $this->db->query("SELECT sum(nilai_mape) as jumlah from tb_ramalan_single where id_barang = $idBarang and 
            tgl_ramal>= DATE_ADD((select tgl_ramal from tb_ramalan_single order by tgl_ramal desc limit 1),interval -11 month) 
            order by tgl_ramal");

        $jumlahmapesingle = $dataramalsemua->result();

       $maperata2single =  $jumlahmapesingle[0]->jumlah / 12;
  

        $dataramal2 = $this->db->query("SELECT * from tb_ramalan_double where id_barang = $idBarang
            order by tgl_ramal desc limit 1");


        $semuadataramal2 = $this->db->query("SELECT sum(nilai_mape) as jumlah  from tb_ramalan_double where id_barang = $idBarang
                 and tgl_ramal>= DATE_ADD((select tgl_ramal from tb_ramalan_double order by tgl_ramal desc limit 1),interval -11 month) order by tgl_ramal");
        
        $ramalb = $dataramal2->result();

        $r2 = $ramalb[0]->ramal2;   
        $nilairamal2=$ramalb[0]->nilai_ramal;
        $ramal2 = ($alfadouble * $single)+((1-$alfadouble)*$r2);
        $at = (2*$single)-$ramal2;
        $bt = ($alfadouble / (1-$alfadouble))*($single-$ramal2);
        $double = $at + $bt;
        $mapeDouble = (abs($a-$nilairamal2)/$a)*100;
       

         $data= array(      
            'nilai_mape' => $mapeDouble,
        );
        
         $this->db->where('id_ramal', ($ramalb[0]->id_ramal));
         $this->db->update('tb_ramalan_double', $data);      
         $jumlahmapedouble = $semuadataramal2->result();
         $maperata2double =  $jumlahmapedouble[0]->jumlah / 12;


        $dataramal3 = $this->db->query("SELECT * from tb_ramal_triple where id_barang = $idBarang
            order by tgl_ramal desc limit 1");

        $semuadataramal3 = $this->db->query("SELECT sum(nilai_mape) as jumlah  from tb_ramal_triple where id_barang = $idBarang
                 and tgl_ramal>= DATE_ADD((select tgl_ramal from tb_ramal_triple order by tgl_ramal desc limit 1),interval -11 month) order by tgl_ramal");
      

        $ramalc = $dataramal3->result();
        $r3 = $ramalc[0]->ramal3;
            $ramal3 = ($alfatriple * $ramal2)+((1-$alfatriple)*$r3);
            $nilairamal3=$ramalc[0]->nilai_ramalan;
            $at3 = (3*$single)-(3*$ramal2)+$ramal3;
            $bt3 = $alfatriple / (((2*(1-$alfatriple))*(6-(5*$alfatriple)) *$single) - ((10-(8*$alfatriple))*$ramal2)+((4-(3*$alfatriple))*$ramal3));            $pangkat1 = pow($alfatriple, 2);
            $pangkat2 = pow((1-$alfatriple), 2);
            $x=($single - (2*$ramal2) + $ramal3);
            if ($x==0) {
                    $ct=0;
            }else{
                    $ct = $pangkat1 / (2*$pangkat2 * ($single - (2*$ramal2) + $ramal3));                
            }
            $triple = $at3 + $bt3 + (0.5 * $ct);
            $mapeTriple = (abs($a-$nilairamal3)/$a)*100;
            

        $data= array(      
            'nilai_mape' => $mapeTriple,
        );
        
        $this->db->where('id_ramal', ($ramalc[0]->id_ramal));
        $this->db->update('tb_ramal_triple', $data); 
        $jumlahmapetriple = $semuadataramal3->result();
        $maperata2triple =  $jumlahmapetriple[0]->jumlah / 12;                
        
        $hasil['ramal']['single'] = $single;
        $hasil['ramal']['double'] = $double;
        $hasil['ramal']['triple'] = $triple;

        $hasil['mape']['single'] = $maperata2single;
        $hasil['mape']['double'] = $maperata2double;
        $hasil['mape']['triple'] = $maperata2triple;

        $hasilramal = $this->db->query("SELECT * from tb_hasilramal where id_barang = $idBarang
            order by tgl_ramal desc limit 1");

        $rhasilramal = $hasilramal->result();
        $nilai =  $rhasilramal[0]->nilai_ramal;
        $cari1= $this->db->query("SELECT * from tb_ramalan_single where id_barang = $idBarang and nilai_ramalan = $nilai
            order by tgl_ramal desc limit 1");

        $cari2 = $this->db->query("SELECT * from tb_ramalan_double where id_barang = $idBarang and nilai_ramal = $nilai
            order by tgl_ramal desc limit 1");

        $cari3 = $this->db->query("SELECT * from tb_ramal_triple where id_barang = $idBarang and nilai_ramalan = $nilai
            order by tgl_ramal desc limit 1");

        $rcari[1] = $cari1->result();
        $rcari[2] = $cari2->result();
        $rcari[3] = $cari3->result();

        if (!empty($rcari[1])) {
            $mapehasil = $rcari[1][0]->nilai_mape;
        }
        else if (!empty($rcari[2]) ) {
            $mapehasil = $rcari[2][0]->nilai_mape;

        }else if (!empty($rcari[3]) ) {
            $mapehasil = $rcari[3][0]   ->nilai_mape;

        }else{
            $mapehasil = 0;
        }

        $data= array(      
            'nilai_mape' => $mapehasil,
            'nilai_aktual' => $a
        );
        
        $this->db->where('id', ($rhasilramal[0]->id));
        $this->db->update('tb_hasilramal', $data); 


        $c = min($hasil['mape']);
        $b =array_search($c, $hasil['mape']); 
        $bagus['nama'] = $b;
        $bagus['nilai'] = $hasil['ramal'][$b];
        
        $nama="Tidak terdefinisi";        
         if ($bagus['nama']=="single") {         
             $namametode="Single Exponential Smoothing";
         }else if($bagus['nama']=="double"){     
             $namametode="Double Exponential Smoothing";
         }else if($bagus['nama']=="triple"){       
             $namametode="Triple Exponential Smoothing";
         }
         $data= array(
            'id' => 'null',
            'id_barang' => $idBarang,           
            'tgl_ramal' => date("Y-m-d h:i:s"),
            'nilai_aktual' => 0,
            'nilai_ramal' => $bagus['nilai'],
            'nilai_mape' => 0,
            'nama_metode'=> $namametode
        );
        $this->db->insert('tb_hasilramal', $data);     
     
        $idterakhirquery=$this->db->query("select id from tb_hasilramal order by id desc limit 1");
        $idterakhir=$idterakhirquery->result();

        $data= array(
            'id_ramal' => 'null',
            'id'=>($idterakhir[0]->id),
            'id_barang' => $idBarang,           
            'nilai_ramalan' => $hasil['ramal']['single'],
            'nilai_mape' => 0,

        );        
        $this->db->insert('tb_ramalan_single', $data);

        $data= array(
            'id_ramal' => 'null', 
            'id'=>($idterakhir[0]->id),
            'id_barang' => $idBarang,
            'nilai_ramal' => $hasil['ramal']['double'],
            'nilai_mape' => 0,
            'ramal2' => $ramal2
        );
   
        $this->db->insert('tb_ramalan_double', $data);
        
        $data= array(
            'id_ramal' => 'null',
            'id'=>($idterakhir[0]->id),
            'id_barang' => $idBarang,           
            'nilai_ramalan' => $hasil['ramal']['triple'],
            'nilai_mape' => 0,
            'ramal3' => $ramal3
        );
        $this->db->insert('tb_ramal_triple', $data);

        return $bagus;
    }     
  
}


   