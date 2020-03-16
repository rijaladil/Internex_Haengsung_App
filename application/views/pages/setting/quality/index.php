<div class="form">
	<div class="left">Quality Setting</div>
	<button class="green right">Add</button>
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
				    <th width="85%">Problem item</th>
				  </tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach ($this->model_machine_problem->get_all_by_dept_id($key['id']) as $key2) { ?>
					  <tr>
					    <td class='text-center'><?php echo $i++; ?></td>
					    <td><?php echo $key2['name']; ?></td>
					  </tr>
					<?php } ?>
				</tbody>
				<tfooter>
					  <tr>
					    <td class='text-center'></td>
					    <td><a onclick="showModalAdd(<?php echo $key['id']; ?>)" class="btn" href="#">Add Problem</a></td>
					  </tr>
				</tfooter>
			</table>
		</div>
	<?php } ?>

</div>
<div id="modalAdd">
	<input type="text" id="idName" name="">
	<input type="text" id="idDept" name="">
	<a href="#" onclick="save()">Save</a>
</div>
</body>
	<script type="text/javascript">
		function showModalAdd(id){
			document.getElementById('idDept').value = id;
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
	</script>
</html>