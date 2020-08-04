<script>
	function closeModalAdd() {
	  document.getElementById("myForm").style.display = "none";
	}

	function closeModalEdit() {
	  document.getElementById("myForm1").style.display = "none";
	}

	function closeModalDelete() {
	  document.getElementById("myFormDelete").style.display = "none";
	}
</script>
<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Quality Setting</div>
	<!-- <button class="green right">Add</button> -->
</div>
<div class="body-data">

	<?php $x = 1; foreach ($this->model_department->get_all() as $key) { ?>
		<div class="qs1">
			<table  width="100%" border="1" class="tblth">
				<tr>
					<td><?php echo $key['name']; ?></td>
				</tr>
			</table>
			<table id="setting-quality<?php echo $x++; ?>" class="display"  width="100%" border="1">
				<thead>
				  <tr>
				    <th width="15%">No</th>
				    <th width="50%">Problem item</th>
				    <th width="%">Option</th>
				  </tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($this->model_machine_problem->get_all_by_dept_id($key['id']) as $key2) { ?>
					  <tr>
					    <td class='text-center'><?php echo $i++; ?></td>
					    <td id="idValName<?php echo $key2['id']; ?>"><?php echo $key2['name']; ?></td>
					    <td class='text-center'>
					    	<a href="#" class="click-btn-u" onclick="showModalEdit(<?php echo $key2['id']; ?>, '<?php echo $key['name']; ?>');">Update</a>
					    	<a href="#" class="click-btn-d" onclick="showModalDelete(<?php echo $key2['id']; ?>, '<?php echo $key['name']; ?>');">Delete</a>
					    </td>
					  </tr>
					<?php } ?>
				</tbody>
				<table>
					  <tr <?php echo ( $i > 16 ? 'hidden=""' : ''); ?>>
					  	<td colspan="3" style="border-top:1px solid black; text-align: center; background: white;">
					  		<a onclick="showModalAdd(<?php echo $key['id']; ?>, '<?php echo $key['name']; ?>')" class="add-btn" href="#">
					  			+Add <?php echo $i; ?>
					  		</a>
					  	</td>
					  </tr>
				</table>
			</table>
		</div>
	<?php } ?>

</div>

<!-- +ADD -->
<div class="form-popup" id="myForm">
	<div id="modalAdd" class="form-container">
		<div class="title">+Add Quality <font id="idTitleAdd"></font></div>
		<br>
		Problem item : 	<input type="text" id="idName" name="">
		<input type="text" id="idDept" name="" hidden="">
		<button class="btn" onclick="save()">SAVE</button>
		<button class="cancel" onclick='closeModalAdd()'>CLOSE</button>
	</div>
</div>

<!-- UPDATE -->
<div class="form-popup" id="myForm1">
	<div id="modalUpdate" class="form-container">
		<div class="title">Update Quality <font id="idTitleEdit"></font></div>
		<br>
		Problem item : <input type="text" id="idUpdateName" name="">
		<input type="text" id="id_update" name="" hidden="">
		<button class="btn"  href="#" onclick="update()">UPDATE</button>
		<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
	</div>
</div>

<!-- DELETE -->
<div class="form-popup" id="myFormDelete">
	<div id="modalDelete" class="form-container">
		<div class="title">Delete Quality <font id="idTitleEdit"></font></div>
		<br>
		Problem item : <input type="text" id="idDeleteName" name="">
		<input type="text" id="id_delete" name="" hidden="" readonly>
		<button class="cancel"  href="#" onclick="deleteItem()">DELETE</button>
		<button class="cancel-del" onclick='closeModalDelete()'>CLOSE</button>
	</div>
</div>

</body>


	<script type="text/javascript">
		function showModalAdd(id, name){
			document.getElementById("myForm").style.display = "block";
			document.getElementById('idDept').value = id;
			document.getElementById('idTitleAdd').innerHTML = name;
		}

		function save(){
			var name = $('#idName').val();
			var dept = $('#idDept').val();
			if (name == '' || dept == '') {
				console.log('kosong');
			}else{
			    $.ajax({
			        url: "<?php echo base_url(); ?>setting/quality_add/",
			        // dataType: 'json',
			        type: 'POST',
			        data: {
			            'text_name': name,
			            'text_dept': dept,
			        },
			        cache: false,
			        success: function(msg){
			        	location.reload();
			        }
			    });

			}
		}

		function showModalEdit(id, name){
			document.getElementById("myForm1").style.display = "block";
			document.getElementById('id_update').value = id;
			document.getElementById('idUpdateName').value = document.getElementById('idValName'+id).innerHTML;
			document.getElementById('idTitleEdit').innerHTML = name;
		}

		function update(id){
			var id = document.getElementById('id_update').value;
			var name = document.getElementById('idUpdateName').value;
			if (name == '' || id == '') {
				console.log('kosong');
			}else{
				// console.log(name + ' -- ' +nip);

			    $.ajax({
			        url: "<?php echo base_url(); ?>setting/quality_update/",
			        // dataType: 'json',
			        type: 'POST',
			        data: {
			            'text_name': name,
			            'text_id': id,
			            // 'text_level': level,
			            // 'text_dept': dept,
			            // 'text_pass': pass,
			        },
			        cache: false,
			        success: function(msg){
			        	location.reload();
			        }
			    });

			}
		}


		function showModalDelete(id, name){
			document.getElementById("myFormDelete").style.display = "block";
			document.getElementById('id_delete').value = id;
			document.getElementById('idDeleteName').value = document.getElementById('idValName'+id).innerHTML;
			document.getElementById('idTitleDelete').innerHTML = name;
		}

		function deleteItem(id){
			var id = document.getElementById('id_delete').value;
			var name = document.getElementById('idDeleteName').value;
			if (name == '' || id == '') {
				console.log('kosong');
			}else{
				// console.log(name + ' -- ' +nip);

			    $.ajax({
			        url: "<?php echo base_url(); ?>setting/quality_delete/",
			        // dataType: 'json',
			        type: 'POST',
			        data: {
			            'text_name': name,
			            'text_id': id,
			            // 'text_level': level,
			            // 'text_dept': dept,
			            // 'text_pass': pass,
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