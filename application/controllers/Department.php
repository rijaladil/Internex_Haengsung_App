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
                (!in_array($this->session->userdata('level'), array(1,2,3,4)))
            )
        {
            redirect('login');
        }
    }

	public function index()
	{
        $this->production_model();
	}

	public function production_model($department=''){
	        $data['setStart'] = $this->security->xss_clean($this->input->post('text_dateStart'));
	        $data['setEnd'] = $this->security->xss_clean($this->input->post('text_dateEnd'));
	        $data['dept'] = $department;
	        $data['dataA'] = $this->model_master_plan->get_by_dept_id_A($department, $data['setStart'], $data['setEnd']);
	        $data['dataB'] = $this->model_master_plan->get_by_dept_id_B($department, $data['setStart'], $data['setEnd']);
	        $data['dataC'] = $this->model_master_plan->get_by_dept_id_C($department, $data['setStart'], $data['setEnd']);

	        $data['dataAtot'] = $this->model_master_plan->get_by_dept_id_A_tot($department, $data['setStart'], $data['setEnd']);
	        $data['dataBtot'] = $this->model_master_plan->get_by_dept_id_B_tot($department, $data['setStart'], $data['setEnd']);
	        $data['dataCtot'] = $this->model_master_plan->get_by_dept_id_C_tot($department, $data['setStart'], $data['setEnd']);

	        $data['datatot'] = $this->model_master_plan->get_by_dept_id_tot($department, $data['setStart'], $data['setEnd']);

	        $data['data_machine'] = $this->model_machine->get_by_dept_id($department);

			$this->load->view('template/header/index', $data);
			$this->load->view('template/menu/index');
			$this->load->view('pages/production_model/index');

	}


	public function setMcOnSpk()
	{
		if ($this->model_master_plan_qty->setMcOnSpk()) {
			echo 1;
		}else{
			echo 0;
		}
	}

	public function setOperator()
	{
		if ($this->model_master_plan_qty->setOperator()) {
			echo 1;
		}else{
			echo 0;
		}
	}

	public function changeCounter()
	{
		if ($this->model_master_plan_qty->changeCounter()) {
			echo 1;
		}else{
			echo 0;
		}
	}

	public function production_day($department='')
	{
		 // $data['data']       = $this->model_master_plan_qty->get_production_day_by_dept_id($department);
		$data['department'] = $department;
		$this->load->view('template/header/index', $data);
		$this->load->view('template/menu/index');
		$this->load->view('pages/production_day/index');
	}

	public function production_day_data()
	{
        $data = $this->model_master_plan_qty->get_production_day_by_dept_id();
        $no = 1;


       foreach ($data as $key) {
        	# code...
	        echo "

				<tr>
					<td class='ft'>".$key['dept']."</td>
					<td class='ft'>".$key['machine']."</td>
					<td class='ft'>
						<div>Plan</div><br>
						<div class=''>Table</div><br>
						<div class=''>Input</div><br>
						<div class=''>Output</div><br>
						<div class=''>+/-</div><br>
						<div class=''>%</div>
					</td>
					";

					for ($i=1; $i <= 31 ; $i++) {
						echo "
					<td class='' style='border-right: 1px solid #d2d2d2; padding:0px 3px 0px 3px !important'>
						<div>".$this->colBlack($key['planDay'.$i])."</div><br>
						<div class=''>".$this->colBlack($key['result_table_Day'.$i])."</div><br>
						<div class=''>".$this->colBlack($key['result_input_Day'.$i])."</div><br>
						<div class=''>".$this->colBlack($key['result_output_Day'.$i])."</div><br>
						<div class=''>".$this->colBlack($key['result_output_Day'.$i]-$key['planDay'.$i] )."</div><br>
						<div class=''>".( empty($key['planDay'.$i]) ? '' : number_format($key['result_output_Day'.$i]/$key['planDay'.$i]*100, 1) )."</div><br>
					</td>";
					}

					echo "
					<td class='ft'>
						<div>".$this->numberFor($key['planQtyTot']*1)."</div><br>
						<div>".$this->numberFor($key['tableQtyTot']*1)."</div><br>
						<div>".$this->numberFor($key['inputQtyTot']*1)."</div><br>
						<div>".$this->numberFor($key['outputQtyTot']*1)."</div><br>
						<div>".$this->numberFor(($key['outputQtyTot']*1) - ($key['planQtyTot']*1))."</div><br>
						<div>".( empty($key['planQtyTot']) ? '' : number_format($key['outputQtyTot']/$key['planQtyTot']*100, 1) )."</div><br>
					</td>
				</tr>


	        ";
	        
	     
        }
	}

	// public function production_day_data_tot()
	// {
 //        $data = $this->model_master_plan_qty->get_production_day_by_dept_id_tot();
 //        $no = 1;


 //       foreach ($data as $key) {
  
	//         // total
	//          echo "

	// 			<tr>
	// 				<td colspan='2' class='ft'>	TOTAL</td>
	// 				<td class='ft'>
	// 					<div>Plan</div><br>
	// 					<div class=''>Table</div><br>
	// 					<div class=''>Input</div><br>
	// 					<div class=''>Output</div><br>
	// 					<div class=''>+/-</div><br>
	// 					<div class=''>%</div>
	// 				</td>
	// 				";
	// 				for ($i=1; $i <= 31 ; $i++) {
	// 					echo "
	// 				<td class='' style='border-right: 1px solid #d2d2d2; padding:0px 3px 0px 3px !important'>
	// 					<div>".$this->colBlack($key['planDay'.$i])."</div><br>
	// 					<div class=''>".$this->colBlack($key['result_table_Day'.$i])."</div><br>
	// 					<div class=''>".$this->colBlack($key['result_input_Day'.$i])."</div><br>
	// 					<div class=''>".$this->colBlack($key['result_output_Day'.$i])."</div><br>
	// 					<div class=''>".$this->colBlack($key['result_output_Day'.$i]-$key['planDay'.$i] )."</div><br>
	// 					<div class=''>".( empty($key['planDay'.$i]) ? '' : number_format($key['result_output_Day'.$i]/$key['planDay'.$i]*100, 1) )."</div><br>
	// 				</td>";
	// 				}

	// 				echo "
	// 				<td class='ft'  style='border-top:1px solid black;'>
	// 					<div>".$this->numberFor($key['planQtyTot']*1)."</div><br>
	// 					<div>".$this->numberFor($key['tableQtyTot']*1)."</div><br>
	// 					<div>".$this->numberFor($key['inputQtyTot']*1)."</div><br>
	// 					<div>".$this->numberFor($key['outputQtyTot']*1)."</div><br>
	// 					<div>".$this->numberFor(($key['outputQtyTot']*1) - ($key['planQtyTot']*1))."</div><br>
	// 					<div>".( empty($key['planQtyTot']) ? '' : number_format($key['outputQtyTot']/$key['planQtyTot']*100, 1) )."</div><br>
	// 				</td>
	// 			</tr>

				
	//         ";
 //        }
	// }

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


	function actual_download($department, $start, $end) {
		$data['data']          = $this->model_master_plan->get_by_dept_id($department, $start, $end);
		$data['start_date']    = $start;
		$data['end_date']      = $end;
		$data['department']    = $this->model_department->get_department_by_id($department);
		$data['data_problem']  = $this->model_machine_problem->get_all_by_dept_id($department);
		$data['data_losstime'] = $this->model_losstime_category->get_all();
		$data['data_operator'] = $this->model_operator->get_data();
		$this->load->view('pages/production_model/download', $data);
	}

	function production_download($department, $date) {
		// $data['data']       = $this->model_master_plan->get_by_dept_id($department, $date);
		$data['data']          = $this->model_master_plan_qty->get_production_day_by_dept_id_url($department, $date);
		$data['date']          = $date;
		$data['department']    = $this->model_department->get_department_by_id($department);
		$data['data_problem']  = $this->model_machine_problem->get_all_by_dept_id($department);
		$data['data_losstime'] = $this->model_losstime_category->get_all();
		$this->load->view('pages/production_day/download', $data);
	}

}
