<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_master_plan_qty extends CI_Model
{

    public function get_production_day_by_dept_idxx($id)
    {
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->where("date_format(qty.date, '%Y-%m') =", date('Y-m'));
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_last_rank($department, $line)
    {
        $this->db->select('max(rank) as rank');
        $this->db->from('itx_t_master_plan_qty');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = itx_t_master_plan_qty.id');
        $this->db->where('department_id', $department);
        $this->db->where('mc_id', $line);
        $this->db->where('date', date('Y-m-d'));
        $this->db->where('(qty_table+qty_input+qty_output) is not null', null, false);
        // $this->db->where('status_close_input + status_close_output > 0', null, false);
        $query = $this->db->get();
        return $query->row();
    }

    public function is_run($department, $line, $partnumber)
    {
        $this->db->from('itx_t_master_plan_qty');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = itx_t_master_plan_qty.id');
        $this->db->where('department_id', $department);
        $this->db->where('mc_id', $line);
        $this->db->where('part_no', $partnumber);
        $this->db->where('date', date('Y-m-d'));
        $this->db->where('(qty_table+qty_input+qty_output) is not null', null, false);
        $query = $this->db->get();
        $data = $query->num_rows();
        if ($data > 0) {
            return true;
        }else{
            false;
        }
    }

    public function check_existing($department, $machine, $partnumber)
    {
        $this->db->from('itx_t_master_plan_qty');
        $this->db->where('department_id', $department);
        $this->db->where('mc_id', $machine);
        $this->db->where('part_no', $partnumber);
        $this->db->where('date', date('Y-m-d'));
        $query = $this->db->get();
        $existing = $query->num_rows();
        return $existing;
    }

    public function import($data)
    {
        $this->db->insert('itx_t_master_plan_qty', $data);

    }

    public function update($data)
    {
        $this->db->set('editDate', $data['editDate']);
        $this->db->set('editUser', $data['editUser']);
        $this->db->set('qty', $data['qty']);
        $this->db->set('rank', $data['rank']);
        $this->db->where('date', date('Y-m-d'));
        $this->db->where('department_id', $data['department_id']);
        $this->db->where('mc_id', $data['mc_id']);
        $this->db->where('part_no', $data['part_no']);
        $this->db->update('itx_t_master_plan_qty');
    }

    public function update_runing($data)
    {
        $this->db->set('editDate', $data['editDate']);
        $this->db->set('editUser', $data['editUser']);
        $this->db->set('qty', $data['qty']);
        $this->db->where('date', date('Y-m-d'));
        $this->db->where('department_id', $data['department_id']);
        $this->db->where('mc_id', $data['mc_id']);
        $this->db->where('part_no', $data['part_no']);
        $this->db->update('itx_t_master_plan_qty');
    }

    public function delete($dep)
    {
        $this->db->select('itx_t_master_plan_qty.id id');
        $this->db->from('itx_t_master_plan_qty');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = itx_t_master_plan_qty.id');
        $this->db->where('department_id', $dep);
        $this->db->where('date', date('Y-m-d'));
        $this->db->where('(qty_table+qty_input+qty_output) is null', null, false);
        $query    = $this->db->get();
        $existing = $query->result_array();

        foreach ($existing as $key) {
            $this->db->where('itx_t_master_plan_qty.id', $key['id']);
            $this->db->delete('itx_t_master_plan_qty');
        }
    }

    public function delete_exist($data)
    {
        $this->db->where('itx_t_master_plan_qty.department_id', $data['department_id']);
        $this->db->where('itx_t_master_plan_qty.mc_id', $data['mc_id']);
        $this->db->where('itx_t_master_plan_qty.part_no', $data['part_no']);
        $this->db->where('date', date('Y-m-d'));
        $this->db->delete('itx_t_master_plan_qty');

        // $this->db->where('department_id', $dep);
        // $this->db->where('date', date('Y-m-d'));
        // $this->db->delete('itx_t_master_plan_qty');
    }

    public function updateRank()
    {
        $id  = $this->security->xss_clean($this->input->post('id'));
        $val = $this->security->xss_clean($this->input->post('rank'));
        $this->db->set('itx_t_master_plan_qty.rank', $val);
        $this->db->where('id', $id);
        $this->db->update('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function del($dep)
    {
        $this->db->where('department_id', $dep);
        $this->db->where('date', date('Y-m-d'));
        $this->db->delete('itx_t_master_plan_qty');
    }

    public function get_production_day_by_dept_id()
    {


        $date = $this->security->xss_clean($this->input->post('tgl'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $this->db->select("


            dept.name as dept,
            machine.mc_no_alias as machine
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

            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', result.qty_table, 0) ) AS result_table_Day1
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '02', result.qty_table, 0) ) AS result_table_Day2
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '03', result.qty_table, 0) ) AS result_table_Day3
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '04', result.qty_table, 0) ) AS result_table_Day4
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '05', result.qty_table, 0) ) AS result_table_Day5
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '06', result.qty_table, 0) ) AS result_table_Day6
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '07', result.qty_table, 0) ) AS result_table_Day7
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '08', result.qty_table, 0) ) AS result_table_Day8
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '09', result.qty_table, 0) ) AS result_table_Day9
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '10', result.qty_table, 0) ) AS result_table_ay10
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '11', result.qty_table, 0) ) AS result_table_ay11
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '12', result.qty_table, 0) ) AS result_table_ay12
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '13', result.qty_table, 0) ) AS result_table_ay13
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '14', result.qty_table, 0) ) AS result_table_ay14
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '15', result.qty_table, 0) ) AS result_table_ay15
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '16', result.qty_table, 0) ) AS result_table_ay16
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '17', result.qty_table, 0) ) AS result_table_ay17
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '18', result.qty_table, 0) ) AS result_table_ay18
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '19', result.qty_table, 0) ) AS result_table_ay19
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '20', result.qty_table, 0) ) AS result_table_ay20
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '21', result.qty_table, 0) ) AS result_table_ay21
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '22', result.qty_table, 0) ) AS result_table_ay22
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '23', result.qty_table, 0) ) AS result_table_ay23
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '24', result.qty_table, 0) ) AS result_table_ay24
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '25', result.qty_table, 0) ) AS result_table_ay25
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '26', result.qty_table, 0) ) AS result_table_ay26
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '27', result.qty_table, 0) ) AS result_table_ay27
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '28', result.qty_table, 0) ) AS result_table_ay28
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '29', result.qty_table, 0) ) AS result_table_ay29
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '30', result.qty_table, 0) ) AS result_table_ay30
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '31', result.qty_table, 0) ) AS result_table_ay31

            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', result.qty_input, 0) ) AS result_input_Day1
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '02', result.qty_input, 0) ) AS result_input_Day2
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '03', result.qty_input, 0) ) AS result_input_Day3
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '04', result.qty_input, 0) ) AS result_input_Day4
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '05', result.qty_input, 0) ) AS result_input_Day5
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '06', result.qty_input, 0) ) AS result_input_Day6
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '07', result.qty_input, 0) ) AS result_input_Day7
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '08', result.qty_input, 0) ) AS result_input_Day8
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '09', result.qty_input, 0) ) AS result_input_Day9
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '10', result.qty_input, 0) ) AS result_input_ay10
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '11', result.qty_input, 0) ) AS result_input_ay11
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '12', result.qty_input, 0) ) AS result_input_ay12
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '13', result.qty_input, 0) ) AS result_input_ay13
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '14', result.qty_input, 0) ) AS result_input_ay14
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '15', result.qty_input, 0) ) AS result_input_ay15
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '16', result.qty_input, 0) ) AS result_input_ay16
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '17', result.qty_input, 0) ) AS result_input_ay17
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '18', result.qty_input, 0) ) AS result_input_ay18
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '19', result.qty_input, 0) ) AS result_input_ay19
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '20', result.qty_input, 0) ) AS result_input_ay20
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '21', result.qty_input, 0) ) AS result_input_ay21
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '22', result.qty_input, 0) ) AS result_input_ay22
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '23', result.qty_input, 0) ) AS result_input_ay23
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '24', result.qty_input, 0) ) AS result_input_ay24
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '25', result.qty_input, 0) ) AS result_input_ay25
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '26', result.qty_input, 0) ) AS result_input_ay26
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '27', result.qty_input, 0) ) AS result_input_ay27
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '28', result.qty_input, 0) ) AS result_input_ay28
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '29', result.qty_input, 0) ) AS result_input_ay29
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '30', result.qty_input, 0) ) AS result_input_ay30
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '31', result.qty_input, 0) ) AS result_input_ay31

            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', result.qty_output, 0) ) AS result_output_Day1
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '02', result.qty_output, 0) ) AS result_output_Day2
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '03', result.qty_output, 0) ) AS result_output_Day3
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '04', result.qty_output, 0) ) AS result_output_Day4
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '05', result.qty_output, 0) ) AS result_output_Day5
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '06', result.qty_output, 0) ) AS result_output_Day6
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '07', result.qty_output, 0) ) AS result_output_Day7
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '08', result.qty_output, 0) ) AS result_output_Day8
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '09', result.qty_output, 0) ) AS result_output_Day9
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '10', result.qty_output, 0) ) AS result_output_ay10
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '11', result.qty_output, 0) ) AS result_output_ay11
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '12', result.qty_output, 0) ) AS result_output_ay12
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '13', result.qty_output, 0) ) AS result_output_ay13
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '14', result.qty_output, 0) ) AS result_output_ay14
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '15', result.qty_output, 0) ) AS result_output_ay15
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '16', result.qty_output, 0) ) AS result_output_ay16
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '17', result.qty_output, 0) ) AS result_output_ay17
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '18', result.qty_output, 0) ) AS result_output_ay18
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '19', result.qty_output, 0) ) AS result_output_ay19
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '20', result.qty_output, 0) ) AS result_output_ay20
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '21', result.qty_output, 0) ) AS result_output_ay21
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '22', result.qty_output, 0) ) AS result_output_ay22
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '23', result.qty_output, 0) ) AS result_output_ay23
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '24', result.qty_output, 0) ) AS result_output_ay24
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '25', result.qty_output, 0) ) AS result_output_ay25
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '26', result.qty_output, 0) ) AS result_output_ay26
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '27', result.qty_output, 0) ) AS result_output_ay27
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '28', result.qty_output, 0) ) AS result_output_ay28
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '29', result.qty_output, 0) ) AS result_output_ay29
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '30', result.qty_output, 0) ) AS result_output_ay30
            ,SUM( IF (DATE_FORMAT(qty.date, '%d') = '31', result.qty_output, 0) ) AS result_output_ay31

            ,SUM(qty.qty) AS planQtyTot
            ,SUM(result.qty_table) AS tableQtyTot
            ,SUM(result.qty_input) AS inputQtyTot
            ,SUM(result.qty_output) AS outputQtyTot
            ");
        $this->db->from('itx_t_master_plan_qty qty');
        $this->db->join('itx_m_department dept', 'dept.id = qty.department_id', 'left');
        $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        $this->db->join('itx_m_machine machine', 'machine.id = qty.mc_id', 'left');
        if ($date <> '') {
            $this->db->where("date_format(qty.date, '%Y-%m') =", $date);
        }else{
            $this->db->where("date_format(qty.date, '%Y-%m') =", date('Y-m'));
        }
        $this->db->where('dept.id', $department);
        $this->db->group_by('machine.id');
        // $this->db->order_by('plan.production_part_no');
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_production_day_by_dept_id_tot()
    // {


    //     $date = $this->security->xss_clean($this->input->post('tgl'));
    //     $department = $this->security->xss_clean($this->input->post('department'));
    //     $this->db->select("
    //                 ,SUM(qty.qty) AS planQtyTot
    //         ,SUM(result.qty_table) AS tableQtyTot
    //         ,SUM(result.qty_input) AS inputQtyTot
    //         ,SUM(result.qty_output) AS outputQtyTot
    //         ");
    //     $this->db->from('itx_m_machine');
    //     $this->db->join('itx_t_master_plan_qty', 'itx_t_master_plan_qty.mc_id = itx_m_machine.id', 'left');
    //     $this->db->join('itx_t_result','itx_t_result.masterplan_qty_id = itx_t_master_plan_qty.id', 'left');
    //     $this->db->join('itx_m_department','itx_m_department.id = itx_m_machine.department_id','left');

    //    $this->db->where('itx_m_department.id', $department_id->id);
    //    $this->db->where('itx_t_master_plan_qty.mc_id', '2');

    //     if ($dateStart <> '') {
    //         $this->db->where('itx_t_master_plan_qty.date >= ', $dateStart);
    //     }else{
    //         $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
    //     }

    //     if ($dateEnd <> '') {
    //         $this->db->where('itx_t_master_plan_qty.date <= ', $dateEnd);
    //     }else{
    //         $this->db->where('itx_t_master_plan_qty.date = ', date('Y-m-d'));
    //     }

    //     $query = $this->db->get();
    //     return $query->result_array();

    // }


    public function get_production_day_by_dept_id_url($department, $date)
    {
        $this->db->select("

            SUM( IF (DATE_FORMAT(qty.date, '%d') = '01', qty.qty, 0) ) AS planDay1
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





            ,SUM(qty.qty) AS planQtyTot
            ,SUM(result.qty_output) AS actualQtyTot



            ");
        $this->db->from('itx_t_master_plan_qty qty');
        // $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'left');
        // $this->db->join('itx_m_department dept', 'dept.name = plan.department', 'left');
        // $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        if ($date <> '') {
            $this->db->where("date_format(qty.date, '%Y-%m') =", $date);
        }else{
            $this->db->where("date_format(qty.date, '%Y-%m') =", date('Y-m'));
        }
        // $this->db->where('dept.id', $department);
        // $this->db->group_by('plan.production_part_no');
        // $this->db->order_by('plan.production_part_no');
        $query = $this->db->get();
        return $query->result_array();
    }
    // ini buat ambil NG
    // public function get_ng_by_qtyId($id)
    // {
    //     $this->db->select('machine_problem_id, qty_ng');
    //     $this->db->from('itx_t_result_ng');
    //     $this->db->where('masterplan_qty_id', $id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function setMcOnSpk()
    {
        $text_idQty = $this->security->xss_clean($this->input->post('id'));
        $text_mc    = $this->security->xss_clean($this->input->post('mesin'));

        $this->db->set('mc_id', $text_mc);
        $this->db->where('id', $text_idQty);
        $this->db->update('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function setOperator()
    {
        $text_idQty = $this->security->xss_clean($this->input->post('id'));
        $operator    = $this->security->xss_clean($this->input->post('operator'));

        $this->db->set('operator_id', $operator);
        $this->db->where('id', $text_idQty);
        $this->db->update('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function changeCounter()
    {
        $text_idQty = $this->security->xss_clean($this->input->post('id'));
        $counter    = $this->security->xss_clean($this->input->post('counter'));

        $this->db->set('counter', $counter);
        $this->db->where('id', $text_idQty);
        $this->db->update('itx_t_master_plan_qty');

        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function get_summary()
    {
        $department = $this->security->xss_clean($this->input->post('text_dept'));
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
                        sum(qty.qty)
                    FROM itx_t_master_plan_qty qty
                    where
                        qty.mc_id = mc.id
                        and date_format(qty.date, '%Y-%m') = '$date'
                ) as planning

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
                        sum(qty_output*counter)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as qtyActual

                ,(
                    SELECT
                        sum(qty_output*counter)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = date_format(('$date-01' - interval 1 month), '%Y-%m')
                ) as qtyActualLast

                ,

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
        if( $department <> ''){
            $this->db->where('dept.id', $department);
        }
        // $this->db->join('itx_t_master_plan_qty qty', 'qty.mc_id = mc.id', 'left');
        // $this->db->join('itx_t_master_plan plan', 'plan.id = qty.masterplan_id', 'left');
        // $this->db->join('itx_t_result result', 'result.masterplan_qty_id = qty.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_summary_url($text_date)
    {
        $department = $this->security->xss_clean($this->input->post('text_dept'));
        $dateStart = $text_date;

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
                        sum(qty.qty)
                    FROM itx_t_master_plan_qty qty
                    where
                        qty.mc_id = mc.id
                        and date_format(qty.date, '%Y-%m') = '$date'
                ) as planning

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
                        sum(qty_output*counter)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = '$date'
                ) as qtyActual

                ,(
                    SELECT
                        sum(qty_output*counter)
                    FROM itx_t_result result
                    left join itx_t_master_plan_qty qty2
                        on qty2.id = result.masterplan_qty_id
                    where
                        result.machine_id = mc.id
                        and date_format(qty2.date, '%Y-%m') = date_format(('$date-01' - interval 1 month), '%Y-%m')
                ) as qtyActualLast



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
        if( $department <> ''){
            $this->db->where('dept.id', $department);
        }
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
                SELECT sum(result1.qty_output) as last
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
            ,sum(result.qty_output) as qtyActual
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
