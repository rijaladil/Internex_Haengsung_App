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
                (!in_array($this->session->userdata('level'), array(1,2,3,4)))
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
        $data['selected_dep'] = $this->security->xss_clean($this->input->post('text_dept'));
        $data['selected_machine'] = $this->security->xss_clean($this->input->post('text_machine'));
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

    public function download_history($start, $finish)
    {
        $data['data'] = $this->model_andon->get_history_url($start,$finish);
        $this->load->view('pages/andon/history/download', $data);
    }

    public function download_summary($date, $dept, $machine)
    {
        $data['data'] = $this->model_andon->get_summary_url($date, $dept, $machine);
        $data['date'] = $date;
        $this->load->view('pages/andon/summary/download', $data);
    }

	public function jsonGetSum()
	{
        echo json_encode($this->model_andon->jsonGetSum());
	}

	public function jsonGetSumDonut()
	{
        echo json_encode($this->model_andon->jsonGetSumDonut());
	}

}
