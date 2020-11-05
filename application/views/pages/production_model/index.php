<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Production Model</div>
	<label><div class="all" id="all">
		<input type="checkbox" name="all" value="all" checked="" id="idCheckAll" onclick="checkViewAll()">All
	</div></label>
	<label><div class="complete" id="c">
		<input type="checkbox" name="complete" value="complete" checked="" id="idCheckCompleted" onclick="checkViewCompleted()">Complete
	</div></label>
	<label><div class="progress" id="p">
		<input type="checkbox" name="progress" value="progress" checked="" id="idCheckProcess" onclick="checkViewProcess()">Progress
	</div></label>
	<label><div class="waitting" id="w">
		<input type="checkbox" name="waitting" value="waitting" checked="" id="idCheckWaiting" onclick="checkViewWaiting()">Waiting
	</div></label>
	<label><div class="details">
		<input type="checkbox" name="details" value="details" checked="" onclick="checkDetail()">Details
	</div></label>
	<div class="right">
		<form id="normal" method="post" action="<?php echo base_url(); ?>department/production_model/<?php echo $dept; ?>">
			<!-- <a href="#" class="btn-green">Excel</a> -->
			<button class="btn-green" onclick="downloadExcel_xxx()" form="cek">Excel</button>
			<!-- <button class="btn-green2" onclick="saveMc()" form="cek">Save</button> -->
			<button class="btn-blue" type="submit" form="normal">Search</button>
			<input type="text" readonly="" name="text_dateEnd" id="datepicker2" value="<?php echo ($setEnd == '') ? date('Y-m-d') : $setEnd;?>" />
			<div>To</div>
			<input type="text" readonly="" name="text_dateStart" id="datepicker1" value="<?php echo ($setStart == '') ? date('Y-m-d') : $setStart;?>" />
		</form>
	</div>
</div>
<div class="body-data blue1">
	<form id="formSetMachine" method="post" action="<?php echo base_url(); ?>department/production_model/<?php echo $dept; ?>">
		<input type="hidden" name="text_dateStart" id="idStart" />
		<input type="hidden" name="text_dateEnd" id="idEnd" />
		<table id="actual-production" class="display" width="100%" border="1">
		<thead>
		  <tr>
		    <th rowspan="2" width="5%">No</th>
		    <th rowspan="2" width="5%">Line </th>
		    <th rowspan="2" width="15%">Part No</th>
		    <th rowspan="2" width="10%">Start Date</th>
		    <th rowspan="2" width="10%">End Date</th>
		    <th colspan="6" width="50%" style="border-bottom: 1px solid white">Production</th>
		    <th rowspan="2" width="5%">Ranking</th>
		  </tr>
		  <tr>
		    <th>Plan Qty</th>
		    <th>Tabe Qty</th>
		    <th>Input Qty</th>
		    <th>Output Qty</th>
		    <th>+/-</th>
		    <th>%</th>
		  </tr>
		</thead>
<!-- 		<tbody>
			<?php $i = 1; foreach ($data as $key) { ?>
				<tr id="dataRow<?php echo $key['idQty']; ?>" onclick="selectRow(<?php echo $key['idQty']; ?>)" class="<?php echo ($key['status_close'] == 0) ? 'waiting' : (($key['status_close'] == 1) ? 'process' : 'completed') ; ?>">
					<td class="text-center"><?php echo $i++; ?></td>
					<td class="text-center">
						<?php if ($key['status_close'] != 1 && ($key['actual']*$key['counter']) <= $key['planQty']  ) { ?>
							<input type="hidden" name="text_idQty[]" value="<?php echo $key['idQty']; ?>">
							<select name="text_mc[]" onchange="setMachine(this, <?php echo $key['idQty']; ?>)">
								<?php if ($key['status_close'] == 0 ) { ?>
							    	<option>-</option>
								<?php } ?>
								<?php foreach ($data_machine as $mc) { ?>
							    	<option value="<?php echo $mc['id']; ?>" <?php echo ($mc['id'] == $key['mc_id']) ? 'selected' : ''; ?>><?php echo $mc['mc_no']; ?></option>
								<?php } ?>
							</select>
						<?php }else{ ?>
							<?php echo $key['mcNo']; ?>
						<?php } ?>
					</td>
					<td><?php echo $key['mcName']; ?></td>
					<td class="text-center"><?php echo $key['date']; ?></td>
					<td><?php echo $key['production_part_no']; ?></td>
					<td><?php echo $key['model']; ?></td>
					<td><?php echo $key['description']; ?></td>
					<td class="text-right"><?php echo rupiah2dec($key['capaHour']*1); ?></td>
					<td class="text-right"><?php echo rupiah0dec($key['planQty']); ?></td>
					<td class="text-right" id="idQtyTot<?php echo $key['idQty']; ?>"><?php echo rupiah0dec(($key['actual']*$key['counter'])-$key['ng']); ?></td>
					<td class="text-right"><?php echo rupiah0dec((($key['actual']*$key['counter'])-$key['ng'])-$key['planQty']); ?></td>
					<td class="text-right"><?php echo rupiah2dec(((($key['actual']*$key['counter'])-$key['ng'])/$key['planQty'])*100); ?></td>
					<td class="text-right"><?php echo ($key['ng'] == '') ? rupiah0dec(0) : rupiah0dec($key['ng']); ?></td>
					<td class="text-center"><?php echo $key['start']; ?></td>
					<td class="text-center"><?php echo ($key['finish'] == '00/00/00 00:00') ? '-' : $key['finish']; ?></td>
					<td class="text-center"><?php echo ($key['working_time'] == 0) ? '' : sprintf("%02d",floor($key['working_time'] / 3600)) . ':' . sprintf("%02d",floor($key['working_time'] / 60 % 60)) . ':' . sprintf("%02d",floor($key['working_time'] % 60)); ?></td>
					<td class="text-center"><?php echo ($key['losstime'] == 0) ? '' : sprintf("%02d",floor($key['losstime'] / 3600)) . ':' . sprintf("%02d",floor($key['losstime'] / 60 % 60)) . ':' . sprintf("%02d",floor($key['losstime'] % 60)); ?></td>
					<td class="text-center">
						<?php
							if ($key['status_close'] == 1 && $key['working_time'] > 0 || $key['status_close'] == 2 && $key['working_time'] > 0) {
								echo number_format((float)(($key['working_time']/($key['working_time']+$key['losstime']))*100), 2, '.', '');
							 }
						?>
					</td>

					<td class="text-center">
						<select  <?php echo ($key['status_close'] == 1 || $key['status_close'] == 2 ? 'disabled' : ''); ?> style="-webkit-appearance: none;" onchange="changeCounter(this, <?php echo $key['idQty']; ?>)">
							<option <?php echo ( $key['counter'] == 1 ? 'selected' : ''); ?>>1</option>
							<option <?php echo ( $key['counter'] == 2 ? 'selected' : ''); ?>>2</option>
							<option <?php echo ( $key['counter'] == 3 ? 'selected' : ''); ?>>3</option>
							<option <?php echo ( $key['counter'] == 4 ? 'selected' : ''); ?>>4</option>
							<option <?php echo ( $key['counter'] == 5 ? 'selected' : ''); ?>>5</option>
							<option <?php echo ( $key['counter'] == 6 ? 'selected' : ''); ?>>6</option>
							<option <?php echo ( $key['counter'] == 7 ? 'selected' : ''); ?>>7</option>
							<option <?php echo ( $key['counter'] == 8 ? 'selected' : ''); ?>>8</option>
						</select>
					</td>

					<td class="text-center">
						<select <?php echo ($key['status_close'] == 1 || $key['status_close'] == 2 ? 'disabled' : ''); ?> style="-webkit-appearance: none;" <?php echo ($key['status_close'] == 1 || $key['status_close'] == 2 ? 'disabled' : ''); ?> name="text_operator[]" onchange="setOperator(this, <?php echo $key['idQty']; ?>)">
							<?php if ($key['operator_id'] == NULL ) { ?>
						    	<option hidden>-</option>
							<?php } ?>
							<?php foreach ($data_operator as $opr) { ?>
						    	<option hidden  <?php echo ( $key['operator_id'] == $opr['nip'] ? 'selected' : ''); ?> value="<?php echo $opr['nip']; ?>"><?php echo $opr['shift']; ?></option>
							<?php } ?>
						</select>
					</td>


					<td class="text-center">
						<select <?php echo ($key['status_close'] == 1 || $key['status_close'] == 2 ? 'disabled' : ''); ?> name="text_operator[]" onchange="setOperator(this, <?php echo $key['idQty']; ?>)">
							<?php if ($key['operator_id'] == NULL ) { ?>
						    	<option>-</option>
							<?php } ?>
							<?php foreach ($data_operator as $opr) { ?>
						    	<option <?php echo ( $key['operator_id'] == $opr['nip'] ? 'selected' : ''); ?> value="<?php echo $opr['nip']; ?>"><?php echo $opr['name']; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<?php } ?>

		</tbody> -->
		</table>

	</form>
</div>



<?php
	function rupiah2dec($total) {
		if ($total == 0) {
			return "<font style='color:#bfbfbf'>0</font>";
		}else{
			return number_format($total,2,',','.');
		}
	}

	function rupiah0dec($total) {
		if ($total == 0) {
			return "<font style='color:#bfbfbf'>0</font>";
		}else{
			return number_format($total,0,',','.');
		}
	}
?>

<script type="text/javascript">

	$(document).ready(function() {
	    $('#actual-production').DataTable({
	    	"scrollY"		: "230px",
	        "scrollCollapse": true,
	        "searching"		: false,
	        "paging"		: false,
	        "info"			: false
	    });

	} );

	function setMachine(machine_id, id_qty){
		var mesin = machine_id.value;
		var id = id_qty;
		$.ajax({
			url: "<?php echo base_url();?>department/setMcOnSpk/",
			cache: false,
			type: 'POST',
			data: {
				'mesin': mesin,
				'id': id,
			},
			success: function(msg){
				if (msg == 1) {
					window.alert("Success, set to machine "+machine_id.options[machine_id.selectedIndex].text);
					location.reload();
				}else{
					window.alert("Failed");
				}
			}
		});
	}

	function setOperator(operator_id, id_qty){
		var operator = operator_id.value;
		var id = id_qty;
		$.ajax({
			url: "<?php echo base_url();?>department/setOperator/",
			cache: false,
			type: 'POST',
			data: {
				'operator': operator,
				'id': id,
			},
			success: function(msg){
				if (msg == 1) {
					window.alert("Success");
					location.reload();
				}else{
					window.alert("Failed");
				}
			}
		});
	}

	function changeCounter(form, id_qty){
		var counter = form.value;
		var id = id_qty;
		$.ajax({
			url: "<?php echo base_url();?>department/changeCounter/",
			cache: false,
			type: 'POST',
			data: {
				'counter': counter,
				'id': id,
			},
			success: function(msg){
				if (msg == 1) {
					window.alert("Success");
					location.reload();
				}else{
					window.alert("Failed");
				}
			}
		});
	}

	function selectRow(id) {

        $('.bg-selected').removeClass('bg-selected');
        $('#dataRow'+id).addClass('bg-selected');
        isi = document.getElementById("idQtyTot"+id).innerHTML;
        isinya = isi.toString();
		document.getElementById("idValTot1").innerHTML = isinya;

	    $.ajax({
	        url: "<?php echo base_url(); ?>json/getNgByIdQty/"+id,
	        dataType: 'json',
	        type: 'post',
	        cache:false,
	        success: function(data){
        		ng = document.getElementsByClassName('idNg');
        		for (var i = 0; i < ng.length; i++) {
        			document.getElementsByClassName('idNg')[i].innerHTML = '';
        		}

	        	if (data.length > 0) {
	        		for (var i = 0; i < data.length; i++) {
	        			document.getElementById("idNg1"+data[i]['machine_problem_id']).innerHTML = data[i]['qty_ng'];
	        		}
	        	}else{
	        	}
	        }
	    });

	    $.ajax({
	        url: "<?php echo base_url(); ?>json/getLossByIdQty/"+id,
	        dataType: 'json',
	        type: 'post',
	        cache:false,
	        success: function(data){
        		ng = document.getElementsByClassName('idLoss');
    			document.getElementById("idLoss1Tot").innerHTML = '';
        		for (var i = 0; i < ng.length; i++) {
        			document.getElementsByClassName('idLoss')[i].innerHTML = '';
        		}

	        	if (data.length > 0) {
	        		totLoss = 0;
	        		for (var i = 0; i < data.length; i++) {
	        			totLoss = parseInt(data[i]['losstime']) + totLoss;
	        			document.getElementById("idLoss1"+data[i]['losstime_cat_id']).innerHTML = convertSecondstoTime(data[i]['losstime']);
	        			var hasilLossTot = (totLoss);
						if (isNaN(hasilLossTot)) hasilLossTot = 0;
	        			document.getElementById("idLoss1Tot").innerHTML = convertSecondstoTime(hasilLossTot);
	        			// document.getElementById("idLoss1Tot").innerHTML = convertSecondstoTime(totLoss);
	        		}
	        	}else{
	        	}
	        }
	    });
	}

    function convertSecondstoTime(given_seconds) {

        dateObj = new Date(given_seconds * 1000);
        hours = dateObj.getUTCHours();
        minutes = dateObj.getUTCMinutes();
        seconds = dateObj.getSeconds();

        timeString = hours.toString().padStart(2, '0')
            + ':' + minutes.toString().padStart(2, '0')
            + ':' + seconds.toString().padStart(2, '0');

        return timeString;
    }

    function checkViewAll() {
		var checkViewAll = document.getElementById("idCheckAll");
		if (checkViewAll.checked == true){
			document.getElementById("idCheckCompleted").checked = true;
			document.getElementById("idCheckProcess").checked = true;
			document.getElementById("idCheckWaiting").checked = true;
			checkViewCompleted();
			checkViewProcess();
			checkViewWaiting();
		}else{
			document.getElementById("idCheckCompleted").checked = false;
			document.getElementById("idCheckProcess").checked = false;
			document.getElementById("idCheckWaiting").checked = false;
			checkViewCompleted();
			checkViewProcess();
			checkViewWaiting();
		}
    }

    function checkViewCompleted() {
		var checkViewCompleted = document.getElementById("idCheckCompleted");
		dataCompleted = document.getElementsByClassName("completed");
		if (checkViewCompleted.checked == true){
			for (var i = 0; i < dataCompleted.length; i++) {
				document.getElementsByClassName("completed")[i].style.visibility = "visible";
			}
		}else{
			document.getElementById("idCheckAll").checked = false;
			for (var i = 0; i < dataCompleted.length; i++) {
				document.getElementsByClassName("completed")[i].style.visibility = "collapse";
			}
		}
    }

    function checkViewProcess() {
		var checkViewProcess = document.getElementById("idCheckProcess");
		dataProcess = document.getElementsByClassName("process");
		if (checkViewProcess.checked == true){
			for (var i = 0; i < dataProcess.length; i++) {
				document.getElementsByClassName("process")[i].style.visibility = "visible";
			}
		}else{
			document.getElementById("idCheckAll").checked = false;
			for (var i = 0; i < dataProcess.length; i++) {
				document.getElementsByClassName("process")[i].style.visibility = "collapse";
			}
		}
    }

    function checkViewWaiting() {
		var checkViewWaiting = document.getElementById("idCheckWaiting");
		dataWaiting = document.getElementsByClassName("waiting");
		if (checkViewWaiting.checked == true){
			for (var i = 0; i < dataWaiting.length; i++) {
				document.getElementsByClassName("waiting")[i].style.visibility = "visible";
			}
		}else{
			document.getElementById("idCheckAll").checked = false;
			for (var i = 0; i < dataWaiting.length; i++) {
				document.getElementsByClassName("waiting")[i].style.visibility = "collapse";
			}
		}
    }


    function saveMc() {
    	document.getElementById("idStart").value = document.getElementById("datepicker1").value;
    	document.getElementById("idEnd").value = document.getElementById("datepicker2").value;
    	document.getElementById("formSetMachine").submit();
    	//
    }

    function checkDetail() {
       // document.getElementById("divDetail").style.display = "none";
		var x = document.getElementById("divDetail");
		if (x.style.display === "none") {
			x.style.display = "block";

			// $("#myTable").DataTable({scrollY: 100});
			$("#actual-production").DataTable({retrieve: true}).destroy();
			$("#actual-production").DataTable({
		    	"scrollY"		: "230px",
		        "scrollCollapse": true,
		        "searching"		: false,
		        "paging"		: false,
		        "info"			: false
			});

		} else {
			x.style.display = "none";
			$("#actual-production").DataTable({retrieve: true}).destroy();
			$("#actual-production").DataTable({
		    	"scrollY"		: "65vh",
		        "scrollCollapse": true,
		        "searching"		: false,
		        "paging"		: false,
		        "info"			: false
			});
		}

    }

    function downloadExcel(){
		dep   = <?php echo $dept; ?>;
		start = document.getElementById('datepicker1').value;
		end   = document.getElementById('datepicker2').value;
    	window.open("<?php echo base_url(); ?>department/actual_download/"+dep+'/'+start+'/'+end);
    }



</script>

</body>
</html>