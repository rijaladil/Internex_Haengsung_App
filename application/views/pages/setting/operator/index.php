<script>
	function openFormInput() {
	  document.getElementById("myForm").style.display = "block";
	}
	function showModalEdit(id) {
	  document.getElementById("myForm1").style.display = "block";
	}

	function showModalDelete(id) {
	  document.getElementById("myFormDel").style.display = "block";
	}

	function closeFormInput() {
	  document.getElementById("myForm").style.display = "none";
	}
	function closeModalEdit(id) {
	  document.getElementById("myForm1").style.display = "none";
	}
	function closeModalDelete(id) {
	  document.getElementById("myFormDel").style.display = "none";
	}
</script>

<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Operator Setting</div>
	<button class="red right"  onclick="openFormInput()">+ Add </button>

</div>
<div class="body-data">
	<table id="setting-user" class="display" width="50%" border="1">
	<thead>
	  <tr>
	    <th width="3%" height="50px">No</th>
	    <th width="">NIK</th>
	    <th width="">Name</th>
	    <th width="">Shift</th>
		<th width="">Department</th>
		<th width="">Contact</th>
		<th width="9%">Option</th>
	  </tr>
	</thead>
	<tbody id="idContent">
		<?php $i = 1; foreach ($data as $key) { ?>
			<input hidden="" type="text" id="id_<?php echo $key['nip']; ?>_dept" name="" value="<?php echo $key['department_id']; ?>">
			<tr>
				<td class="text-center"><?php echo $i++; ?></td>
		    	<td class="text-center"><?php echo $key['nip']; ?></td>
			    <td class="text-center" id="id_<?php echo $key['nip']; ?>_name"><?php echo $key['name']; ?></td>
			    <td class="text-center" id="id_<?php echo $key['nip']; ?>_shift"><?php echo $key['shift']; ?></td>
			    <td class="text-center" id="id_<?php echo $key['nip']; ?>_deptName"><?php echo $key['dept']; ?></td>
				<td class="text-center" id="id_<?php echo $key['nip']; ?>_phone"><?php echo $key['mobile']; ?></td>
			    <td class="text-center">
			    	<a class="click-btn-u" onclick="showUpdate(<?php echo $key['nip']; ?>)" href="#">Update</a>
			    	<a class="click-btn-d" onclick="showDelete(<?php echo $key['nip']; ?>)" href="#">Delete</a>
			    </td>
			  </tr>
		<?php } ?>
	</tbody>
	</table>

</div>

<!-- <div id="modal" hidden=""> -->
<div class="form-popup" id="myForm">
	<div id="modal" class="form-container">
		<div class="title">+Add Opeartor </div>
		<br>
		NIP :
		<input type="text" name="" id="id_input_nip">
		Name :
		<input type="text" name="" id="id_input_name">
		Phone :
		<input type="text" name="" id="id_input_mobile">
		Shift :
		<select id="id_input_shift">
			<option value=''>Select</option>
			<option value='1'>1</option>
			<option value='2'>2</option>
		</select>
		Dept:
		<select id="id_input_dept">
			<option value=''>Select</option>
		    <?php foreach ($this->model_department->get_all() as $level) { ?>
				<option value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?></option>
			<?php } ?>
		</select>
		<button class="btn" onclick='save()'>SAVE</button>
		<button class="cancel" onclick='closeFormInput()'>CLOSE</button>
	</div>
</div>

<div class="form-popup" id="myForm1">
	<div id="modalUpdate" class="form-container">
		<div class="title">Update User</div>
		<br>
		<input type="text" name="" id="textUpdateHid" hidden="">
		NIP :
		<input type="text" name="" id="textUpdateNip">
		Name :
		<input type="text" name="" id="textUpdateName">
		Phone :
		<input type="text" name="" id="textUpdatePhone">
		Shift :
		<select id="textUpdateShift">
			<option value='1'>1</option>
			<option value='2'>2</option>
		</select>
		Dept:		<select id="textUpdateDept">
					    <?php foreach ($this->model_department->get_all() as $level) { ?>
							<option value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?></option>
						<?php } ?>
					</select>
					<button class="btn" onclick='update()'>UPDATE</button>
					<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
	</div>
</div>

<div class="form-popup" id="myFormDel">
	<div id="modalDelete" class="form-container">
		<div class="title">Delete User</div>
		<br>
		NIP :
		<input type="text" name="" id="textDeleteNip" readonly>
		Name :
		<input type="text" name="" id="textDeleteName" readonly>
		Phone :
		<input type="text" name="" id="textDeletePhone" readonly>
		Shift :
		<input type="text" name="" id="textDeleteShift" readonly>
		Dept:
		<input type="text" id="textDeleteDept" readonly>
		<button class="cancel" onclick='remove()'>DELETE</button>
		<button class="cancel-del" onclick='closeModalDelete()'>CLOSE</button>
	</div>
</div>

</body>
<script type="text/javascript">
	function save(){
		var id_input_name = $('#id_input_name').val();
		var id_input_nip = $('#id_input_nip').val();
		var id_input_shift = $('#id_input_shift').val();
		var id_input_dept = $('#id_input_dept').val()
		var id_input_mobile = $('#id_input_mobile').val()
		if (
			id_input_name  == '' ||
			id_input_nip   == '' ||
			id_input_shift == '' ||
			id_input_dept  == '' ||
			id_input_mobile  == ''
			) {
			console.log('kosong');
		}else{

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/operator_add/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'id_input_name': id_input_name,
		            'id_input_nip': id_input_nip,
		            'id_input_shift': id_input_shift,
		            'id_input_dept': id_input_dept,
		            'id_input_mobile': id_input_mobile
		        },
		        cache: false,
		        success: function(msg){
		        	if (msg == 1) {
		        		console.log('oke');
			        	location.reload();
		        	}else{
		        		console.log('failed');
		        	}
		        }
		    });

		}
	}

	function selectElement(id, valueToSelect) {
	    let element = document.getElementById(id);
	    element.value = valueToSelect;
	}

	function showUpdate(id){
		var idShift = document.getElementById('id_'+id+'_shift').innerHTML;
		var idDept = document.getElementById('id_'+id+'_dept').value;

	  	document.getElementById("myForm1").style.display = "block";
		document.getElementById('textUpdateHid').value = id;
		document.getElementById('textUpdateNip').value = id;
		document.getElementById('textUpdateName').value = document.getElementById('id_'+id+'_name').innerHTML;
		document.getElementById('textUpdatePhone').value = document.getElementById('id_'+id+'_phone').innerHTML;

		selectElement('textUpdateDept', idDept);
		selectElement('textUpdateShift', idShift);
	}

	function update(){
		var hid   = $('#textUpdateHid').val();
		var nip   = $('#textUpdateNip').val();
		var name  = $('#textUpdateName').val();
		var phone = $('#textUpdatePhone').val();
		var shift = $('#textUpdateShift').val();
		var dept  = $('#textUpdateDept').val();
		if (
			nip   == '' ||
			name  == '' ||
			phone == '' ||
			shift == '' ||
			dept  == ''
			) {
			console.log('kosong');
		}else{
		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/operator_update/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
					'hid': hid,
					'id_input_nip': nip,
					'name': name,
					'phone': phone,
					'shift': shift,
					'dept': dept
		        },
		        cache: false,
		        success: function(msg){
		        	if (msg == 1) {
		        		console.log('oke');
			        	location.reload();
		        	}else{
		        		console.log('failed');
		        	}
		        }
		    });
		}
	}

	function showDelete(id){
	  	document.getElementById("myFormDel").style.display = "block";
		document.getElementById('textDeleteNip').value = id;
		document.getElementById('textDeleteName').value = document.getElementById('id_'+id+'_name').innerHTML;
		document.getElementById('textDeletePhone').value = document.getElementById('id_'+id+'_phone').innerHTML;
		document.getElementById('textDeleteShift').value = document.getElementById('id_'+id+'_shift').innerHTML;
		document.getElementById('textDeleteDept').value = document.getElementById('id_'+id+'_deptName').innerHTML;
	}

	function remove(){
		var hid   = $('#textDeleteNip').val();
	    $.ajax({
	        url: "<?php echo base_url(); ?>setting/operator_delete/",
	        // dataType: 'json',
	        type: 'POST',
	        data: {
				'hid': hid,
	        },
	        cache: false,
	        success: function(msg){
	        	if (msg == 1) {
	        		console.log('oke');
		        	location.reload();
	        	}else{
	        		console.log('failed');
	        	}
	        }
	    });
	}

</script>
</html>