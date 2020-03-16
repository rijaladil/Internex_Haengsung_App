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

    public function add()
    {
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $this->db->set('createUser', 'System');
        $this->db->set('name', $text_name);
        $this->db->insert('itx_m_losstime_category');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

}
