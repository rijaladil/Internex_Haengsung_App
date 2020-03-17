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

    public function add()
    {
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $text_dept = $this->security->xss_clean($this->input->post('text_dept'));

        $this->db->select('count(*) jum');
        $this->db->from('itx_m_machine_problem');
        $this->db->where('name', $text_name);
        $this->db->where('department_id', $text_dept);
        $query = $this->db->get();
        $jum = $query->row()->jum;

        if ($jum == 0) {
            $this->db->set('createUser', 'System');
            $this->db->set('name', $text_name);
            $this->db->set('department_id', $text_dept);
            $this->db->insert('itx_m_machine_problem');
        }

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function update()
    {
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $id = $this->security->xss_clean($this->input->post('text_id'));
        $this->db->set('editUser', 'System');
        $this->db->set('name', $text_name);
        $this->db->where('id', $id);
        $this->db->update('itx_m_machine_problem');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

}
