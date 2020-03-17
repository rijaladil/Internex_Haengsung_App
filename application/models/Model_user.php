<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function get_all()
    {
        $this->db->select('user.nip, user.name, dept.name dept, dept.id deptId, level.name level, level.id levelId');
        $this->db->from('itx_m_user user');
        $this->db->join('itx_m_user_level level', 'level.id = user.user_level_id');
        $this->db->join('itx_m_department dept', 'dept.id = user.department_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_op()
    {
        $this->db->select('user.nip, user.name, dept.name dept, level.name level, level.id levelId');
        $this->db->from('itx_m_user user');
        $this->db->join('itx_m_user_level level', 'level.id = user.user_level_id');
        $this->db->join('itx_m_department dept', 'dept.id = user.department_id');
        $this->db->where('level.id', '1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function user_add()
    {
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $text_nip = $this->security->xss_clean($this->input->post('text_nip'));
        $text_level = $this->security->xss_clean($this->input->post('text_level'));
        $text_dept = $this->security->xss_clean($this->input->post('text_dept'));
        $text_pass = $this->security->xss_clean($this->input->post('text_pass'));
        $this->db->set('createUser', 'System');
        $this->db->set('name', $text_name);
        $this->db->set('nip', $text_nip);
        $this->db->set('user_level_id', $text_level);
        $this->db->set('department_id', $text_dept);
        $this->db->set('password', sha1($text_pass));
        $this->db->insert('itx_m_user');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function user_update()
    {
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $text_nip = $this->security->xss_clean($this->input->post('text_nip'));
        $text_level = $this->security->xss_clean($this->input->post('text_level'));
        $text_dept = $this->security->xss_clean($this->input->post('text_dept'));
        $this->db->set('editUser', 'System');
        $this->db->set('name', $text_name);
        $this->db->set('user_level_id', $text_level);
        $this->db->set('department_id', $text_dept);
        $this->db->where('nip', $text_nip);
        $this->db->update('itx_m_user');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }
}
