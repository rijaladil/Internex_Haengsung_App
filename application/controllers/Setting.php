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
        $data['data'] = $this->model_spk->get_all();
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

	public function quality()
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
		$this->load->view('pages/setting/quality/index');
	}

	public function quality_add()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$this->model_machine_problem->add();
	}

	public function quality_update()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$this->model_machine_problem->update();
	}

	public function quality_delete()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$this->model_machine_problem->delete();
	}

	public function losstime()
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
		$this->load->view('pages/setting/losstime/index');
	}

	public function losstime_add()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }

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
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
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
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
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
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/working/index');
	}

	public function line()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$data['data'] = $this->model_machine->get_by_line_setting();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/line/index');
	}

	public function line_update()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		if($this->model_machine->update()) {
			echo json_encode('ok');
		}else{
			echo json_encode('failed');
		}
	}

	public function line_delete()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		if($this->model_machine->delete()) {
			echo json_encode('ok');
		}else{
			echo json_encode('failed');
		}
	}

	public function line_add()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		if($this->model_machine->add()) {
			echo json_encode('ok');
		}else{
			echo json_encode('failed');
		}
	}

	public function operator()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		$data['data'] = $this->model_operator->get_data();
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/operator/index');
	}

	public function operator_add()
	{
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
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
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
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
        if
            (
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
		if($this->model_operator->delete()) {
			echo 1;
		}else{
			echo 0;
		}
	}
}
