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

	<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
	<form id="normal" method="post" action="<?php echo base_url(); ?>">
		<div class="form">
			<div class="left">Summary Actual Status</div>
			<div class="right">
				<button class="btn-green"  onclick="downloadExcel()" form="cek" >Excel</button>
				<button class="btn-blue">Search</button>
			<!-- 	<input type="text" id="datepicker2" value="<?php echo date('Y-m');?>" />
				<div>To</div> -->
				<select class="form-control" name="text_dept">
					<option value="">All</option>
					<?php foreach ($data_dept as $key) { ?>
						<option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
					<?php } ?>
				</select>
				<input type="text" name="text_date" id="datepickersum" value="<?php echo ($text_date == '') ? date('Y-m') : $text_date;?>" autocomplete="off"/>
			</div>
		</div>
	</form>

	<div class="body-data" id="contents">
		<table id="summary" class="display" width="100%" border="1">
		<thead>
		  <tr>
		    <th rowspan="2" width="30">No</th>
		    <th rowspan="2" width="150">Process</th>
		    <th rowspan="2" width="50">No.MC</th>
		    <th rowspan="2" width="200">Machine Name</th>
		    <th colspan="5" width="400">Production Status</th>
		    <th colspan="2">Result NG</th>
		    <th colspan="3">Operation</th>
		    <th colspan="2">Andon</th>
		  </tr>
		  <tr>
		    <th>Last Month Actual</th>
		    <th>This Month Actual</th>
		    <th>Planning</th>
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
				$totActualLast	= 0;
				$totActual		= 0;
				$totBallance	= 0;
				$totNg			= 0;
				$totWorkTime	= 0;
				$totLossTime	= 0;
				$totAndonTimes	= 0;
				$totAndonTime	= 0;
				$totPlanning	= 0;
			?>
			<?php $i = 1; foreach ($data as $key) { ?>
			<?php
				$totActualLast = ($key['qtyActualLast']-$key['qtyNgLast']) + $totActualLast;
				$totActual     = ($key['qtyActual']-$key['qtyNg']) + $totActual;
				$totBallance   = (($key['qtyActual']-$key['qtyNg'])-($key['qtyActualLast']-$key['qtyNgLast']))+$totBallance;
				$totNg         = $key['qtyNg'] + $totNg;
				$totPlanning   = $key['planning'] + $totPlanning;
				$totWorkTime   = $key['workingTime'] + $totWorkTime;
				$totLossTime   = $key['lossTime'] + $totLossTime;
				$totAndonTimes = $key['andonTimes'] + $totAndonTimes;
				$totAndonTime  = $key['andonTime'] + $totAndonTime;

				$sumActual = $key['qtyActual']-$key['qtyNg'];
				$planning = $key['planning'];
				$sumActualLast = $key['qtyActualLast']-$key['qtyNgLast'];
				$sumBallance = ($key['qtyActual']-$key['qtyNg'])-($key['qtyActualLast']-$key['qtyNgLast']);
			?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $key['deptName']; ?></td>
					<td><?php echo $key['mcNo']; ?></td>
					<td><?php echo $key['mcName']; ?></td>
					<td><?php echo rupiah2dec($sumActualLast); ?></td>
					<td><?php echo rupiah2dec($sumActual); ?></td>
					<td><?php echo rupiah2dec($planning); ?></td>
					<td><?php echo rupiah2dec($sumBallance); ?></td>
					<!-- <td>
						<?php
							if ($key['qtyActualLast'] == 0) {
								echo cekData(0);
							}elseif ($key['qtyActualLast'] == 0 && $key['qtyActual'] > 0) {
								echo "100";
							}else{
								echo convertToPercentages($key['qtyActualLast'],$key['qtyActual']);
							}
						?>
					</td> -->
					<td>
						<?php
								echo ($planning == 0 ? '' : number_format((($sumActual-$key['qtyNg'])/($planning)*100),0));
						?>
					</td>
					<td><?php echo rupiah2dec($key['qtyNg']*1); ?></td>
					<td><?php echo convertToPercentages($key['qtyActual'], $key['qtyNg']) ?></td>
					<td><?php echo secToMinute($key['workingTime']); ?></td>
					<td><?php echo secToMinute($key['lossTime']); ?></td>
					<td>
						<?php
							if ($key['workingTime'] > 0) {
								echo convertToPercentages(($key['workingTime']+$key['lossTime']), $key['workingTime']);
							 }
						?>
					</td>
					<td><?php echo rupiah2dec($key['andonTimes']); ?></td>
					<td><?php echo secToMinute($key['andonTime']); ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
		  <tr class="ftot">
		    <th colspan="4" align="center">Total</th>
		    <th><?php echo rupiah2dec($totActualLast); ?></th>
		    <th><?php echo rupiah2dec($totActual); ?></th>
		    <th><?php echo rupiah2dec($totPlanning); ?></th>
		    <th><?php echo rupiah2dec($totBallance); ?></th>
		    <th><?php echo convertToPercentages($totActualLast, $totActual); ?></th>
		    <!-- <th><?php echo ($totActual/$totActualLast)*100; ?></th> -->
		    <th><?php echo rupiah2dec($totNg); ?></th>
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
		    <th><?php echo rupiah2dec($totAndonTimes); ?></th>
		    <th><?php echo secToMinute($totAndonTime); ?></th>
		  </tr>
		<tfoot>
		</table>

	</div>

	<?php

		function cekData($data) {
			if (isset($data) && $data > 0) {
				return $data;
			}else{
				return "<font style='color:#bfbfbf'></font>";
			}
		}

		function secToMinute($sec) {
			return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
		}

		function convertToPercentages($total, $val) {
			if ($val == 0 && $total == 0) {
				return '';
			}elseif ($val != 0 && $total == 0) {
				return number_format((float)100, 2, '.', '');
			}else{
				// return number_format((float)100, 2, '.', '');
				return number_format(($val/$total)*100, 2, '.', '');
			}
		}

		function rupiah2dec($total) {
			if ($total == 0) {
				return "<font style='color:#bfbfbf'>-</font>";
			}else{
				return number_format($total,0,',','.');
			}
		}

	?>

	<script type="text/javascript">
		function downloadExcel(){
			// dep= document.getElementById('department').value;
			dates= document.getElementById('datepickersum').value;
	    	window.open("<?php echo base_url(); ?>summary/summary_download/"+dates);
	    	// window.open("<?php echo base_url(); ?>summary/summary_download/"+dep+"/"+dates);
	    }
	</script>
</body>
</html>