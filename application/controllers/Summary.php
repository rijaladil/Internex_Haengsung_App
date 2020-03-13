<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	public function index()
	{
        $data['text_date'] = $this->security->xss_clean($this->input->post('text_date'));
        $data['data'] = $this->model_master_plan_qty->get_summary();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/summary/index');
	}
}
