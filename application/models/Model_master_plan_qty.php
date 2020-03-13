<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_plan_qty extends CI_Model
{

    public function get_production_status_by_dept_idxx($id)
    {
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->where("date_format(qty.date, '%Y-%m') =", date('Y-m'));
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_production_status_by_dept_id()
    {
        $date = $this->security->xss_clean($this->input->post('tgl'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $this->db->select("
            plan.production_part_no
            ,plan.model
            ,plan.description
            ,plan.capaDay
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', qty.qty, 0) ) AS planDay1
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '02', qty.qty, 0) ) AS planDay2
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '03', qty.qty, 0) ) AS planDay3
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '04', qty.qty, 0) ) AS planDay4
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '05', qty.qty, 0) ) AS planDay5
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '06', qty.qty, 0) ) AS planDay6
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '07', qty.qty, 0) ) AS planDay7
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '08', qty.qty, 0) ) AS planDay8
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '09', qty.qty, 0) ) AS planDay9
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '10', qty.qty, 0) ) AS planDay10
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '11', qty.qty, 0) ) AS planDay11
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '12', qty.qty, 0) ) AS planDay12
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '13', qty.qty, 0) ) AS planDay13
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '14', qty.qty, 0) ) AS planDay14
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '15', qty.qty, 0) ) AS planDay15
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '16', qty.qty, 0) ) AS planDay16
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '17', qty.qty, 0) ) AS planDay17
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '18', qty.qty, 0) ) AS planDay18
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '19', qty.qty, 0) ) AS planDay19
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '20', qty.qty, 0) ) AS planDay20
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '21', qty.qty, 0) ) AS planDay21
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '22', qty.qty, 0) ) AS planDay22
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '23', qty.qty, 0) ) AS planDay23
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '24', qty.qty, 0) ) AS planDay24
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '25', qty.qty, 0) ) AS planDay25
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '26', qty.qty, 0) ) AS planDay26
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '27', qty.qty, 0) ) AS planDay27
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '28', qty.qty, 0) ) AS planDay28
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '29', qty.qty, 0) ) AS planDay29
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '30', qty.qty, 0) ) AS planDay30
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '31', qty.qty, 0) ) AS planDay31

            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', result.qty_actual, 0) ) AS actualDay1
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '02', result.qty_actual, 0) ) AS actualDay2
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '03', result.qty_actual, 0) ) AS actualDay3
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '04', result.qty_actual, 0) ) AS actualDay4
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '05', result.qty_actual, 0) ) AS actualDay5
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '06', result.qty_actual, 0) ) AS actualDay6
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '07', result.qty_actual, 0) ) AS actualDay7
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '08', result.qty_actual, 0) ) AS actualDay8
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '09', result.qty_actual, 0) ) AS actualDay9
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '10', result.qty_actual, 0) ) AS actualDay10
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '11', result.qty_actual, 0) ) AS actualDay11
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '12', result.qty_actual, 0) ) AS actualDay12
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '13', result.qty_actual, 0) ) AS actualDay13
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '14', result.qty_actual, 0) ) AS actualDay14
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '15', result.qty_actual, 0) ) AS actualDay15
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '16', result.qty_actual, 0) ) AS actualDay16
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '17', result.qty_actual, 0) ) AS actualDay17
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '18', result.qty_actual, 0) ) AS actualDay18
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '19', result.qty_actual, 0) ) AS actualDay19
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '20', result.qty_actual, 0) ) AS actualDay20
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '21', result.qty_actual, 0) ) AS actualDay21
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '22', result.qty_actual, 0) ) AS actualDay22
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '23', result.qty_actual, 0) ) AS actualDay23
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '24', result.qty_actual, 0) ) AS actualDay24
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '25', result.qty_actual, 0) ) AS actualDay25
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '26', result.qty_actual, 0) ) AS actualDay26
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '27', result.qty_actual, 0) ) AS actualDay27
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '28', result.qty_actual, 0) ) AS actualDay28
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '29', result.qty_actual, 0) ) AS actualDay29
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '30', result.qty_actual, 0) ) AS actualDay30
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '31', result.qty_actual, 0) ) AS actualDay31

            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '01') as ngQty1
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '02') as ngQty2
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '03') as ngQty3
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '04') as ngQty4
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '05') as ngQty5
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '06') as ngQty6
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '07') as ngQty7
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '08') as ngQty8
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '09') as ngQty9
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '10') as ngQty10

            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '11') as ngQty11
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '12') as ngQty12
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '13') as ngQty13
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '14') as ngQty14
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '15') as ngQty15
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '16') as ngQty16
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '17') as ngQty17
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '18') as ngQty18
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '19') as ngQty19
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '20') as ngQty20

            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '21') as ngQty21
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '22') as ngQty22
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '23') as ngQty23
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '24') as ngQty24
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '25') as ngQty25
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '26') as ngQty26
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '27') as ngQty27
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '28') as ngQty28
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '29') as ngQty29
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '30') as ngQty30
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id and DATE_FORMAT(qty.date, '%d') = '31') as ngQty31

            ,SUM(qty.qty) AS planQtyTot
            ,SUM(result.qty_actual) AS actualQtyTot
            ,(SELECT SUM(qty_ng) FROM itx_t_result_ng ng where ng.masterplan_qty_id = qty.id) as ngQtyTot


            ");
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'left');
        $this->db->join('itx_m_department dept', 'dept.name = plan.department', 'left');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        if ($date <> '') {
            $this->db->where("date_format(qty.date, '%Y-%m') =", $date);
        }else{
            $this->db->where("date_format(qty.date, '%Y-%m') =", date('Y-m'));
        }
        $this->db->where('dept.id', $department);
        $this->db->group_by('plan.production_part_no');
        $this->db->order_by('plan.production_part_no');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_ng_by_qtyId($id)
    {
        $this->db->select('machine_problem_id, qty_ng');
        $this->db->from('itx_t_result_ng');
        $this->db->where('masterplan_qty_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function setMcOnSpk($id)
    {
		$text_idQty = ($_POST['text_idQty']);
		$text_mc = ($_POST['text_mc']);
		foreach ($text_idQty as $key => $value) {
			// if ($text_mc[$key] != '-') {
		        $this->db->set('mc_id', $text_mc[$key]);
		        $this->db->where('id', $text_idQty[$key]);
		        $this->db->update('itx_t_master_plan_qty');
			// }
		}
    }

    public function get_summary()
    {
        $dateStart = $this->security->xss_clean($this->input->post('text_date'));

        if ($dateStart <> '') {
            $date = $dateStart;
        }else{
            $date = date('Y-m');
        }

        $this->db->select("
                dept.name as deptName
                , mc.mc_no as mcNo
                , mc.name as mcName

                ,(
                    SELECT
                        sum(result.working_time)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as workingTime

                ,(
                    SELECT
                        SUM(TIMESTAMPDIFF(SECOND, start_time, finish_time))
                    FROM itx_t_losstime losstime
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = losstime.masterplan_qty_id
                    where
                        losstime.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as lossTime

                ,(
                    SELECT
                        sum(qty_actual)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as qtyActual

                ,(
                    SELECT
                        sum(qty_actual)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = date_format(('$date-01' - interval 1 month), '%Y-%m')
                ) as qtyActualLast

                ,(
                    SELECT
                        sum(qty_ng)
                    FROM itx_t_result_ng ng
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = ng.masterplan_qty_id
                    where
                        ng.mc_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as qtyNg

                ,(
                    SELECT
                        sum(qty_ng)
                    FROM itx_t_result_ng ng
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = ng.masterplan_qty_id
                    where
                        ng.mc_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = date_format(('$date' - interval 1 month), '%Y-%m')
                ) as qtyNgLast

                ,(
                    SELECT
                        count(*)
                    FROM itx_t_andon andon
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = andon.masterplan_qty_id
                    left join itx_t_master_plan plan2
                        on plan2.id = qty2.masterplan_id
                    left join itx_m_department dept2
                        on dept2.name = plan2.department
                    where
                        andon.andon_status_id = 3
                        and qty2.mc_id = mc.id
                        and dept2.name = dept.name
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as andonTimes

                ,(
                    SELECT
                        count(*)
                    FROM itx_t_andon andon
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = andon.masterplan_qty_id
                    left join itx_t_master_plan plan2
                        on plan2.id = qty2.masterplan_id
                    left join itx_m_department dept2
                        on dept2.name = plan2.department
                    where
                        andon.andon_status_id = 3
                        and qty2.mc_id = mc.id
                        and dept2.name = dept.name
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as andonTime
            ");
        $this->db->from('itx_m_machine mc');
        $this->db->join('itx_m_department dept', 'dept.id = mc.department_id', 'left');
        $this->db->order_by('mc.mc_no', 'asc');
        // $this->db->join('itx_t_master_plan_qty qty', 'qty.mc_id = mc.id', 'left');
        // $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'left');
        // $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_summary_backup()
    {
        $dateStart = $this->security->xss_clean($this->input->post('text_date'));

        $this->db->select("
            dept.name as nameDept
            ,mc.mc_no as nameMc
            ,mc.name as nameMachine
            ,(
                SELECT sum(result1.qty_actual) as last
                FROM itx_t_result result1
                left join itx_t_master_plan_qty qty3
                    on qty3.id = result1.masterplan_qty_id
                left join itx_t_master_plan plan2
                    on plan2.id = qty3.masterplan_id
                left join itx_m_department dept2
                    on dept2.name = plan2.department
                where
                    qty3.mc_id = mc.id
                    and date_format(qty3.date, '%Y-%m') = date_format((qty.date - interval 1 month), '%Y-%m')
                    and dept2.name = dept.name
                    and dept2.name = dept.name
            ) as qtyActualLast
            ,sum(result.qty_actual) as qtyActual
            ,sum(result.working_time) as workingTime
            ,(
                SELECT
                    SUM(TIMESTAMPDIFF(SECOND, start_time, finish_time))
                FROM itx_t_losstime losstime
                left join itx_t_master_plan_qty qty2
                    on qty2.id = losstime.masterplan_qty_id
                left join itx_t_master_plan plan2
                    on plan2.id = qty2.masterplan_id
                left join itx_m_department dept2
                    on dept2.name = plan2.department
                where
                    qty2.mc_id = mc.id
                    and dept2.name = dept.name
            ) as lossTime
            ,(
                SELECT
                    SUM(TIMESTAMPDIFF(SECOND, start_time, finish_time))
                FROM itx_t_andon andon
                left join itx_t_master_plan_qty qty2
                    on qty2.id = andon.masterplan_qty_id
                left join itx_t_master_plan plan2
                    on plan2.id = qty2.masterplan_id
                left join itx_m_department dept2
                    on dept2.name = plan2.department
                where
                    andon.andon_status_id = 3
                    and qty2.mc_id = mc.id
                    and dept2.name = dept.name
            ) as andonTimes
            ,(
                select SUM(TIMESTAMPDIFF(SECOND, andon.datetime, andon.time_finish))
                FROM itx_t_andon andon
                left join itx_t_master_plan_qty qty2
                    on qty2.id = andon.masterplan_qty_id
                left join itx_t_master_plan plan2
                    on plan2.id = qty2.masterplan_id
                left join itx_m_department dept2
                    on dept2.name = plan2.department
                where
                    andon.andon_status_id = 3
                    and qty2.mc_id = mc.id
                    and dept2.name = dept.name
            ) as andonTime
            ,(
                SELECT sum(qty_ng) as ng2
                FROM itx_t_result_ng ng2
                left join itx_t_master_plan_qty qty2
                    on qty2.id = ng2.masterplan_qty_id
                left join itx_t_master_plan plan2
                    on plan2.id = qty2.masterplan_id
                left join itx_m_department dept2
                    on dept2.name = plan2.department
                where
                    qty2.mc_id = mc.id
                    and dept2.name = dept.name
            ) as qtyNg
            ");
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'left');
        $this->db->join('itx_m_department dept', 'dept.name = plan.department', 'left');
        $this->db->join('itx_m_machine mc', 'mc.id = qty.mc_id', 'left');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        $this->db->group_by('dept.name');
        $this->db->group_by('mc.id');

        if ($dateStart <> '') {
            $this->db->where("date_format(qty.date, '%Y-%m') = ", $dateStart);
        }else{
            $this->db->where("date_format(qty.date, '%Y-%m') = ", date('Y-m'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}
