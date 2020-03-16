<div class="form">
	<div class="left">User Setting</div>
	<button class="green right" onclick='save()'>Save</button>
	<button class="red right">+ Add</button>

</div>
<div class="body-data">
	<table id="" class="display" width="50%" border="1">
	<!-- <table id="setting-user" class="display" width="50%" border="1"> -->
	<thead>
	  <tr>
	    <th width="3%" height="50px">No</th>
	    <th width="">Process</th>
	    <th width="10%">ID User</th>
	    <th width="">Name</th>
	    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
		    <th width="5%"><?php echo $level['name']; ?></th>
		<?php } ?>
	    <th width="5%">Delete</th>
	  </tr>
	</thead>
	<tbody id="idContent">
		<?php $i = 1; foreach ($data as $key) { ?>
			<tr>
		    	<td class="text-center"><?php echo $i++; ?></td>
			    <td class="text-center"><?php echo $key['dept']; ?></td>
			    <td class="text-center"><?php echo $key['nip']; ?></td>
			    <td class="text-center"><?php echo $key['name']; ?></td>
			    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
				    <td class="text-center">
				    	<?php
				    		if ($level['id']==$key['levelId']) {
				    			echo "Check";
				    		}
				    	?>
				    </td>
				<?php } ?>
			    <td class="text-center">&nbsp;</td>
			  </tr>
			<?php } ?>
	</tbody>
	</table>

</div>

<div id="modal">
	<input type="text" name="" id="textName">
	<input type="text" name="" id="textNip">
	<input type="text" name="" id="textPassword">
	<select id="textLevel">
		<option value=''>select</option>
    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
		<option value="<?php echo $level['id']; ?>"><?php echo $level['description']; ?></option>
	<?php } ?>
	</select>
	<select id="textDept">
		<option value=''>select</option>
    <?php foreach ($this->model_department->get_all() as $level) { ?>
		<option value="<?php echo $level['id']; ?>"><?php echo $level['name']; ?></option>
	<?php } ?>
	</select>
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
</script>
</html>