<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_machine_problem extends CI_Model
{

    public function get_all_by_dept_id($id)
    {
        $this->db->from('itx_m_machine_problem');
        $this->db->where('department_id', $id);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
