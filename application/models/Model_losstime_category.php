<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_losstime_category extends CI_Model
{

    public function get_all()
    {
        $this->db->from('itx_m_losstime_category');
        $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
