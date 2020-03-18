<script>
	function closeModalAdd() {
	  document.getElementById("myForm").style.display = "none";
	}

	function closeModalEdit() {
	  document.getElementById("myForm1").style.display = "none";
	}
</script>

<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Loss Time Setting</div>

	<button class="red right"  onclick="showModalAdd()">+ Add </button>
	<!-- <button class="green margin-btn">Save</button> -->
</div>
<div class="body-data">
	<div class="slt">
		<table  id="setting-loss-time" class="display" border="1">
			<thead>
			  <tr>
				 <th width="5%">No</th>
				 <th width="">Loss Time item</th>
				 <th width="10%">Option</th>
			  </tr>
			 </thead>
			 <tbody id="idContent">
			 	<?php $i=1; foreach ($this->model_losstime_category->get_all() as $key) { ?>
					  <tr>
						 <td class="text-center"><?php echo $i++; ?></td>
						 <td id="idName<?php echo $key['id']; ?>"><?php echo $key['name']; ?></td>
						 <td class="text-center"><a class="click-btn"  href="#" onclick="edit(<?php echo $key['id']; ?>)">Update</a></td>
					  </tr>
			 	<?php } ?>
			</tbody>
		</table>

	</div>
</div>
<!-- +ADD -->
<div class="form-popup" id="myForm">
	<div id="modalAdd"  class="form-container">
		<div class="title">+Add</div>
		<br>
		Name : <input type="text" id="idName" name="">
		<button class="btn" value="Save" onclick="save()">SAVE</button>
		<button class="cancel" onclick='closeModalAdd()'>CLOSE</button>
	</div>
</div>
<!-- UPDATE -->
<div class="form-popup" id="myForm1">
	<div id="modalEdit" class="form-container">
		<div class="title">Update</div>
		<br>
		<input type="text" id="idIdEdit" name="" hidden="">
		Name : <input type="text" id="idNameEdit" name="">
		<button class="btn" type="submit" id="" value="Update" onclick="update()">UPDATE</button>
		<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
	</div>
</div>
</body>

<script type="text/javascript">
	function showModalAdd(id){
			document.getElementById("myForm").style.display = "block";
			document.getElementById('idDept').value = id;
	}

	function save(){
		document.getElementById("myForm").style.display = "none";
		var name = document.getElementById('idName').value;
		if (name == '') {
			console.log('kosong');
		}else{
		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/losstime_add/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'text_name': name
		        },
		        cache: false,
		        success: function(msg){
			        	location.reload();
			            // console.log(msg);
		        	// if (msg == 'true') {
			            // $("#idContent").html('');
			            // $("#idContent").html(msg);
			            // console.log('success');
		        	// }else{
			            // console.log('failed');
		        	// }

		        }
		    });

		}
	}

	function edit(i){
		document.getElementById("myForm1").style.display = "block";
		document.getElementById('idIdEdit').value = i;
		document.getElementById('idNameEdit').value = document.getElementById('idName'+i).innerHTML;
	}

	function update(){
		var id = document.getElementById('idIdEdit').value;
		var name = document.getElementById('idNameEdit').value;
		if (name == '') {
		}else{
		    $.ajax({
		        url: "<?php echo base_url(); ?>setting/losstime_update/",
		        // dataType: 'json',
		        type: 'POST',
		        data: {
		            'text_name': name,
		            'text_id': id
		        },
		        cache: false,
		        success: function(msg){
		        	location.reload();
			            // console.log(msg);
		        	// if (msg == 'true') {
			            // $("#idContent").html('');
			            // $("#idContent").html(msg);
			            // console.log('success');
		        	// }else{
			            // console.log('failed');
		        	// }

		        }
		    });

		}
	}</script>
</html>