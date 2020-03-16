<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user_level extends CI_Model
{

    public function get_all()
    {
        $this->db->from('itx_m_user_level');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

}
