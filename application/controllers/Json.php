<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

	public function getNgByIdQty($id)
	{
        echo json_encode($this->model_master_plan_qty->get_ng_by_qtyId($id));
	}

	public function getLossByIdQty($id)
	{
        echo json_encode($this->model_losstime->get_loss_by_qtyId($id));
	}
}
