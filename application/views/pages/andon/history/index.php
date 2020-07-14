	<style type="text/css">
		/*.ui-datepicker-calendar {
			display: none;
			font-size: 2em;
		}
		.ui-widget {
		    font-family: Arial,Helvetica,sans-serif;
		    font-size: 15px;
		}*/

		.dotGreen {
		  height: 10px;
		  width: 10px;
		  background-color: #32b92d;
		  border-radius: 50%;
		  display: inline-block;
		}

		.dotBlue {
		  height: 10px;
		  width: 10px;
		  background-color: #00b0f0;
		  border-radius: 50%;
		  display: inline-block;
		}

		.dotRed {
		  height: 10px;
		  width: 10px;
		  background-color: #f00000;
		  border-radius: 50%;
		  display: inline-block;
		}

		.dotYellow {
		  height: 10px;
		  width: 10px;
		  background-color: #cccc00;
		  border-radius: 50%;
		  display: inline-block;
		}


	</style>
<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
	<form id="normal" method="post" action="<?php echo base_url(); ?>andon/history">
		<div class="form">
			<div class="left">Andon History</div>
			<div class="right">
				<a href="#" class="btn-green" onclick="downloads()">Excel</a>
				<button class="btn-blue">Search</button>
				<input type="text" readonly="" name="text_dateEnd" id="datepicker2" value="<?php echo ($setEnd == '') ? date('Y-m-d') : $setEnd;?>" />
				<div>To</div>
				<input type="text" readonly="" name="text_dateStart" id="datepicker1" value="<?php echo ($setStart == '') ? date('Y-m-d') : $setStart;?>" />
			</div>
		</div>
	</form>

	<div class="body-data">
		<table id="" class="display textCenter normal" width="100%" border="1">
		<thead>
		  <tr>
		    <th>No</th>
		    <th>Process</th>
		    <th>No. M/C</th>
		    <th>Machine Name</th>
		    <th>Call</th>
		    <th>Arrive</th>
		    <th>Complete</th>
		    <th>Downtime</th>
		    <th>Machine Call</th>
		    <th>Quality Call</th>
		    <th>Material Time</th>
		    <th>Dies Call</th>
		  </tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($data as $key) { ?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $key['deptName']; ?></td>
					<td><?php echo $key['mcNo']; ?></td>
					<td><?php echo $key['mcName']; ?></td>
					<td><?php echo $key['call']; ?></td>
					<td><?php echo secToMinute($key['arrival']); ?></td>
					<td><?php echo secToMinute($key['completed']); ?></td>
					<td><?php echo secToMinute($key['downtime']); ?></td>
					<td><?php echo ($key['call_id'] == 1) ? '<span class="dotGreen"></span>' : ''; ?></td>
					<td><?php echo ($key['call_id'] == 4) ? '<span class="dotBlue"></span>' : ''; ?></td>
					<td><?php echo ($key['call_id'] == 2) ? '<span class="dotRed"></span>' : ''; ?></td>
					<td><?php echo ($key['call_id'] == 3) ? '<span class="dotYellow"></span>' : ''; ?></td>
				</tr>
			<?php } ?>
		</tbody>
		</table>

	</div>

	<script type="text/javascript">
		function downloads(){
			var start  = $('#datepicker1').val();
			var finish = $('#datepicker2').val();
	    	window.open("<?php echo base_url(); ?>andon/download_history/"+start+'/'+finish);
		}
	</script>

</body>
</html>

	<?php
		function secToMinute($sec) {
			return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
		}
	?>
