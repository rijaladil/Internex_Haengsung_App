<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_result_ng extends CI_Model
{

    public function get_data_ng($prob_id, $masterplan_qty_id, $mc_id)
    {
        $this->db->select('qty_ng, itx_m_machine_problem.name');
        $this->db->from('itx_t_result_ng');
        $this->db->join('itx_m_machine_problem', 'itx_m_machine_problem.id = itx_t_result_ng.machine_problem_id');
        $this->db->where('masterplan_qty_id', $masterplan_qty_id);
        $this->db->where('machine_problem_id', $prob_id);
        // $this->db->where('mc_id', $mc_id);
        $this->db->order_by('itx_m_machine_problem.name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

}
