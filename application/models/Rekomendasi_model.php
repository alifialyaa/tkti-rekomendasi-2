<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi_model extends CI_Model
{
    private $_table = "rekomendasi";

    public $id_rekomendasi;
    public $id_pertanyaan;
    public $rekomendasi;

    public function getAll()
    {
        $this->db->select('id_rekomendasi, id_pertanyaan, rekomendasi');
        $this->db->from('rekomendasi');
        $query = $this->db->get();
        return $query->result();
    }

    public function getRecomend($level = null, $id_it_process= null){

        $sql='SELECT rekomendasi.id_pertanyaan, rekomendasi.id_rekomendasi, rekomendasi.rekomendasi FROM rekomendasi, pertanyaan WHERE rekomendasi.id_pertanyaan = pertanyaan.id_pertanyaan and pertanyaan.level = '.$level.' and pertanyaan.id_it_process = ' .$id_it_process.';';
        $query=$this->db->query($sql);
        return $query->result();       
    }

    public function getIdLevel($id){
        $sql='SELECT * FROM rekomendasi WHERE ';
        $n = count($id);
        for ($i=0; $i < $n;) { 
            $sql .= "rekomendasi.id_rekomendasi = ";
            $sql .= $id[$i];
            $i++;
            if ($i<$n) {
                $sql .= " or ";
            }
        }

        $query=$this->db->query($sql);
        return $query->result();       
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_rekomendasi" => $id])->row();
    }
}
