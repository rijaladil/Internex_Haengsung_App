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
            ,qty.id idQty
        	,qty.date date
        	,qty.mc_id
        	,qty.qty planQty
            ,qty.status_close
        	,qty.operator_id
            ,mc.name mcName
        	,mc.mc_no mcNo
        	,date_format(result.start_time, '%y/%m/%d %H:%i') start
        	,date_format(result.finish_time, '%y/%m/%d %H:%i') finish
        	,result.working_time
        	,result.qty_actual actual
        	,(
        		select sum(qty_ng)
        		from itx_t_result_ng ng
        		where
        			ng.masterplan_qty_id = qty.id
        	) as ng
        	,(
        		select SUM(TIMESTAMPDIFF(SECOND, start_time, finish_time))
        		from itx_t_losstime losstime
        		where
        			losstime.masterplan_qty_id = qty.id
        	) as losstime,
            ,(
                select name
                from itx_m_operator
                where
                    nip = qty.operator_id
            ) as worker
            ,(
                select shift
                from itx_m_operator
                where
                    nip = qty.operator_id
            ) as shift
        	");
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'inner');
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
