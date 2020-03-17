<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (count($_POST) > 0) {
	        $this->model_user->validate();
		}else{
			$this->load->view('pages/login/index');
		}
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}
