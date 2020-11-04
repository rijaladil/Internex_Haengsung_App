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
	<div class="left">Production Planning</div>
	<button class="red right"  onclick="openFormInput()">+ Add </button>

</div>
<div class="body-data">
	<table id="setting-user" class="display" width="50%" border="1">
	<thead>
	  <tr>
	    <th width="3%" height="50px">No</th>
	    <th width="">Process</th>
	    <th width="">Line / Machine</th>
		<th width="">Date</th>
	    <th width="">Plan</th>
	    <th width="10%">Option</th>
	  </tr>
	</thead>
	<tbody id="idContent">
		<?php $i = 1; foreach ($data as $key) { ?>
		<input hidden="" id="textUpdateDepartment<?php echo $key['id']; ?>" value="<?php echo $key['name']; ?>">
		<input hidden="" id="textUpdateMcno<?php echo $key['id']; ?>" value="<?php echo $key['mc_no']; ?>">
			<tr>
		    	<td class="text-center"><?php echo $i++; ?></td>
			    <td class="text-center" id="idValDept<?php echo $key['id']; ?>"><?php echo $key['name']; ?></td>
			    <td class="text-center" id="idValMc<?php echo $key['id']; ?>"><?php echo $key['mc_no']; ?></td>
			    <td class="text-center" id="idValDate<?php echo $key['id']; ?>"><?php echo $key['date']; ?></td>
			     <td class="text-center" id="idValQty<?php echo $key['id']; ?>"><?php echo $key['qty']; ?></td>
			    <td class="text-center">
			    	<a class="click-btn-u" onclick="showModalEdit('<?php echo $key['id']; ?>')" href="#">Update</a>
			    	<a class="click-btn-d" onclick="showModalDelete('<?php echo $key['id']; ?>')" href="#">Delete</a>
			    </td>
			  </tr>
			<?php } ?>
	</tbody>
	</table>

</div>

<!-- <div id="modal" hidden=""> -->
<div class="form-popup" id="myForm">
	<div id="modal" class="form-container">
		<div class="title">+Add Planning </div>
		<br>
		Process : 		
						<select id="textDepartment">
							<option value=''>Select</option>
						    <?php foreach ($this->model_department->get_all() as $dep) { ?>
								<option value="<?php echo $dep['id']; ?>"><?php echo $dep['name']; ?></option>
							<?php } ?>
						</select>
		Line / Mesin : 	
						<select id="textMcno">
							<option value=''>Select</option>
						    <?php foreach ($this->model_machine->get_by_line_setting() as $mcno) { ?>
								<option value="<?php echo $mcno['id']; ?>"><?php echo $mcno['mc_no']; ?></option>
							<?php } ?>
						</select>
		Date :			<input type="text" name="" id="textDate" class="textDate">
		Plan :			<input type="text" name="" id="textPlan">
							<button class="btn" onclick='save()'>SAVE</button>
							<button class="cancel" onclick='closeFormInput()'>CLOSE</button>
	</div>

</div>

<div class="form-popup" id="myForm1">
	<div id="modalUpdate" class="form-container">
		<div class="title">Update Planning</div>
		<br>
		<input type="text" name="" id="textUpdateHid" hidden="">
		Process : 		<input type="text" name=""  id="textUpdateDepartment" readonly>
		Line / Mesin : 	<input type="text" name=""  id="textUpdateMcno" readonly>
		Date :			<input type="text" name="" id="textUpdateDate" class="textDate1">
		Plan :			<input type="text" name="" id="textUpdatePlan">
							<button class="btn" onclick='update()'>UPDATE</button>
							<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
	</div>
</div>

<div class="form-popup" id="myFormDel">
	<div id="modalDelete" class="form-container">
		<div class="title">Delete Planning</div>
		<br>
		<input type="text" name="" id="textDeleteHid" hidden="">
		Process :		<input type="text" name="" id="textDeleteDepartment" readonly>
		Line / Mesin :	<input type="text" name="" id="textDeleteMcno" readonly>
		Date :			<input type="text" name="" id="textDeleteDate" readonly>
		Plan :			<input type="text" name="" id="textDeletePlan" readonly>
							<button class="cancel" onclick='hapus()'>DELETE</button>
							<button class="cancel-del" onclick='closeModalDelete()'>CLOSE</button>
	</div>
</div>

</body>
<script type="text/javascript">
	function save(){
		var dep = document.getElementById('textDepartment').value;
		var mcno = document.getElementById('textMcno').value;
		var date = document.getElementById('textDate').value;
		var qty = document.getElementById('textPlan').value;

		if (dep == '' || mcno == '' || date == '' || qty == '') {
			console.log('kosong');
		}else{

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/spk_add/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'text_department': dep,
		            'text_mc_no': mcno,
		            'text_date': date,
		            'text_qty': qty,
		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
		        }
		    });

		}
	}


	function update(id){
		var hid = document.getElementById('textUpdateHid').value;
		var dep = document.getElementById('textUpdateDepartment').value;
		var mcno = document.getElementById('textUpdateMcno').value;
		var date = document.getElementById('textUpdateDate').value;
		var qty = document.getElementById('textUpdatePlan').value;
		if (  date == '' || qty == '') {
			console.log('kosong');
		}else{
		

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/spk_update/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		        	 'hid': hid,
		            'text_department': dep,
		            'text_mc_no': mcno,
		            'text_date': date,
		            'text_qty': qty,
		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
		        }
		    });

		}
	}

	function hapus(id){
		var hid = document.getElementById('textDeleteHid').value;
		var dep = document.getElementById('textDeleteDepartment').value;
		var mcno = document.getElementById('textDeleteMcno').value;
		var date = document.getElementById('textDeleteDate').value;
		var qty = document.getElementById('textDeletePlan').value;
		if ( dep == '' || mcno == '' || date == '' || qty == '') {
			console.log('kosong');
		}else{

		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/spk_delete/",
		        type: 'POST',
		        data: {
		            'hid': hid,
		            'text_department': dep,
		            'text_mc_no': mcno,
		            'text_date': date,
		            'text_qty': qty,

		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
		        }
		    });
		   }
		
	}

  $( function() {
    $( ".textDate" ).datepicker({dateFormat : 'yy-mm-dd'});
     $( ".textDate1" ).datepicker({dateFormat : 'yy-mm-dd'});
  } );


	function selectElement(id, valueToSelect) {
	    let element = document.getElementById(id);
	    element.value = valueToSelect;
	}

	function showModalEdit(id){
		var idDept = document.getElementById('textUpdateDepartment'+id).value;
		var idMc = document.getElementById('textUpdateMcno'+id).value;

	  	document.getElementById("myForm1").style.display = "block";
		document.getElementById('textUpdateHid').value = id;
		document.getElementById('textUpdateDepartment').value = document.getElementById('idValDept'+id).innerHTML;
		document.getElementById('textUpdateMcno').value = document.getElementById('idValMc'+ id).innerHTML;
		document.getElementById('textUpdateDate').value = document.getElementById('idValDate'+ id).innerHTML
		document.getElementById('textUpdatePlan').value = document.getElementById('idValQty'+ id).innerHTML;

		selectElement('textUpdateDepartment', idDept);
		selectElement('textUpdateMcno', idMc);
	}

	function showModalDelete(id){
	  	document.getElementById("myFormDel").style.display = "block";
		document.getElementById('textDeleteHid').value = id;
		document.getElementById('textDeleteDepartment').value = document.getElementById('idValDept'+id).innerHTML;
		document.getElementById('textDeleteMcno').value = document.getElementById('idValMc'+ id).innerHTML;
		document.getElementById('textDeleteDate').value = document.getElementById('idValDate'+ id).innerHTML;
		document.getElementById('textDeletePlan').value = document.getElementById('idValQty'+ id).innerHTML;
	}
</script>
</html>