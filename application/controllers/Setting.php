<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
                (!in_array($this->session->userdata('level'), array(1)))
            )
        {
            redirect('login');
        }
    }

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

	public function user_delete()
	{
		$this->model_user->user_delete();
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

	public function quality_delete()
	{
		$this->model_machine_problem->delete();
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

	public function losstime_delete()
	{
        if($this->model_losstime_category->delete()){
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

	public function line_add()
	{
		if($this->model_machine->add()) {
			echo json_encode('ok');
		}else{
			echo json_encode('failed');
		}
	}

	public function operator()
	{
		$data['data'] = $this->model_operator->get_data();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/operator/index');
	}

	public function operator_add()
	{
		if ($this->model_operator->check_nip()) {
			# code...
			if($this->model_operator->add()) {
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

	public function operator_update()
	{
        $nip = $this->security->xss_clean($this->input->post('hid'));
        $hid = $this->security->xss_clean($this->input->post('id_input_nip'));
		if ($nip != $hid) {
			if ($this->model_operator->check_nip()) {
				# code...
				if($this->model_operator->update()) {
					echo 1;
				}else{
					echo 0;
				}
			}else{
				echo 0;
			}
		}else{
			if($this->model_operator->update()) {
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	public function operator_delete()
	{
		if($this->model_operator->delete()) {
			echo 1;
		}else{
			echo 0;
		}
	}
}
