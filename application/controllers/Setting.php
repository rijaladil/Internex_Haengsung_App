<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function upload_spk()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/upload_spk/index');
	}
}
