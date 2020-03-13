	<style type="text/css">
		.ui-datepicker-calendar {
			display: none;
			font-size: 2em;
		}
		.ui-widget {
		    font-family: Arial,Helvetica,sans-serif;
		    font-size: 15px;
		}
	</style>

	<form id="normal" method="post" action="<?php echo base_url(); ?>">
		<div class="form">
			<div class="left">Summary Actual Status</div>
			<div class="right">
				<button class="btn-green">Excel</button>
				<button class="btn-blue">Search</button>
			<!-- 	<input type="text" id="datepicker2" value="<?php echo date('Y-m');?>" />
				<div>To</div> -->
				<input type="text" name="text_date" id="datepickersum" value="<?php echo ($text_date == '') ? date('Y-m') : $text_date;?>" />
			</div>
		</div>
	</form>

	<div class="body-data">
		<table id="summary" class="display" width="100%" border="1">
		<thead>
		  <tr>
		    <th rowspan="2" width="30">No</th>
		    <th rowspan="2" width="150">Process</th>
		    <th rowspan="2" width="50">No.MC</th>
		    <th rowspan="2" width="200">Machine Name</th>
		    <th colspan="4" width="400">Production Status</th>
		    <th colspan="2">Result NG</th>
		    <th colspan="3">Operation</th>
		    <th colspan="2">Andon</th>
		  </tr>
		  <tr>
		    <th>Last Month Actual</th>
		    <th>This Month Actual</th>
		    <th>Balance Qty</th>
		    <th>%</th>
		    <th>NG Qty</th>
		    <th>NG %</th>
		    <th>Work Time</th>
		    <th>Loss Time </th>
		    <th>Operation %</th>
		    <th>Call</th>
		    <th>Downtime</th>
		  </tr>
		</thead>
		<tbody>
			<?php
				$totActual		= 0;
				$totNg			= 0;
				$totWorkTime	= 0;
				$totLossTime	= 0;
				$totAndonTimes	= 0;
				$totAndonTime	= 0;
			?>
			<?php $i = 1; foreach ($data as $key) { ?>
			<?php
				$totActual		= ($key['qtyActual']-$key['qtyNg']) + $totActual;
				$totNg			= $key['qtyNg'] + $totNg;
				$totWorkTime	= $key['workingTime'] + $totWorkTime;
				$totLossTime	= $key['lossTime'] + $totLossTime;
				$totAndonTimes	= $key['andonTimes'] + $totAndonTimes;
				$totAndonTime	= $key['andonTime'] + $totAndonTime;
			?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $key['nameDept']; ?></td>
					<td><?php echo $key['nameMc']; ?></td>
					<td><?php echo $key['nameMachine']; ?></td>
					<td><?php echo $key['qtyActualLast']*1; ?></td>
					<td><?php echo $key['qtyActual']-$key['qtyNg']; ?></td>
					<td><?php echo ($key['qtyActual']-$key['qtyNg'])-$key['qtyActualLast']; ?></td>
					<td>
						<?php
							if($key['qtyActualLast'] == 0 && $key['qtyActual'] == 0){
								echo "";
							}elseif ($key['qtyActualLast'] == 0 && $key['qtyActual'] > 0) {
								echo "100";
							}else{
								echo ($key['qtyActual']/$key['qtyActualLast'])*100;
							}
						?>
					</td>
					<td><?php echo $key['qtyNg']; ?></td>
					<td><?php echo convertToPercentages($key['qtyActual'], $key['qtyNg']) ?></td>
					<td><?php echo secToMinute($key['workingTime']); ?></td>
					<td><?php echo secToMinute($key['lossTime']); ?></td>
					<td>
						<?php
							if ($key['workingTime'] > 0) {
								echo number_format((float)(($key['workingTime']/($key['workingTime']+$key['lossTime']))*100), 2, '.', '');
							 }
						?>
					</td>
					<td><?php echo ($key['andonTimes']); ?></td>
					<td><?php echo secToMinute($key['andonTime']); ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
		  <tr class="ftot">
		    <th colspan="4" align="center">Total</th>
		    <th></th>
		    <th><?php echo $totActual; ?></th>
		    <th></th>
		    <th></th>
		    <th><?php echo $totNg; ?></th>
		    <th>
				<?php echo convertToPercentages($totActual, $totNg) ?>
		    </th>
		    <th><?php echo secToMinute($totWorkTime); ?></th>
		    <th><?php echo secToMinute($totLossTime); ?></th>
		    <th>
				<?php
					if ($totWorkTime > 0) {
						echo number_format((float)(($totWorkTime/($totWorkTime+$totLossTime))*100), 2, '.', '');
					 }
				?>
		    </th>
		    <th><?php echo $totAndonTimes; ?></th>
		    <th><?php echo secToMinute($totAndonTime); ?></th>
		  </tr>
		<tfoot>
		</table>

	</div>

	<?php
		function secToMinute($sec) {
			return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
		}

		function convertToPercentages($total, $val) {
			if ($val == 0 && $total == 0) {
				return '';
			}elseif ($val != 0 && $total == 0) {
				return number_format((float)100, 2, '.', '');;
			}else{
				return number_format((float)($val/$total)*100, 2, '.', '');;
			}
		}
	?>
</body>
</html>