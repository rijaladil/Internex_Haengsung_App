<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_plan extends CI_Model
{



    public function get_by_dept_id($department, $dateStart = '', $dateEnd = '')
    {   
        

    	$department_id = $this->model_department->get_department_by_id($department);
        $this->db->select("
        	plan.production_part_no
        	,plan.model
        	,plan.description
            ,plan.capaHour
        	,qty.counter
            ,qty.id idQty
        	,qty.date date
        	,qty.mc_id
        	,qty.qty planQty
            ,qty.status_close
            ,mc.name mcName
        	,mc.mc_no mcNo
        	,date_format(result.start_time, '%y/%m/%d %H:%i') start
        	,date_format(result.finish_time, '%y/%m/%d %H:%i') finish
        	,result.working_time
        	");
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        $this->db->join('itx_m_machine mc', 'mc.id = qty.mc_id', 'left');
        // $this->db->where('plan.department', $department);
        $this->db->where('plan.department', $department_id->name);
        // $this->db->order_by('qty.status_close', 'desc');
        // $this->db->order_by('mc.mc_no', 'desc');


        if ($dateStart <> '') {
	        $this->db->where('qty.date >= ', $dateStart);
        }else{
	        $this->db->where('qty.date = ', date('Y-m-d'));
        }

        if ($dateEnd <> '') {
	        $this->db->where('qty.date <= ', $dateEnd);
        }else{
	        $this->db->where('qty.date = ', date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

}
