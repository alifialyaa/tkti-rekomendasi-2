<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Process_model extends CI_Model
{
    private $_table = "it_process";

    public $id_it_process;
    public $id_domain;
    public $it_process;
    public $importance;

    public function getAll($id_jenis_perusahaan, $id_it_resource, $id_domain)
    {
        if ($id_jenis_perusahaan == '1')
        {
            $this->db->select('it_process.id_it_process, it_process.id_domain, it_process.it_process, it_process.importance, mapping_it_resource_process.id_it_resource');
            $this->db->distinct();
            $this->db->from('it_process');
            $this->db->join('mapping_it_resource_process', 'mapping_it_resource_process.id_it_process = it_process.id_it_process');
            $this->db->where('mapping_it_resource_process.id_it_resource', $id_it_resource);
            $this->db->where('it_process.id_domain', $id_domain);
            $this->db->where("(it_process.importance='H')");
            $query = $this->db->get();
            return $query->result();
        }
        else if ($id_jenis_perusahaan == '2')
        {
            $this->db->select('it_process.id_it_process, it_process.id_domain, it_process.it_process, it_process.importance, mapping_it_resource_process.id_it_resource');
            $this->db->from('it_process');
            $this->db->join('mapping_it_resource_process', 'mapping_it_resource_process.id_it_process = it_process.id_it_process');
            $this->db->where('mapping_it_resource_process.id_it_resource', $id_it_resource);
            $this->db->where('it_process.id_domain', $id_domain);
            $this->db->where("(it_process.importance='H' OR it_process.importance='M')");
            $query = $this->db->get();
            return $query->result();
        }
        else
        {
            $this->db->select('it_process.id_it_process, it_process.id_domain, it_process.it_process, it_process.importance, mapping_it_resource_process.id_it_resource');
            $this->db->from('it_process');
            $this->db->join('mapping_it_resource_process', 'mapping_it_resource_process.id_it_process = it_process.id_it_process');
            $this->db->where('mapping_it_resource_process.id_it_resource', $id_it_resource);
            $this->db->where('it_process.id_domain', $id_domain);
            $this->db->where("(it_process.importance='H' OR it_process.importance='M' OR it_process.importance='L')");
            $query = $this->db->get();
            return $query->result();
        }
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_it_process" => $id])->row();
    }
}
