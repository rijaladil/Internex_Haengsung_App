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
	    <th width="">Nama</th>
	    <th width="">Shift</th>
		<th width="">Process</th>
		<th width="">Contact</th>
		<th width="9%">Option</th>
	  </tr>
	</thead>
	<tbody id="idContent">
		<?php $i = 1; foreach ($data as $key) { ?>
		<!-- <input hidden="" id="textUpdateLevel<?php echo $key['nip']; ?>" type="" name="" value="<?php echo $key['levelId']; ?>">
		<input hidden="" id="textUpdateDept<?php echo $key['nip']; ?>" type="" name="" value="<?php echo $key['deptId']; ?>"> -->
			<tr>
		    	<td class="text-center"><?php echo $i++; ?></td>
			    <td class=""><?php echo $key['dept']; ?></td>
			    <td class="text-center"><?php echo $key['nip']; ?></td>
			    <td class="" id="idValName<?php echo $key['nip']; ?>"><?php echo $key['name']; ?></td>
			    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
				    <td class="text-center">
				    	<?php
				    		if ($level['id']==$key['levelId']) {
				    			echo "&#10004";
				    		}
				    	?>
				    </td>
				<?php } ?>
			    <td class="text-center">
			    	<a class="click-btn-u" onclick="showModalEdit(<?php echo $key['nip']; ?>)" href="#">Update</a>
			    	<a class="click-btn-d" onclick="showModalDelete(<?php echo $key['nip']; ?>)" href="#">Delete</a>
			    </td>
			  </tr>
			<?php } ?>
	</tbody>
	</table>

</div>

<!-- <div id="modal" hidden=""> -->
<div class="form-popup" id="myForm">
	<div id="modal" class="form-container">
		<div class="title">+Add User </div>
		<br>

		Name : 		<input type="text" name="" id="textName">
		NIP : 		<input type="text" name="" id="textNip">
		Password :	<input type="text" name="" id="textPassword">
		Level :		<select id="textLevel">
						<option value=''>Select</option>
				    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
						<option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option>
					<?php } ?>
					</select>
		Dept:		<select id="textDept">
						<option value=''>Select</option>
					    <?php foreach ($this->model_department->get_all() as $level) { ?>
							<option value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?>

						</option>
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
		NIP : 		<input type="text" name="" id="textUpdateNip">
		Name : 		<input type="text" name="" id="textUpdateName">
		Password :	<input type="text" name="" id="textUpdatePassword" placeholder="Type here if you want to change the password">
		Level :		<select id="textUpdateLevel">
				    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
						<option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option>
					<?php } ?>
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
		<input type="text" name="" id="textDeleteHid" hidden="">
		NIP : 		<input type="text" name="" id="textDeleteNip" readonly>
		Name : 		<input type="text" name="" id="textDeleteName" readonly>
		Password :	<input type="text" name="" id="textDeletePassword" placeholder="Type here if you want to change the password" readonly>
		Level :		<input type="text" id="textDeleteLevel" readonly>
				    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
						<!-- <option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option> -->
					<?php } ?>

		Dept:		<input type="text" id="textDeleteDept" readonly>
				    <?php foreach ($this->model_department->get_all() as $level) { ?>
						<!-- <option value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?></option> -->
					<?php } ?>

					<button class="cancel" onclick='Delete()'>DELETE</button>
					<button class="cancel-del" onclick='closeModalDelete()'>CLOSE</button>
	</div>
</div>

</body>
<script type="text/javascript">
	function save(){
		var name = document.getElementById('textName').value;
		var nip = document.getElementById('textNip').value;
		var level = $('#textLevel').val()
		var dept = $('#textDept').val()
		var pass = $('#textPassword').val()
		if (name == '' || nip == '' || level == '' || dept == '' || pass == '') {
			console.log('kosong');
		}else{
			// console.log(name + ' -- ' +nip);

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/user_add/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'text_name': name,
		            'text_nip': nip,
		            'text_level': level,
		            'text_dept': dept,
		            'text_pass': pass,
		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
		        }
		    });

		}
	}

	function selectElement(id, valueToSelect) {
	    let element = document.getElementById(id);
	    element.value = valueToSelect;
	}

	function showModalEdit(id){
		var idLevel = document.getElementById('textUpdateLevel'+id).value;
		var idDept = document.getElementById('textUpdateDept'+id).value;

	  	document.getElementById("myForm1").style.display = "block";
		document.getElementById('textUpdateHid').value = id;
		document.getElementById('textUpdateNip').value = id;
		document.getElementById('textUpdateName').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('textUpdateLevel').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('textUpdateDept').value = document.getElementById('idValName'+id).innerHTML;

		selectElement('textUpdateLevel', idLevel);
		selectElement('textUpdateDept', idDept);
	}

	function showModalDelete(id){
		// var idLevel = document.getElementById('textDeleteLevel'+id).value;
		// var idDept = document.getElementById('textDeleteDept'+id).value;

	  	document.getElementById("myFormDel").style.display = "block";
		document.getElementById('textDeleteHid').value = id;
		document.getElementById('textDeleteNip').value = id;
		document.getElementById('textDeleteName').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('textDeleteLevel').value = document.getElementById('idValName'+id).innerHTML;
		document.getElementById('textDeleteDept').value = document.getElementById('idValName'+id).innerHTML;

		selectElement('textDeleteLevel', idLevel);
		selectElement('textDeleteDept', idDept);
	}

	function update(id){
		var nip = document.getElementById('textUpdateNip').value;
		var hid = document.getElementById('textUpdateHid').value;
		var name = document.getElementById('textUpdateName').value;
		var level = $('#textUpdateLevel').val()
		var dept = $('#textUpdateDept').val()
		var pass = $('#textUpdatePassword').val()
		if (name == '' || nip == '') {
			console.log('kosong');
		}else{
			// console.log(name + ' -- ' +nip);

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/user_update/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'hid': hid,
		            'text_name': name,
		            'text_nip': nip,
		            'text_level': level,
		            'text_dept': dept,
		            'text_pass': pass,
		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
		        }
		    });

		}
	}

</script>
</html>