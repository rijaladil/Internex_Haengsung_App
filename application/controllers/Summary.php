<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
    }

	public function index()
	{
        $data['text_date'] = $this->security->xss_clean($this->input->post('text_date'));
        $data['data'] = $this->model_master_plan_qty->get_summary();
        $data['data_dept'] = $this->model_department->get_all();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/summary/index');
	}

    private function check_isvalidated()
    {
        if
            (
                (!$this->session->userdata('loggin'))
                ||
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
    }

}
