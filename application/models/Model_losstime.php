<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_losstime extends CI_Model
{

    // ambil losstime
    public function get_loss_by_qtyId($id)
    {
        $this->db->select('losstime_cat_id, SUM(TIMESTAMPDIFF(SECOND, start_time, finish_time)) as losstime');
        $this->db->from('itx_t_losstime');
        $this->db->where('masterplan_qty_id', $id);
        $this->db->group_by('losstime_cat_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
