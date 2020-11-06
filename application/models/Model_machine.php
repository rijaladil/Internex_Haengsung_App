<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_machine extends CI_Model
{

    public function get_by_dept_id($id='')
    {
        
        $this->db->from('itx_m_machine');
        if ($id <> '') {
            # code...
            $this->db->where('department_id', $id);
        }
        $this->db->order_by('mc_no', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail($id)
    {
        $this->db->from('itx_m_machine');
        $this->db->where('mc_no_alias2', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_line_setting()
    {
        $this->db->select('
        	mc.id,
        	mc.name as name,
        	mc.remark,
        	mc.mc_no,
        	mc.ip_address,
        	dept.name as dept,
        	dept.id as deptId

        	');
        $this->db->from('itx_m_machine mc');
        $this->db->join('itx_m_department dept', 'dept.id = mc.department_id');
        $this->db->order_by('dept.name', 'asc');
        $this->db->order_by('mc_no', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update()
    {
        $hid = $this->security->xss_clean($this->input->post('hid'));
        $text_mcno = $this->security->xss_clean($this->input->post('text_mcno'));
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $text_ip = $this->security->xss_clean($this->input->post('text_ip'));
        $text_remark = $this->security->xss_clean($this->input->post('text_remark'));
        $text_dept = $this->security->xss_clean($this->input->post('text_dept'));

        $this->db->set('mc_no', $text_mcno);
        $this->db->set('name', $text_name);
        $this->db->set('ip_address', $text_ip);
        $this->db->set('remark', $text_remark);
        $this->db->set('department_id', $text_dept);
        $this->db->where('id', $hid);
        $this->db->update('itx_m_machine');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function add()
    {
        $text_mcno = $this->security->xss_clean($this->input->post('text_mcno'));
        $text_name = $this->security->xss_clean($this->input->post('text_name'));
        $text_ip = $this->security->xss_clean($this->input->post('text_ip'));
        $text_dept = $this->security->xss_clean($this->input->post('text_dept'));

        $this->db->set('mc_no', $text_mcno);
        $this->db->set('name', $text_name);
        $this->db->set('ip_address', $text_ip);
        $this->db->set('department_id', $text_dept);
        $this->db->insert('itx_m_machine');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function delete()
    {
        $hid = $this->security->xss_clean($this->input->post('hid'));
        $this->db->where('id', $hid);
        $this->db->delete('itx_m_machine');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

}
