<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // $this->check_isvalidated();

    }

	public function upload_spk()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }

		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/upload_spk/index');
	}

    public function input_spk()
    {
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
        $data['data_clamping'] = $this->model_spk->get_all_clamping();
        $data['data_assy'] = $this->model_spk->get_all_assy();
        $this->load->view('template/header/index', $data);
        $this->load->view('template/menu/index');
        $this->load->view('pages/setting/input_spk/index');
    }

    public function spk_add()
    {
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
        $this->model_spk->spk_add();
    }

    public function spk_update()
    {
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
        $this->model_spk->spk_update();
    }

    public function spk_delete()
    {
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
        $this->model_spk->spk_delete();
    }
    
    // user
	public function user()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
        $data['data'] = $this->model_user->get_all();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/user/index');
	}

	public function user_add()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
		$this->model_user->user_add();
	}

	public function user_update()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
		$this->model_user->user_update();
	}

	public function user_delete()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
		$this->model_user->user_delete();
	}

	
}
