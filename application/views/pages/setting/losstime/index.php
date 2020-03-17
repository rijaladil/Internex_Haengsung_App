
<div class="form">
	<div class="left">Loss Time Setting</div>
	<!-- <button class="green margin-btn">Save</button> -->
</div>
<div class="body-data">
	<div class="slt">
		<table  id="setting-loss-time" class="display" border="1">
		<thead>
		  <tr>
			 <th width="5%">No</th>
			 <th width="">Loss Time item</th>
			 <th width="">Option</th>
		  </tr>
		 </thead>
		 <tbody id="idContent">
		 	<?php $i=1; foreach ($this->model_losstime_category->get_all() as $key) { ?>
				  <tr>
					 <td class="text-center"><?php echo $i++; ?></td>
					 <td id="idName<?php echo $key['id']; ?>"><?php echo $key['name']; ?></td>
					 <td class="text-center"><a href="#" onclick="edit(<?php echo $key['id']; ?>)">Option</a></td>
				  </tr>
		 	<?php } ?>
		</tbody>
		</table>
	</div>

	<div id="modalAdd">
		<input type="text" id="idName" name="">
		<input type="submit" value="Save" onclick="save()">
	</div>

	<div id="modalEdit">
		<input type="text" id="idIdEdit" name="" hidden="">
		<input type="text" id="idNameEdit" name="">
		<input type="submit" id="" value="Update" onclick="update()">
	</div>
</div>
</body>

<script type="text/javascript">
	function save(){
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
			            // console.log(msg);
		        	// if (msg == 'true') {
			            // $("#idContent").html('');
			            $("#idContent").html(msg);
			            // console.log('success');
		        	// }else{
			            // console.log('failed');
		        	// }

		        }
		    });

		}
	}

	function edit(i){
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
			            $("#idContent").html(msg);
			            // console.log('success');
		        	// }else{
			            // console.log('failed');
		        	// }

		        }
		    });

		}
	}</script>
</html>