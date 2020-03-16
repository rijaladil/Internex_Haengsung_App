<div class="form">
	<div class="left">User Setting</div>
	<button class="green right">Save</button>
	<button class="red right">+ Add</button>

</div>
<div class="body-data">
	<table id="setting-user" class="display" width="50%" border="1">
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
	<tbody>
		<?php $i = 1; foreach ($data as $key) { ?>
			<tr>
		    	<td><?php echo $i++; ?></td>
			    <td><?php echo $key['dept']; ?></td>
			    <td><?php echo $key['nip']; ?></td>
			    <td><?php echo $key['name']; ?></td>
			    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
				    <td>
				    	<?php
				    		if ($level['id']==$key['levelId']) {
				    			echo "Check";
				    		}
				    	?>
				    </td>
				<?php } ?>
			    <td>&nbsp;</td>
			  </tr>
			<?php } ?>
	</tbody>
	</table>

</div>

<div id="modal">
	<input type="text" name="" id="textName">
	<input type="text" name="" id="textNip">
	<select name="textLevel">
			<option value=''>select</option>
	    <?php foreach ($this->model_user_level->get_all() as $level) { ?>
			<option <?php echo $level['id']; ?>><?php echo $level['description']; ?></option>
		<?php } ?>
	</select>
</div>

</body>
</html>