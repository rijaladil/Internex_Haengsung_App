<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function get_all()
    {
        $this->db->select('user.nip, user.name, dept.name dept, level.name level, level.id levelId');
        $this->db->from('itx_m_user user');
        $this->db->join('itx_m_user_level level', 'level.id = user.user_level_id');
        $this->db->join('itx_m_department dept', 'dept.id = user.department_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
