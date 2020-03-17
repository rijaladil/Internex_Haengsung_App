<div class="form">
	<div class="left">Setting Line MC</div>
	<button class="btn-slt-crd">Save</button>
	<!-- <button class="btn-slt-crd">Delete</button> -->
	<button class="btn-slt-crd">+ Add</button>
	<button class="btn-slt-ref">Check Again</button>
</div>
<div class="body-data">
	<table id="setting-line-mc" class="display" width="100%" border="1">
		<thead>
		  <tr>
			 <th width="3%">NO</th>
			 <th width="10%">Process</th>
			 <th width="4%">No.M/C  </th>
			 <th width="13%">Machine  Name </th>
			 <th width="10%">1 Shift Worker</th>
			 <th width="10%">2 Shift Worker</th>
			 <th width="10%">3 Shift Worker</th>
			 <th width="10%">Operation of terminal</th>
			 <th width="10%">Terminal  IP No</th>
			 <th width="10%">Terminal S/W Update</th>
			 <th width="10%">Remarks</th>
			 <th width="5%">Option</th>
		  </tr>
		</thead>
		<tbody>
			<?php $i = 1; foreach ($data as $key) { ?>
				<input type="text" hidden="" id="idInputEditDept<?php echo $key['id']; ?>" name="" value="<?php echo $key['deptId']; ?>">
				<input type="text" hidden="" id="idValWorker1<?php echo $key['id']; ?>" name="" value="<?php echo $key['worker_1']; ?>">
				<input type="text" hidden="" id="idValWorker2<?php echo $key['id']; ?>" name="" value="<?php echo $key['worker_2']; ?>">
				<input type="text" hidden="" id="idValWorker3<?php echo $key['id']; ?>" name="" value="<?php echo $key['worker_3']; ?>">
				  <tr>
					 <td class="text-center"><?php echo $i++; ?></td>
					 <td class="text-center"><?php echo $key['dept']; ?></td>
					 <td class="text-center" id="idValMcNo<?php echo $key['id']; ?>"><?php echo $key['mc_no']; ?></td>
					 <td class="text-center" id="idValName<?php echo $key['id']; ?>"><?php echo $key['name']; ?></td>
					 <td class="text-center"><?php echo $key['worker1']; ?></td>
					 <td class="text-center"><?php echo $key['worker2']; ?></td>
					 <td class="text-center"><?php echo $key['worker3']; ?></td>
					 <td class="text-center"></td>
					 <td class="text-center" id="idValIp<?php echo $key['id']; ?>"><?php echo $key['ip_address']; ?></td>
					 <td class="text-center"></td>
					 <td class="text-center" id="idValRemark<?php echo $key['id']; ?>"><?php echo $key['remark']; ?></td>
					 <td class="text-center"><a href="#/" onclick="showModalEdit(<?php echo $key['id']; ?>)">Edit</a></td>
				  </tr>
			<?php } ?>
		</tbody>
	</table>

	<div id="modalEdit">
		<input type="" id="hid" name="">
		<input type="" id="idInputEditMcNo" name="">
		<input type="" id="idInputEditName" name="">
		<input type="" id="idInputEditIp" name="">
		<input type="" id="idInputEditRemark" name="">
		<select id="idInputEditDept">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_department->get_all() as $key) { ?>
				<option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputEditWorker1">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputEditWorker2">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputEditWorker3">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<a href="#/" onclick="update()">Update</a>
	</div>

	<div id="modalAdd">
		<input type="" id="idInputAddMcNo" name="">
		<input type="" id="idInputAddName" name="">
		<input type="" id="idInputAddIp" name="">
		<select id="idInputAddDept">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_department->get_all() as $key) { ?>
				<option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputAddWorker1">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputAddWorker2">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<select id="idInputAddWorker3">
			<option value="0">Pilih</option>
			<?php foreach ($this->model_user->get_op() as $key) { ?>
				<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			<?php } ?>
		</select>
		<a href="#/" onclick="save()">Save</a>
	</div>


</div>

<script type="text/javascript">
	function showModalEdit(id) {
		document.getElementById('hid').value = id;
		document.getElementById('idInputEditMcNo').value = document.getElementById('idValMcNo'+id).innerHTML;
		document.getElementById('idInputEditName').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('idInputEditIp').value = document.getElementById('idValIp'+id).innerHTML;
		document.getElementById('idInputEditRemark').value = document.getElementById('idValRemark'+id).innerHTML;
		var idDept = document.getElementById('idInputEditDept'+id).value;
		var idWork1 = document.getElementById('idValWorker1'+id).value;
		var idWork2 = document.getElementById('idValWorker2'+id).value;
		var idWork3 = document.getElementById('idValWorker3'+id).value;
		selectElement('idInputEditDept', idDept);
		selectElement('idInputEditWorker1', idWork1);
		selectElement('idInputEditWorker2', idWork2);
		selectElement('idInputEditWorker3', idWork3);
	}

	function selectElement(id, valueToSelect) {
	    let element = document.getElementById(id);
	    element.value = valueToSelect;
	}

	function update(){
		var id = document.getElementById('hid').value;
		var mcNo = document.getElementById('idInputEditMcNo').value;
		var name = document.getElementById('idInputEditName').value;
		var ip = document.getElementById('idInputEditIp').value;
		var remark = document.getElementById('idInputEditRemark').value;
		var idDept = document.getElementById('idInputEditDept').value;
		var work1 = document.getElementById('idInputEditWorker1').value;
		var work2 = document.getElementById('idInputEditWorker2').value;
		var work3 = document.getElementById('idInputEditWorker3').value;
	    $.ajax({
	        url: "<?php echo base_url(); ?>setting/line_update/",
	        dataType: 'json',
	        type: 'POST',
	        data: {
	            'text_mcno': mcNo,
	            'text_name': name,
	            'text_dept': idDept,
	            'text_ip': ip,
	            'text_remark': remark,
	            'text_work1': work1,
	            'text_work2': work2,
	            'text_work3': work3,
	            'hid': id,
	        },
	        cache: false,
	        success: function(msg){
	        	if (msg == 'ok') {
	        		location.reload();
	        	}else{
	        		console.log(msg);
	        	}
	        }
	    });
	}

	function save(){
		var mcNo = document.getElementById('idInputAddMcNo').value;
		var name = document.getElementById('idInputAddName').value;
		var ip = document.getElementById('idInputAddIp').value;
		var idDept = document.getElementById('idInputAddDept').value;
		var work1 = document.getElementById('idInputAddWorker1').value;
		var work2 = document.getElementById('idInputAddWorker2').value;
		var work3 = document.getElementById('idInputAddWorker3').value;
	    $.ajax({
	        url: "<?php echo base_url(); ?>setting/line_add/",
	        dataType: 'json',
	        type: 'POST',
	        data: {
	            'text_mcno': mcNo,
	            'text_name': name,
	            'text_dept': idDept,
	            'text_ip': ip,
	            'text_work1': work1,
	            'text_work2': work2,
	            'text_work3': work3,
	        },
	        cache: false,
	        success: function(msg){
	        	if (msg == 'ok') {
	        		location.reload();
	        	}else{
	        		console.log(msg);
	        	}
	        }
	    });
	}

</script>

</body>
</html>