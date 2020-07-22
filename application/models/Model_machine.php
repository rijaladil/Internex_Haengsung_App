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

    public function get_by_line_setting()
    {
        $this->db->select('
        	mc.id,
        	mc.worker_1,
        	mc.worker_2,
        	mc.worker_3,
        	mc.name as name,
        	mc.remark,
        	mc.mc_no,
        	mc.ip_address,
        	dept.name as dept,
        	dept.id as deptId,
        	work1.name worker1,
        	work2.name worker2,
        	work3.name worker3
        	');
        $this->db->from('itx_m_machine mc');
        $this->db->join('itx_m_department dept', 'dept.id = mc.department_id');
        $this->db->join('itx_m_user work1', 'work1.nip = mc.worker_1', 'left');
        $this->db->join('itx_m_user work2', 'work2.nip = mc.worker_2', 'left');
        $this->db->join('itx_m_user work3', 'work3.nip = mc.worker_3', 'left');
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
        $text_work1 = $this->security->xss_clean($this->input->post('text_work1'));
        $text_work2 = $this->security->xss_clean($this->input->post('text_work2'));
        $text_work3 = $this->security->xss_clean($this->input->post('text_work3'));

        $this->db->set('mc_no', $text_mcno);
        $this->db->set('name', $text_name);
        $this->db->set('ip_address', $text_ip);
        $this->db->set('remark', $text_remark);
        $this->db->set('department_id', $text_dept);
        $this->db->set('worker_1', $text_work1);
        $this->db->set('worker_2', $text_work2);
        $this->db->set('worker_3', $text_work3);
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
        $text_work1 = $this->security->xss_clean($this->input->post('text_work1'));
        $text_work2 = $this->security->xss_clean($this->input->post('text_work2'));
        $text_work3 = $this->security->xss_clean($this->input->post('text_work3'));

        $this->db->set('mc_no', $text_mcno);
        $this->db->set('name', $text_name);
        $this->db->set('ip_address', $text_ip);
        $this->db->set('department_id', $text_dept);
        $this->db->set('worker_1', $text_work1);
        $this->db->set('worker_2', $text_work2);
        $this->db->set('worker_3', $text_work3);
        $this->db->insert('itx_m_machine');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

}
