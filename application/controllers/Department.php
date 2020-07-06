<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

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
					<td class='ft'>".$this->numberFor2($key['capaDay'])."</td>
					<td class='ft'><div>Plan</div><br><div class='fgreen'>Actual</div><br><div class='fred'>Ng</div></td>
					";
					for ($i=1; $i <= 31 ; $i++) {
						echo "
					<td class='fb' style='border-right: 1px solid #d2d2d2; padding:0px 3px 0px 3px !important'>
						<div>".$this->colBlack($key['planDay'.$i])."</div><br>
						<div class=''>".$this->colGreen($key['actualDay'.$i]-$key['ngQty'.$i])."</div><br>
						<div class='fred'>".$this->colRed($key['ngQty'.$i]*1)."</div><br>
					</td>";
					}

					echo "
					<td class='ft'>
						<div>".$this->numberFor($key['planQtyTot']*1)."</div><br>
						<div class=''>".$this->colGreen($key['actualQtyTot']-$key['ngQtyTot'])."</div><br>
						<div class='fred'>".$this->colRed($key['ngQtyTot']*1)."</div><br></td>
					<td class='ft'>".$this->colBlackPer((($key['actualQtyTot']-$key['ngQtyTot'])/$key['planQtyTot'])*100)."</td>
				</tr>
	        ";
        }
	}

	function numberFor($num){
		return number_format($num, 0,',','.');
	}

	function numberFor2($num){
		return number_format($num, 2,',','.');
	}

	function colBlack($var) {
		if ($var == 0) {
			return "<font color='#bfbfbf'>-</font>";
		}else{
			return "<font color=''>".$this->numberFor($var)."</font>";
		}
	}

	function colBlackPer($var) {
		if ($var == 0) {
			return "<font color='#bfbfbf'>0%</font>";
		}else{
			return "<font color=''>".$this->numberFor($var)."%</font>";
		}
	}

	function colGreen($var) {
		if ($var == 0) {
			return "<font color='#bfbfbf'>-</font>";
		}else{
			return "<font color='#00cc00'>".$this->numberFor($var)."</font>";
		}
	}

	function colRed($var) {
		if ($var == 0) {
			return "<font color='#bfbfbf'>-</font>";
		}else{
			return "<font color='red'>".$this->numberFor($var)."</font>";
		}
	}


	public function setMachine($department='') {
        $dateStart = $this->security->xss_clean($this->input->post('text_dateStart'));
        $dateEnd = $this->security->xss_clean($this->input->post('text_dateEnd'));

		$this->model_master_plan_qty->setMcOnSpk($department);
		$this->actual_production($department);
		// redirect('department/actual_production/'.$department);
	}

	function actual_download($department, $start, $end) {
		$data['data']       = $this->model_master_plan->get_by_dept_id($department, $start, $end);
		$data['start_date'] = $start;
		$data['end_date']   = $end;
		$data['data_problem'] = $this->model_machine_problem->get_all_by_dept_id($department);
        // $data['dataNg'] = $this->model_master_plan_qty->get_ng_by_qtyId($id);
        // $data['dataLoss'] = $this->model_losstime->get_loss_by_qtyId($id);
		$this->load->view('pages/actual_production/download', $data);
	}



}
