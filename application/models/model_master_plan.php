<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_plan extends CI_Model
{

    public function get_by_dept_id_A($department, $dateStart = '', $dateEnd = '')
    {
    	$department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
        	               itx_m_machine.name AS line,
                            itx_t_master_plan_qty.part_no AS part_no,
                            itx_t_master_plan_qty.id AS qid,
                            itx_t_master_plan_qty.date AS qdate,
                            itx_t_result.start_time AS start_date,
                            itx_t_result.finish_time AS end_date,
                            itx_t_master_plan_qty.qty AS plan_qty,
                            itx_t_result.qty_table AS table_qty,
                            itx_t_master_plan_qty.status_close_input AS close_input,
                            itx_t_master_plan_qty.status_close_output AS close_output,
                            itx_t_result.qty_input AS input_qty,
                            itx_t_result.qty_output AS output_qty,
                            (itx_t_result.qty_output - itx_t_master_plan_qty.qty) AS result,
                            (itx_t_result.qty_output / itx_t_master_plan_qty.qty) * 100 AS persen,
                            itx_t_master_plan_qty.rank AS rank
        	");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '1');

        if ($dateStart <> '') {
	        $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
	        $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
	        $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
	        $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

     public function get_by_dept_id_B($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           itx_m_machine.name AS line,
                            itx_t_master_plan_qty.part_no AS part_no,
                            itx_t_master_plan_qty.id AS qid,
                            itx_t_master_plan_qty.date AS qdate,
                            itx_t_result.start_time AS start_date,
                            itx_t_result.finish_time AS end_date,
                            itx_t_master_plan_qty.qty AS plan_qty,
                            itx_t_result.qty_table AS table_qty,
                            itx_t_master_plan_qty.status_close_input AS close_input,
                            itx_t_master_plan_qty.status_close_output AS close_output,
                            itx_t_result.qty_input AS input_qty,
                            itx_t_result.qty_output AS output_qty,
                            (itx_t_result.qty_output - itx_t_master_plan_qty.qty) AS result,
                            (itx_t_result.qty_output / itx_t_master_plan_qty.qty) * 100 AS persen,
                            itx_t_master_plan_qty.rank AS rank
            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '2');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

     public function get_by_dept_id_C($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           itx_m_machine.name AS line,
                            itx_t_master_plan_qty.part_no AS part_no,
                            itx_t_master_plan_qty.id AS qid,
                            itx_t_master_plan_qty.date AS qdate,
                            itx_t_result.start_time AS start_date,
                            itx_t_result.finish_time AS end_date,
                            itx_t_master_plan_qty.qty AS plan_qty,
                            itx_t_result.qty_table AS table_qty,
                            itx_t_master_plan_qty.status_close_input AS close_input,
                            itx_t_master_plan_qty.status_close_output AS close_output,
                            itx_t_result.qty_input AS input_qty,
                            itx_t_result.qty_output AS output_qty,
                            (itx_t_result.qty_output - itx_t_master_plan_qty.qty) AS result,
                            (itx_t_result.qty_output / itx_t_master_plan_qty.qty) * 100 AS persen,
                            itx_t_master_plan_qty.rank AS rank
            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '3');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // total a

    public function get_by_dept_id_A_tot($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           
                            SUM(itx_t_master_plan_qty.qty) AS tot_plan_qty,
                            SUM(itx_t_result.qty_table) AS tot_table_qty,
                            SUM(itx_t_result.qty_input) AS tot_input_qty,
                            SUM(itx_t_result.qty_output) AS tot_output_qty,
                            SUM((itx_t_result.qty_output - itx_t_master_plan_qty.qty))  AS tot_result,
                            SUM((itx_t_result.qty_output / itx_t_master_plan_qty.qty)) * 100 AS tot_persen,

            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '1');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // total a

    public function get_by_dept_id_B_tot($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           
                            SUM(itx_t_master_plan_qty.qty) AS tot_plan_qty,
                            SUM(itx_t_result.qty_table) AS tot_table_qty,
                            SUM(itx_t_result.qty_input) AS tot_input_qty,
                            SUM(itx_t_result.qty_output) AS tot_output_qty,
                            SUM((itx_t_result.qty_output - itx_t_master_plan_qty.qty))  AS tot_result,
                            SUM((itx_t_result.qty_output / itx_t_master_plan_qty.qty)) * 100 AS tot_persen,

            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '2');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // total c

    public function get_by_dept_id_C_tot($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           
                            SUM(itx_t_master_plan_qty.qty) AS tot_plan_qty,
                            SUM(itx_t_result.qty_table) AS tot_table_qty,
                            SUM(itx_t_result.qty_input) AS tot_input_qty,
                            SUM(itx_t_result.qty_output) AS tot_output_qty,
                            SUM((itx_t_result.qty_output - itx_t_master_plan_qty.qty))  AS tot_result,
                            SUM((itx_t_result.qty_output / itx_t_master_plan_qty.qty)) * 100 AS tot_persen,

            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       $this->db->where('itx_t_master_plan_qty.mc_id', '3');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

// TOTAL SEMUA
    public function get_by_dept_id_tot($department, $dateStart = '', $dateEnd = '')
    {
        $department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
                           
                            SUM(itx_t_master_plan_qty.qty) AS tot_plan_qty,
                            SUM(itx_t_result.qty_table) AS tot_table_qty,
                            SUM(itx_t_result.qty_input) AS tot_input_qty,
                            SUM(itx_t_result.qty_output) AS tot_output_qty,
                            SUM((itx_t_result.qty_output - itx_t_master_plan_qty.qty))  AS tot_result,
                            (SUM(itx_t_result.qty_output) / SUM(itx_t_master_plan_qty.qty)) * 100 AS tot_persen,

            ");
        $this->db->from('itx_m_machine');
        $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
        $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
        $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

       $this->db->where('itx_m_department.id', $department_id->id);
       // $this->db->where('itx_t_master_plan_qty.mc_id', '3');

        if ($dateStart <> '') {
            $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
        }else{
            $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}
