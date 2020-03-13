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
}
