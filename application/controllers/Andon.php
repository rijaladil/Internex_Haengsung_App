<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andon extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->check_isvalidated();
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

	public function index()
	{
        $this->summary();
	}

	public function summary($department='')
	{
        $data['setStart'] = $this->security->xss_clean($this->input->post('text_dateStart'));
        $data['setEnd'] = $this->security->xss_clean($this->input->post('text_dateEnd'));
        $data['data'] = $this->model_andon->get_summary();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/andon/summary/index');
	}

	public function history($department='')
	{
        $data['setStart'] = $this->security->xss_clean($this->input->post('text_dateStart'));
        $data['setEnd'] = $this->security->xss_clean($this->input->post('text_dateEnd'));
        $data['data'] = $this->model_andon->get_history();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/andon/history/index');
	}

	public function jsonGetSum($date)
	{
        echo json_encode($this->model_andon->jsonGetSum($date));
	}

	public function jsonGetSumDonut($date)
	{
        echo json_encode($this->model_andon->jsonGetSumDonut($date));
	}

}
