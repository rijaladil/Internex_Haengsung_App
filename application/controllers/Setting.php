<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function upload_spk()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/upload_spk/index');
	}

	public function user()
	{
        $data['data'] = $this->model_user->get_all();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/user/index');
	}

	public function user_add()
	{
		$this->model_user->user_add();
	}

	public function user_update()
	{
		$this->model_user->user_update();
	}

	public function quality()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/quality/index');
	}

	public function quality_add()
	{
		$this->model_machine_problem->add();
	}

	public function quality_update()
	{
		$this->model_machine_problem->update();
	}

	public function losstime()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/losstime/index');
	}

	public function losstime_add()
	{
        if($this->model_losstime_category->add()){

        $data = $this->model_losstime_category->get_all();

		 	$i=1; foreach ($this->model_losstime_category->get_all() as $key) {
		 	echo "
				  <tr>
					 <td class='text-center'>".$i++."</td>
					 <td>".$key['name']."</td>
				  </tr>";
		 	}
        }else{
        	echo 'false';
        }
	}

	public function losstime_update()
	{
        if($this->model_losstime_category->update()){

        $data = $this->model_losstime_category->get_all();

		 	$i=1; foreach ($this->model_losstime_category->get_all() as $key) {
		 	echo "
				  <tr>
					 <td class='text-center'>".$i++."</td>
					 <td>".$key['name']."</td>
				  </tr>";
		 	}
        }else{
        	echo 'false';
        }
	}

	public function working()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/working/index');
	}

	public function line()
	{
		$data['data'] = $this->model_machine->get_by_line_setting();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/line/index');
	}

	public function line_update()
	{
		if($this->model_machine->update()) {
			echo json_encode('ok');
		}else{
			echo json_encode('failed');
		}
	}

}
