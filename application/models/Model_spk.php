<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_spk extends CI_Model
{

    public function get_all_clamping()
    {
        $this->db->select('itx_t_master_plan_qty.id, 
                            itx_t_master_plan_qty.mc_id, 
                            itx_m_department.name,
                            itx_m_machine.mc_no, 
                            itx_t_master_plan_qty.counter, 
                            itx_t_master_plan_qty.part_no, 
                            itx_t_master_plan_qty.rank, 
                            itx_t_master_plan_qty.date, 
                            itx_t_master_plan_qty.qty, 
                            itx_t_master_plan_qty.status_close_input,
                            itx_t_master_plan_qty.status_close_output
                            ');
        $this->db->from('itx_t_master_plan_qty');
        $this->db->join('itx_m_machine', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_m_department', 'itx_t_master_plan_qty.department_id = itx_m_department.id', 'left');
        $this->db->where('itx_m_department.id','2');
        $this->db->where('itx_t_master_plan_qty.date','CURDATE()',FALSE);
        $this->db->order_by('itx_m_machine.mc_no');
        $this->db->order_by('itx_t_master_plan_qty.rank');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_assy()
    {
        $this->db->select('itx_t_master_plan_qty.id, 
                            itx_t_master_plan_qty.mc_id, 
                            itx_m_department.name,
                            itx_m_machine.mc_no, 
                            itx_t_master_plan_qty.counter, 
                            itx_t_master_plan_qty.part_no, 
                            itx_t_master_plan_qty.rank, 
                            itx_t_master_plan_qty.date, 
                            itx_t_master_plan_qty.qty, 
                            itx_t_master_plan_qty.status_close_input,
                            itx_t_master_plan_qty.status_close_output
                            ');
        $this->db->from('itx_t_master_plan_qty');
        $this->db->join('itx_m_machine', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_m_department', 'itx_t_master_plan_qty.department_id = itx_m_department.id', 'left');
        $this->db->where('itx_m_department.id','1');
        $this->db->where('itx_t_master_plan_qty.date','CURDATE()',FALSE);
        $this->db->order_by('itx_m_machine.mc_no');
        $this->db->order_by('itx_t_master_plan_qty.rank');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function spk_add()
    {   
        $text_department = $this->security->xss_clean($this->input->post('text_department'));
        $text_mc_no = $this->security->xss_clean($this->input->post('text_mc_no'));
        $text_date = $this->security->xss_clean($this->input->post('text_date'));
        $text_qty = $this->security->xss_clean($this->input->post('text_qty'));
        $this->db->set('createUser', 'System');
        $this->db->set('department_id', $text_department);
        $this->db->set('mc_id', $text_mc_no);
        $this->db->set('date', $text_date);
        $this->db->set('qty', $text_qty);
        $this->db->insert('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function spk_update()
    {   
        $hid = $this->security->xss_clean($this->input->post('hid'));
        $text_department = $this->security->xss_clean($this->input->post('text_department'));
        $text_mc_no = $this->security->xss_clean($this->input->post('text_mc_no'));
        $text_date = $this->security->xss_clean($this->input->post('text_date'));
        $text_qty = $this->security->xss_clean($this->input->post('text_qty'));

        $this->db->set('editUser', 'System');
         $this->db->set('editDate', 'NOW()', FALSE);
        $this->db->set('date', $text_date);
        $this->db->set('qty', $text_qty);
        $this->db->where('id', $hid);
        $this->db->update('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }

    public function spk_delete()
    {
        $hid = $this->security->xss_clean($this->input->post('hid'));

        $this->db->where('id', $hid);
        $this->db->delete('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }


}
