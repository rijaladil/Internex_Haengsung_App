<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_department extends CI_Model
{

    public function get_all()
    {
        $this->db->from('itx_m_department');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_department_by_id($id)
    {
        $this->db->from('itx_m_department');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
