<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_machine extends CI_Model
{

    public function get_by_dept_id($id)
    {
        $this->db->from('itx_m_machine');
        $this->db->where('department_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_line_setting()
    {
        $this->db->select('
        	mc.name as name,
        	mc.mc_no,
        	dept.name as dept
        	');
        $this->db->from('itx_m_machine mc');
        $this->db->join('itx_m_department dept', 'dept.id = mc.department_id');
        $this->db->order_by('dept.name', 'asc');
        $this->db->order_by('mc_no', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
