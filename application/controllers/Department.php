<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	public function index()
	{
        $this->actual_production();
	}

	public function actual_production($department=''){
		if (isset($_POST['text_idQty']) && count($_POST['text_idQty']) > 0) {
			$this->model_master_plan_qty->setMcOnSpk($department);

	        $data['setStart'] = $this->security->xss_clean($this->input->post('text_dateStart'));
	        $data['setEnd'] = $this->security->xss_clean($this->input->post('text_dateEnd'));
	        $data['dept'] = $department;
	        $data['data'] = $this->model_master_plan->get_by_dept_id($department, $data['setStart'], $data['setEnd']);
	        $data['data_machine'] = $this->model_machine->get_by_dept_id($department);
	        $data['data_machine_problem'] = $this->model_machine_problem->get_all_by_dept_id($department);
	        $data['data_losstime_category'] = $this->model_losstime_category->get_all();
			$this->load->view('template/header/index', $data);
			$this->load->view('template/menu/index');
			$this->load->view('pages/actual_production/index');

		}else{
	        $data['setStart'] = $this->security->xss_clean($this->input->post('text_dateStart'));
	        $data['setEnd'] = $this->security->xss_clean($this->input->post('text_dateEnd'));
	        $data['dept'] = $department;
	        $data['data'] = $this->model_master_plan->get_by_dept_id($department, $data['setStart'], $data['setEnd']);
	        $data['data_machine'] = $this->model_machine->get_by_dept_id($department);
	        $data['data_machine_problem'] = $this->model_machine_problem->get_all_by_dept_id($department);
	        $data['data_losstime_category'] = $this->model_losstime_category->get_all();
			$this->load->view('template/header/index', $data);
			$this->load->view('template/menu/index');
			$this->load->view('pages/actual_production/index');
		}
	}

	public function production_status($department='')
	{
        $data['data'] = $this->model_master_plan_qty->get_production_status_by_dept_id($department);
        $data['department'] = $department;
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/production_status/index');
	}

	public function production_status_data()
	{
        $data = $this->model_master_plan_qty->get_production_status_by_dept_id();
        $no = 1;

        foreach ($data as $key) {
        	# code...
	        echo "

				<tr>
					<td class='ft'>".$no++."</td>
					<td class='ft'>".$key['production_part_no']."</td>
					<td class='ft'>".$key['model']."</td>
					<td class='ft'>".$key['description']."</td>
					<td class='ft'>".$key['capaDay']."</td>
					<td class='ft'><div>Plan</div><br><div class='fgreen'>Actual</div><br><div class='fred'>Ng</div></td>
					";
					for ($i=1; $i <= 31 ; $i++) {
						echo "
					<td class='fb'>
						<div>".$key['planDay'.$i]."</div><br>
						<div class='fgreen'>".($key['actualDay'.$i]-$key['ngQty'.$i])."</div><br>
						<div class='fred'>".($key['ngQty'.$i]*1)."</div><br>
					</td>";
					}

					echo "
					<td class='ft'>
						<div>".($key['planQtyTot']*1)."</div><br>
						<div class='fgreen'>".($key['actualQtyTot']-$key['ngQtyTot'])."</div><br>
						<div class='fred'>".($key['ngQtyTot']*1)."</div><br></td>
					<td class='ft'>".(number_format((float)(($key['actualQtyTot']-$key['ngQtyTot'])/$key['planQtyTot'])*100, 2, '.', ''))."%</td>
				</tr>
	        ";
        }
	}


	public function setMachine($department='') {
        $dateStart = $this->security->xss_clean($this->input->post('text_dateStart'));
        $dateEnd = $this->security->xss_clean($this->input->post('text_dateEnd'));

		$this->model_master_plan_qty->setMcOnSpk($department);
		$this->actual_production($department);
		// redirect('department/actual_production/'.$department);
	}
}
