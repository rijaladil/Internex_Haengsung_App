<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_andon extends CI_Model
{

    public function get_history()
    {
        $dateStart = $this->security->xss_clean($this->input->post('text_dateStart'));
        $dateEnd = $this->security->xss_clean($this->input->post('text_dateEnd'));

        $this->db->select("
        		mc.name as mcName
        		, mc.mc_no as mcNo
                , dep.name as deptName
        		, andon.datetime as call
        		, andon.andon_call_id as call_id
        		, TIMESTAMPDIFF(SECOND, datetime, time_arrival) as arrival
        		, TIMESTAMPDIFF(SECOND, time_arrival, time_finish) as completed
        		, TIMESTAMPDIFF(SECOND, datetime, time_finish) as downtime
        		");
        $this->db->from('itx_t_andon andon');
        $this->db->join('itx_m_machine mc', 'mc.id = andon.machine_id');
        $this->db->join('itx_m_department dep', 'dep.id = mc.department_id');
        $this->db->where('andon.andon_status_id', '3');

        if ($dateStart <> '') {
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') >= ", $dateStart);
        }else{
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') <= " , $dateEnd);
        }else{
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_history_url($dateStart,$dateEnd)
    {
        $this->db->select("
                mc.name as mcName
                , mc.mc_no as mcNo
                , dep.name as deptName
                , andon.datetime as call
                , andon.andon_call_id as call_id
                , TIMESTAMPDIFF(SECOND, datetime, time_arrival) as arrival
                , TIMESTAMPDIFF(SECOND, time_arrival, time_finish) as completed
                , TIMESTAMPDIFF(SECOND, datetime, time_finish) as downtime
                ");
        $this->db->from('itx_t_andon andon');
        $this->db->join('itx_m_machine mc', 'mc.id = andon.machine_id');
        $this->db->join('itx_m_department dep', 'dep.id = mc.department_id');
        $this->db->where('andon.andon_status_id', '3');

        if ($dateStart <> '') {
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') >= ", $dateStart);
        }else{
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", date('Y-m-d'));
        }

        if ($dateEnd <> '') {
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') <= " , $dateEnd);
        }else{
            $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", date('Y-m-d'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_summary()
    {
        $dateStart = $this->security->xss_clean($this->input->post('text_dateStart'));
        $dateEnd = $this->security->xss_clean($this->input->post('text_dateEnd'));

        if ($dateStart <> '') {
            $tanggal = "'".$dateStart."'";
        }else{
            // $tanggal = 'NOW()';
            $tanggal = 'NOW()';
        }

        $this->db->select("
                mc.name as mcName
                , mc.mc_no as mcNo
                , dep.name as deptName
                , andon.datetime as call

                , SUM(IF(andon.andon_call_id = 1 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), 1, 0) ) as count1
                , SUM(IF(andon.andon_call_id = 2 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), 1, 0) ) as count2
                , SUM(IF(andon.andon_call_id = 3 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), 1, 0) ) as count3
                , SUM(IF(andon.andon_call_id = 4 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), 1, 0) ) as count4

                , SUM(IF(andon.andon_call_id = 1 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtime1
                , SUM(IF(andon.andon_call_id = 2 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtime2
                , SUM(IF(andon.andon_call_id = 3 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtime3
                , SUM(IF(andon.andon_call_id = 4 and date_format(datetime, '%Y-%m-%d') = date_format($tanggal, '%Y-%m-%d'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtime4

                ,   (
                        SELECT
                        SUM(IF(andon_call_id = 1 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), 1, 0))
                        FROM itx_t_andon
                        WHERE
                            machine_id = mc.id
                            and andon_status_id = 3
                    ) countLastMonth1

                ,   (
                        SELECT
                        SUM(IF(andon_call_id = 2 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), 1, 0))
                        FROM itx_t_andon
                        WHERE
                            machine_id = mc.id
                            and andon_status_id = 3
                    ) countLastMonth2

                ,   (
                        SELECT
                        SUM(IF(andon_call_id = 3 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), 1, 0))
                        FROM itx_t_andon
                        WHERE
                            machine_id = mc.id
                            and andon_status_id = 3
                    ) countLastMonth3

                ,   (
                        SELECT
                        SUM(IF(andon_call_id = 4 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), 1, 0))
                        FROM itx_t_andon
                        WHERE
                            machine_id = mc.id
                            and andon_status_id = 3
                    ) countLastMonth4


                , SUM(IF(andon.andon_call_id = 1 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtimeLast1
                , SUM(IF(andon.andon_call_id = 2 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtimeLast2
                , SUM(IF(andon.andon_call_id = 3 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtimeLast3
                , SUM(IF(andon.andon_call_id = 4 and date_format(datetime, '%Y-%m') = date_format( STR_TO_DATE($tanggal, '%Y-%m-%d'), '%Y-%m'), TIMESTAMPDIFF(SECOND, datetime, time_finish), 0) ) as downtimeLast4
                ");
        $this->db->from('itx_m_machine mc');
        $this->db->join('itx_m_department dep', 'dep.id = mc.department_id');
        $this->db->join('itx_t_andon andon', 'mc.id = andon.machine_id');

        // $this->db->where('andon.andon_status_id', '3');

        // if ($dateStart <> '') {
        //     $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", $dateStart);
        // }else{
        //     $this->db->where("date_format(andon.datetime, '%Y-%m-%d') = ", date('Y-m-d'));
        // }

        $this->db->group_by('mc.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jsonGetSum($date) {
        $newDate = date("Y-m", strtotime($date));
        $this->db->SELECT("
                date_format(andon.datetime, '%Y-%m-%d') as date
                , SUM(TIMESTAMPDIFF(SECOND, andon.datetime, andon.time_arrival)) as arrival
                , SUM(TIMESTAMPDIFF(SECOND, andon.time_arrival, andon.time_finish)) as completed
                , SUM(TIMESTAMPDIFF(SECOND, andon.datetime, andon.time_finish)) as downtime
            ");
        $this->db->FROM('itx_t_andon andon');
        $this->db->WHERE("date_format(andon.datetime, '%Y-%m') = '$newDate'");
        $this->db->group_by("date_format(andon.datetime, '%Y-%m-%d')");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jsonGetSumDonut($date) {
        $newDate = date("Y-m", strtotime($date));
        $this->db->SELECT("
                SUM(IF(andon.andon_call_id = 1 and andon.andon_status_id = 3, 1, 0)) as machineCall
                ,SUM(IF(andon.andon_call_id = 2 and andon.andon_status_id = 3, 1, 0)) as materialCall
                ,SUM(IF(andon.andon_call_id = 3 and andon.andon_status_id = 3, 1, 0)) as diesCall
                ,SUM(IF(andon.andon_call_id = 4 and andon.andon_status_id = 3, 1, 0)) as qualityCall
            ");
        $this->db->FROM('itx_t_andon andon');
        $this->db->WHERE("date_format(andon.datetime, '%Y-%m') = '$newDate'");
        $query = $this->db->get();
        return $query->result_array();
    }

}
