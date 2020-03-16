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
        if($this->model_user->user_add()){

        $data = $this->model_user->get_all();

			$i = 1; foreach ($data as $key) {

				echo "
				<tr>
			    	<td class='text-center'>".$i++."</td>
				    <td class='text-center'>".$key['dept']."</td>
				    <td class='text-center'>".$key['nip']."</td>
				    <td class='text-center'>".$key['name']."</td>
				 ";
				    foreach ($this->model_user_level->get_all() as $level) {
				    	echo "
					    <td class='text-center'>
				    		".($level['id']==$key['levelId'] ? "Check":  "")."
					    </td>";
				    }
				   echo "
				    <td class='text-center'>&nbsp;</td>
				  </tr>";
			    };

        	// echo "true";
        }else{
        	echo 'false';
        	// echo "false";
        }
	}

	public function quality()
	{
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/setting/quality/index');
	}

	public function quality_add()
	{
        if($this->model_losstime_category->add()){

        $data = $this->model_department->get_all();

			$x = 1; foreach ($this->model_department->get_all() as $key) {
				echo '
						<div class="qs1">
							<table  width="100%" border="1" class="tblth">
								<tr>
									<td><?php echo '.$key['name'].'</td>
								</tr>
							</table>
							<table id="setting-quality<?php echo $x++; ?>" class="display"  width="100%" border="1">
								<thead>
								  <tr>
								    <th width="15%">No</th>
								    <th width="85%">Problem item</th>
								  </tr>
								</thead>
								<tbody>';
									$i = 1;
									foreach ($this->model_machine_problem->get_all_by_dept_id($key['id']) as $key2) {
										echo '
										  <tr>
										    <td class=\'text-center\'>'.$i++.'</td>
										    <td>'.$key2['name'].'</td>
										  </tr>';
									}
								echo '
								</tbody>
								<tfooter>
									  <tr>
									    <td class=\'text-center\'></td>
									    <td><a onclick="showModalAdd()" class="btn" href="#">Add Problem</a></td>
									  </tr>
								</tfooter>
							</table>
						</div>
				';
			}

        }else{
        	echo 'false';
        }
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

}
