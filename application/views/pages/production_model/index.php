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
			<button class="btn-green" onclick="downloadExcel()" form="cek">Excel</button>
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
		<table id="actual-production1" class="display" width="100%" border="1">
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
 		<tbody>
			<?php $i = 1; foreach ($dataA as $key) { ?>
				<tr  id="dataRow<?php echo $key['qid']; ?>" onclick="selectRow(<?php echo $key['qid']; ?>)" class="<?php echo ($key['start_date'] == 0) ? 'waiting' : (($key['end_date'] == 0) ? 'process' : 'completed') ; ?>">
					<td class="text-center"><?php echo $i++; ?></td>
					<td class="text-center"><?php echo $key['line']; ?></td>
					<td class="text-center"><?php echo $key['part_no']; ?></td>
					<td class="text-center"><?php echo $key['start_date']; ?></td>
					<td class="text-center"><?php echo $key['end_date']; ?></td>
					<td class="text-center"><?php echo $key['plan_qty']; ?></td>
					<td class="text-center"><?php echo $key['table_qty']; ?></td>
					<td class="text-center"><?php echo $key['input_qty']; ?></td>
					<td class="text-center"><?php echo $key['output_qty']; ?></td>
					<td class="text-center"><?php echo $key['result']; ?></td>
					<td class="text-center"><?php echo number_format($key['persen'],2,",","."); ?></td>
					<td class="text-center">
						<input type="number" class="form-control pm-input" value="<?php echo $key['rank']; ?>" onchange="updateRank(this, <?php echo $key['qid']; ?>)">
					</td>
				</tr>
				<?php } ?>

		</tbody>
		<table width="100%">
			<?php $i = 1; foreach ($dataAtot as $key) { ?>
				<tr style="background: #0070c0; font-weight: bold; color: white; text-align: center;">
					<td class="text-center" width="5%"></td>
					<td class="text-center" width="5%">TOTAL</td>
					<td class="text-center" width="15%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_plan_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_table_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_input_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_output_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_result']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_persen'],2,",","."); ?></td>
					<td class="text-center"></td>
				</tr>
				<?php } ?>
		</table>

		</table>

		<!-- B -->
		<div style="margin:2em;"></div>
		<table id="actual-production2" class="display" width="100%" border="1">

		<thead hidden>
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
		  <!-- <tr>
		    <td colspan="12">&nbsp</td>
		  </tr>
 -->
 		<tbody>
			<?php $i = 1; foreach ($dataB as $key) { ?>
				<tr  id="dataRow<?php echo $key['qid']; ?>" onclick="selectRow(<?php echo $key['qid']; ?>)" class="<?php echo ($key['start_date'] == 0) ? 'waiting' : (($key['end_date'] == 0) ? 'process' : 'completed') ; ?>">
					<td class="text-center" width="5%"><?php echo $i++; ?></td>
					<td class="text-center" width="5%"><?php echo $key['line']; ?></td>
					<td class="text-center" width="15%"><?php echo $key['part_no']; ?></td>
					<td class="text-center" width="10%"><?php echo $key['start_date']; ?></td>
					<td class="text-center" width="10%"><?php echo $key['end_date']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['plan_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['table_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['input_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['output_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['result']; ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['persen'],2,",","."); ?></td>
					<td class="text-center">
						<input type="number" class="form-control pm-input" value="<?php echo $key['rank']; ?>" onchange="updateRank(this, <?php echo $key['qid']; ?>)">
					</td>
				</tr>
				<?php } ?>

		</tbody>
		<table width="100%">
			<?php $i = 1; foreach ($dataBtot as $key) { ?>
				<tr style="background: #0070c0; font-weight: bold; color: white; text-align: center;">
					<td class="text-center" width="5%"></td>
					<td class="text-center" width="5%">TOTAL</td>
					<td class="text-center" width="15%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_plan_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_table_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_input_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_output_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_result']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_persen'],2,",","."); ?></td>
					<td class="text-center"></td>
				</tr>
				<?php } ?>
		</table>
		</table>

		<!-- C -->
		<div style="margin:2em;"></div>
		<table id="actual-production3" class="display" width="100%" border="1">
		<thead hidden>
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

 		<tbody>
			<?php $i = 1; foreach ($dataC as $key) { ?>
				<tr  id="dataRow<?php echo $key['qid']; ?>" onclick="selectRow(<?php echo $key['qid']; ?>)" class="<?php echo ($key['start_date'] == 0) ? 'waiting' : (($key['end_date'] == 0) ? 'process' : 'completed') ; ?>">
					<td class="text-center" width="5%"><?php echo $i++; ?></td>
					<td class="text-center" width="5%"><?php echo $key['line']; ?></td>
					<td class="text-center" width="15%"><?php echo $key['part_no']; ?></td>
					<td class="text-center" width="10%"><?php echo $key['start_date']; ?></td>
					<td class="text-center" width="10%"><?php echo $key['end_date']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['plan_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['table_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['input_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['output_qty']; ?></td>
					<td class="text-center" width="8.33%"><?php echo $key['result']; ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['persen'],2,",","."); ?></td>
					<td class="text-center">
						<input type="number" class="form-control pm-input" value="<?php echo $key['rank']; ?>" onchange="updateRank(this, <?php echo $key['qid']; ?>)">
					</td>
				</tr>
				<?php } ?>

		</tbody>
			<table width="100%">
			<?php $i = 1; foreach ($dataCtot as $key) { ?>
				<tr style="background: #0070c0; font-weight: bold; color: white; text-align: center;">
					<td class="text-center" width="5%"></td>
					<td class="text-center" width="5%">TOTAL</td>
					<td class="text-center" width="15%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_plan_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_table_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_input_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_output_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_result']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_persen'],2,",","."); ?></td>
					<td class="text-center"></td>
				</tr>
				<?php } ?>
		</table>
		</table>
		<div style="margin:2em;"></div>
		<table width="100%" border="">
				<?php $i = 1; foreach ($datatot as $key) { ?>
				<tr style="background: #00b050; font-weight: bold; color: white;">

					<td class="text-center" colspan="2" width="10%">GRAND TOTAL</td>
					<td class="text-center" width="15%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="10%"></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_plan_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_table_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_input_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_output_qty']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_result']); ?></td>
					<td class="text-center" width="8.33%"><?php echo number_format($key['tot_persen'],2,",","."); ?></td>
					<td class="text-center" width="5%"></td>
				</tr>
				<?php } ?>
		</table>

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
	    $('#actual-production1').DataTable({
	    	"scrollY"		: "230px",
	        "scrollCollapse": true,
	        "searching"		: false,
	        "paging"		: false,
	        "info"			: false
	    });

		$("[type='number']").keypress(function (evt) {
		    evt.preventDefault();
		});
	} );

	$(document).ready(function() {
	    $('#actual-production2').DataTable({
	    	"scrollY"		: "230px",
	        "scrollCollapse": true,
	        "searching"		: false,
	        "paging"		: false,
	        "info"			: false
	    });

		$("[type='number']").keypress(function (evt) {
		    evt.preventDefault();
		});
	} );

		$(document).ready(function() {
	    $('#actual-production3').DataTable({
	    	"scrollY"		: "230px",
	        "scrollCollapse": true,
	        "searching"		: false,
	        "paging"		: false,
	        "info"			: false
	    });

		$("[type='number']").keypress(function (evt) {
		    evt.preventDefault();
		});
	} );
	function updateRank(form, id) {
		var nilai = form.value;
		$.ajax({
			url: "<?php echo base_url();?>department/updateRank/",
			cache: false,
			type: 'POST',
			data: {
				'id': id,
				'rank': nilai,
			},
			success: function(msg){
				console.log(msg);
			}
		});
	}

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
			$("#actual-production1").DataTable({retrieve: true}).destroy();
			$("#actual-production1").DataTable({
		    	"scrollY"		: "230px",
		        "scrollCollapse": true,
		        "searching"		: false,
		        "paging"		: false,
		        "info"			: false
			});

		} else {
			x.style.display = "none";
			$("#actual-production1").DataTable({retrieve: true}).destroy();
			$("#actual-production1").DataTable({
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