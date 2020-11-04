<script>
	function openFormInput() {
	  document.getElementById("myForm").style.display = "block";
	}
	function showModalEdit(id) {
	  document.getElementById("myForm1").style.display = "block";
	}

	function closeFormInput() {
	  document.getElementById("myForm").style.display = "none";
	}
	function closeModalEdit(id) {
	  document.getElementById("myForm1").style.display = "none";
	}
	function closeModalDelete(id) {
	  document.getElementById("myFormDelete").style.display = "none";
	}
</script>

<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Setting Line MC</div>
	<!-- <button class="btn-slt-crd">Save</button> -->
	<!-- <button class="btn-slt-crd">Delete</button> -->
	<button  class="red right" onclick="openFormInput()">+ Add</button>
	<!-- <button class="btn-slt-ref">Check Again</button> -->
</div>
<div class="body-data">
	<table id="setting-line-mc" class="display" width="100%" border="1">
		<thead>
		  <tr>
			 <th width="3%">NO</th>
			 <th width="10%">Process</th>
			 <th width="4%">No.M/C  </th>
			 <th width="13%">Machine  Name </th>
	<!-- 		 <th width="8%">1 Shift Worker</th>
			 <th width="8%">2 Shift Worker</th>
			 <th width="8%">3 Shift Worker</th> -->
			 <!-- <th width="10%">Operation of terminal</th> -->
			 <th width="10%">Terminal  IP No</th>
			 <!-- <th width="10%">Terminal S/W Update</th> -->
			 <th width="30%">Remarks</th>
			 <th width="10%">Option</th>
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
<!-- 					 <td class="text-center"><?php echo $key['worker1']; ?></td>
					 <td class="text-center"><?php echo $key['worker2']; ?></td>
					 <td class="text-center"><?php echo $key['worker3']; ?></td> -->
					 <!-- <td class="text-center"></td> -->
					 <td class="text-center" id="idValIp<?php echo $key['id']; ?>"><?php echo $key['ip_address']; ?></td>
					 <!-- <td class="text-center"></td> -->
					 <td class="text-center" id="idValRemark<?php echo $key['id']; ?>"><?php echo $key['remark']; ?></td>
					 <td class="text-center">
					 	<a class="click-btn-u" href="#/" onclick="showModalEdit('<?php echo $key['id']; ?>')">Update</a>
					 	<a class="click-btn-d" href="#/" onclick="showModalDelete('<?php echo $key['id']; ?>')">Delete</a>
					 </td>
				  </tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<!-- UPDATE -->
	<div class="form-popup" id="myForm1">
		<div id="modalEdit" class="form-container">
			<div class="title">Update Line MC</div>
			<br>
			<input type="text" id="hid" name="" hidden="">
			No.M/C :<input type="text" id="idInputEditMcNo" name="">
			Machine Name : <input type="text" id="idInputEditName" name="">
			Terminal IP No :<input type="text" id="idInputEditIp" name="">
			Remarks :<input type="text" id="idInputEditRemark" name="">
			<table width="100%" border="0">
			  <tr>
			    <td>
			    Process:
			    <select id="idInputEditDept">
			       <!--  <option value="0">Pilih</option> -->
			        <?php foreach ($this->model_department->get_all() as $key) { ?>
			            <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
			        <?php } ?>
			    </select>
			    </td>
			   <!--  <td>
			    1 Shift Worker :
			    <select id="idInputEditWorker1">
			        <option value="0">Pilih</option>
			        <?php foreach ($this->model_user->get_op() as $key) { ?>
			            <option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
			        <?php } ?>
			    </select>
			   </td>
			  </tr>
			  <tr>
			    <td>
			    2 Shift Worker :
			    <select id="idInputEditWorker2">
					<option value="0">Pilih</option>
					<?php foreach ($this->model_user->get_op() as $key) { ?>
						<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
					<?php } ?>
				</select>
				</td>
			    <td>
			    3 Shift Worker :
			    <select id="idInputEditWorker3">
					<option value="0">Pilih</option>
					<?php foreach ($this->model_user->get_op() as $key) { ?>
						<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
					<?php } ?>
				</select>
				</td>
			  </tr> -->
			</table>

			<button class="btn"  href="#/" onclick="update()">UPDATE</button>
			<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
		</div>
	</div>

<!-- +ADD -->
	<div class="form-popup" id="myForm">
		<div id="modalAdd" class="form-container">
			<div class="title">+Add Line MC</div>
			<br>
			No.M/C : <input type="text" id="idInputAddMcNo" name="">
			Machine Name : <input type="text" id="idInputAddName" name="">

			<table width="100%" border="0">
			  <tr>
			    <td>
			Process: <select id="idInputAddDept">
							<option value="0">Pilih</option>
							<?php foreach ($this->model_department->get_all() as $key) { ?>
								<option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
							<?php } ?>
						</select>
			    </td>
			    <!-- <td>
			1 Shift Worker : <select id="idInputAddWorker1">
							<option value="0">Pilih</option>
							<?php foreach ($this->model_user->get_op() as $key) { ?>
								<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
							<?php } ?>
						</select>
			   </td>
			  </tr>
			  <tr>
			    <td>
			  2 Shift Worker : <select id="idInputAddWorker2">
							<option value="0">Pilih</option>
							<?php foreach ($this->model_user->get_op() as $key) { ?>
								<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
							<?php } ?>
						</select>
			    </td>
			    <td>
			 3 Shift Worker : <select id="idInputAddWorker3">
							<option value="0">Pilih</option>
							<?php foreach ($this->model_user->get_op() as $key) { ?>
								<option value="<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></option>
							<?php } ?>
						</select>
			    </td>
			  </tr> -->
			</table>
			Terminal IP No :<input type="text" id="idInputAddIp" name="">
			Remarks :<input type="text" id="idInputEditRemark" name="">

			<button class="btn" href="#/" onclick="save()">SAVE</button>
			<button class="cancel" onclick='closeFormInput()'>CLOSE</button>
		</div>
	</div>

<!-- DELETE -->
	<div class="form-popup" id="myFormDelete">
		<div id="modalDelete" class="form-container">
			<div class="title">Delete Line MC</div>
			<br>
			<input type="text" id="hid_delete" name="" readonly hidden="">
			No.M/C :<input type="text" id="idInputDeleteMcNo" name="" readonly>
			Machine Name : <input type="text" id="idInputDeleteName" name="" readonly>
			Terminal IP No :<input type="text" id="idInputDeleteIp" name="" readonly>
			Remarks :<input type="text" id="idInputDeleteRemark" name="" readonly>
			<table width="100%" border="0">
			  <tr>
			    <td>
			    Process:
			    <select id="idInputDeleteDept" readonly>
			        <?php foreach ($this->model_department->get_all() as $key) { ?>
			            <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
			        <?php } ?>
			    </select>
			    </td>
			    <!-- <td>
			    1 Shift Worker :
			    <input type="text"  id="idInputDeleteWorker1" readonly>
			        <?php foreach ($this->model_user->get_op() as $key) { ?>
			        <?php } ?>

			   </td>
			  </tr>
			  <tr>
			    <td>
			    2 Shift Worker :
			    <input type="text"  id="idInputDeleteWorker2" readonly>
					<?php foreach ($this->model_user->get_op() as $key) { ?>
					<?php } ?>

				</td>
			    <td>
			    3 Shift Worker :
			    <input type="text"  id="idInputDeleteWorker3" readonly>
					<?php foreach ($this->model_user->get_op() as $key) { ?>
					<?php } ?>

				</td>
			  </tr> -->
			</table>

			<button class="cancel"  href="#/" onclick="deletes()">DELETE</button>
			<button class="cancel-del" onclick='closeModalDelete()'>CLOSE</button>
		</div>
	</div>


<script type="text/javascript">
	function showModalAdd(id){
			document.getElementById("myForm").style.display = "block";
			document.getElementById('idDept').value = id;
	}

	function showModalEdit(id) {
		document.getElementById("myForm1").style.display = "block";
		document.getElementById('hid').value = id;
		document.getElementById('idInputEditMcNo').value = document.getElementById('idValMcNo'+id).innerHTML;
		document.getElementById('idInputEditName').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('idInputEditIp').value = document.getElementById('idValIp'+id).innerHTML;
		document.getElementById('idInputEditRemark').value = document.getElementById('idValRemark'+id).innerHTML;
		var idDept = document.getElementById('idInputEditDept'+id).value;
		// var idWork1 = document.getElementById('idValWorker1'+id).value;
		// var idWork2 = document.getElementById('idValWorker2'+id).value;
		// var idWork3 = document.getElementById('idValWorker3'+id).value;
		selectElement('idInputEditDept', idDept);
		// selectElement('idInputEditWorker1', idWork1);
		// selectElement('idInputEditWorker2', idWork2);
		// selectElement('idInputEditWorker3', idWork3);
	}

	function showModalDelete(id) {
		console.log(id);
		document.getElementById("myFormDelete").style.display = "block";
		document.getElementById('hid_delete').value = id;
		document.getElementById('idInputDeleteMcNo').value = document.getElementById('idValMcNo'+id).innerHTML;
		document.getElementById('idInputDeleteName').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('idInputDeleteIp').value = document.getElementById('idValIp'+id).innerHTML;
		document.getElementById('idInputDeleteRemark').value = document.getElementById('idValRemark'+id).innerHTML;
		// var idDept = document.getElementById('idInputDeleteDept'+id).value;
		// var idWork1 = document.getElementById('idValWorker1'+id).value;
		// var idWork2 = document.getElementById('idValWorker2'+id).value;
		// var idWork3 = document.getElementById('idValWorker3'+id).value;
		// selectElement('idInputDeleteDept', idDept);
		// selectElement('idInputDeleteWorker1', idWork1);
		// selectElement('idInputDeleteWorker2', idWork2);
		// selectElement('idInputDeleteWorker3', idWork3);
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
		// var work1 = document.getElementById('idInputEditWorker1').value;
		// var work2 = document.getElementById('idInputEditWorker2').value;
		// var work3 = document.getElementById('idInputEditWorker3').value;
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
	            // 'text_work1': work1,
	            // 'text_work2': work2,
	            // 'text_work3': work3,
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

	function deletes(){
		var id = document.getElementById('hid_delete').value;
	    $.ajax({
	        url: "<?php echo base_url(); ?>setting/line_delete/",
	        dataType: 'json',
	        type: 'POST',
	        data: {
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
		var remark = document.getElementById('idInputEditRemark').value;
		var idDept = document.getElementById('idInputAddDept').value;
		// var work1 = document.getElementById('idInputAddWorker1').value;
		// var work2 = document.getElementById('idInputAddWorker2').value;
		// var work3 = document.getElementById('idInputAddWorker3').value;

	    $.ajax({
	        url: "<?php echo base_url(); ?>setting/line_add/",
	        dataType: 'json',
	        type: 'POST',
	        data: {
	            'text_mcno': mcNo,
	            'text_name': name,
	            'text_dept': idDept,
	            'text_ip': ip,
	            'text_remark': remark,
	            // 'text_work1': work1,
	            // 'text_work2': work2,
	            // 'text_work3': work3,
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