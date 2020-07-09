<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_operator extends CI_Model
{

    public function get_data()
    {
        $this->db->from('itx_m_operator');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_nip()
    {
        $id_input_nip = $this->security->xss_clean($this->input->post('id_input_nip'));

        $this->db->from('itx_m_operator');
        $this->db->where('nip', $id_input_nip);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return false;
        }else{
            return true;
        }

    }

    public function add()
    {
        $id_input_name   = $this->security->xss_clean($this->input->post('id_input_name'));
        $id_input_nip    = $this->security->xss_clean($this->input->post('id_input_nip'));
        $id_input_shift  = $this->security->xss_clean($this->input->post('id_input_shift'));
        $id_input_dept   = $this->security->xss_clean($this->input->post('id_input_dept'));
        $id_input_mobile = $this->security->xss_clean($this->input->post('id_input_mobile'));

        $data = array(
            'name'          => $id_input_name,
            'nip'           => $id_input_nip,
            'shift'         => $id_input_shift,
            'department_id' => $id_input_dept,
            'mobile'        => $id_input_mobile,
        );

        $this->db->insert('itx_m_operator', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

}
