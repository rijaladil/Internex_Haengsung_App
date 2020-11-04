	<style type="text/css">
		/*.ui-datepicker-calendar {
			display: none;
			font-size: 2em;
		}
		.ui-widget {
		    font-family: Arial,Helvetica,sans-serif;
		    font-size: 15px;
		}
*/
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


		#container_donut {
		  height: 400px;
		}

		.highcharts-figure, .highcharts-data-table table {
		  min-width: 310px;
		  max-width: 800px;
		  margin: 1em auto;
		}

		.highcharts-data-table table {
		  font-family: Verdana, sans-serif;
		  border-collapse: collapse;
		  border: 1px solid #EBEBEB;
		  margin: 10px auto;
		  text-align: center;
		  width: 100%;
		  max-width: 500px;
		}
		.highcharts-data-table caption {
		  padding: 1em 0;
		  font-size: 1.2em;
		  color: #555;
		}
		.highcharts-data-table th {
		  font-weight: 600;
		  padding: 0.5em;
		}
		.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
		  padding: 0.5em;
		}
		.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
		  background: #f8f8f8;
		}
		.highcharts-data-table tr:hover {
		  background: #f1f7ff;
		}
	</style>

	<script src="<?php echo base_url(); ?>assets/others/Highcharts-7.2.1/code/highcharts.js"></script>
	<script src="<?php echo base_url(); ?>assets/others/Highcharts-7.2.1/code/modules/series-label.js"></script>

	<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
	<form id="normal" method="post" action="<?php echo base_url(); ?>andon">
		<div class="form">
			<div class="left">Summary Actual Status</div>
			<div class="right">
				<a class="btn-green" onclick="downloadExcel()">Excel</a>
				<button class="btn-blue">Search</button>

				<input type="text" name="text_dateStart" id="datepicker1"  autocomplete="off" value="<?php echo ($setStart == '') ? date('Y-m-d') : $setStart;?>"/>
				<select class="form-control" name="text_machine" id="text_machine">
					<option value="">All Machines <?php echo $selected_machine; ?></option>
					<?php foreach ($this->model_machine->get_by_dept_id() as $key) { ?>
						<option <?php echo ($selected_machine == $key['id'] ? 'selected' : '') ?> value="<?php echo $key['id']; ?>"><?php echo $key['mc_no']; ?></option>
					<?php } ?>
				</select>

				<select class="form-control" name="text_dept" id="text_dept">
					<option value="">All Process</option>
					<?php foreach ($this->model_department->get_all() as $key) { ?>
						<option <?php echo ($selected_dep == $key['id'] ? 'selected' : '') ?> value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</form>

	<div class="body-data">
		<div>
		    <div style="width: 20%; float: left;" id="container_donut"></div>
			<div style="width: 80%; float: right;"  id="container"></div>
		</div>

		<table id="" class="display textCenter" width="100%" border="1">
		<thead>
		  <tr>
		    <th width="2%" rowspan="2">No</th>
		    <th rowspan="2">Process</th>
		    <th width="5%" rowspan="2">No. M/C</th>
		    <th rowspan="2">M/C Name</th>
		    <th rowspan="2"></th>
		    <th colspan="5">Actual Today</th>
		    <th colspan="5">Actual Monthly</th>
		  </tr>
		  <tr>
		    <th>Machine Call</th>
		    <th>Quality Call</th>
		    <th>Material Call</th>
		    <th>Help Call</th>
		    <th>Total</th>
		    <th>Machine Call</th>
		    <th>Quality Call</th>
		    <th>Material Call</th>
		    <th>Help Call</th>
		    <th>Total</th>
		  </tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($data as $key) { ?>
				<tr>
					<td rowspan="2"><?php echo $no++; ?></td>
					<td rowspan="2"><?php echo $key['deptName']; ?></td>
					<td rowspan="2"><?php echo $key['mcNo']; ?></td>
					<td rowspan="2" nowrap=""><?php echo $key['mcName']; ?></td>
					<td>Call</td>
					<td class="bg-green"><?php echo $key['count1']; ?></td>
					<td class="bg-blue"><?php echo $key['count4']; ?></td>
					<td class="bg-red"><?php echo $key['count2']; ?></td>
					<td class="bg-yellow"><?php echo $key['count3']; ?></td>
					<td><?php echo $key['count1']+$key['count2']+$key['count3']+$key['count4']; ?></td>
					<td class="bg-green"><?php echo $key['countLastMonth1']; ?></td>
					<td class="bg-blue"><?php echo $key['countLastMonth4']; ?></td>
					<td class="bg-red"><?php echo $key['countLastMonth2']; ?></td>
					<td class="bg-yellow"><?php echo $key['countLastMonth3']; ?></td>
					<td><?php echo $key['countLastMonth1']+$key['countLastMonth2']+$key['countLastMonth3']+$key['countLastMonth4']; ?></td>
				</tr>
				<tr>
					<td>Downtime</td>
					<td class="bg-green"><?php echo secToMinute($key['downtime1']); ?></td>
					<td class="bg-blue"><?php echo secToMinute($key['downtime4']); ?></td>
					<td class="bg-red"><?php echo secToMinute($key['downtime2']); ?></td>
					<td class="bg-yellow"><?php echo secToMinute($key['downtime3']); ?></td>
					<td><?php echo secToMinute($key['downtime1']+$key['downtime2']+$key['downtime3']+$key['downtime4']); ?></td>
					<td class="bg-green"><?php echo secToMinute($key['downtimeLast1']); ?></td>
					<td class="bg-blue"><?php echo secToMinute($key['downtimeLast4']); ?></td>
					<td class="bg-red"><?php echo secToMinute($key['downtimeLast2']); ?></td>
					<td class="bg-yellow"><?php echo secToMinute($key['downtimeLast3']); ?></td>
					<td><?php echo secToMinute($key['downtimeLast1']+$key['downtimeLast2']+$key['downtimeLast3']+$key['downtimeLast4']); ?></td>
				</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>

</body>
</html>

	<?php
		function secToMinute($sec) {
			if ($sec == 0) {
				return "<font color=''>00:00:00</font>";
			}else{
				return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
			}
		}
	?>

	<script type="text/javascript">

        $(document).ready(function() {

			date = document.getElementById("datepicker1").value;
			dept = document.getElementById("text_dept").value;
			machine = document.getElementById("text_machine").value;
		    $.ajax({
		        url: "<?php echo base_url(); ?>"+"andon/jsonGetSum",
		        dataType: 'json',
		        type: 'post',
		        cache:false,
		        data:{
		        	'date' : date,
		        	'dept' : dept,
		        	'machine' : machine
		        },
		        success: function(data){
		        	var dataDate = [];
		        	var dataResponse = [];
		        	var dataRepair = [];
		        	var dataDowntime = [];
		        	for ( var i = 0; i < data.length; i++){
			        	dataDate[i] = data[i]['date'];
			        	dataResponse[i] = parseInt(data[i]['arrival']);
			        	dataRepair[i] = parseInt(data[i]['completed']);
			        	dataDowntime[i] = parseInt(data[i]['downtime']);
			        }
					Highcharts.chart('container', {
					    chart: {
					        type: 'spline'
					    },
					    title: {
					        text: 'Monthly Andon Summary'
					    },
					    subtitle: {
					        text: '	'
					    },
					    xAxis: {
					        categories: dataDate
					    },
					    yAxis: {
					        title: {
					            text: 'Second'
					        }
					    },
					    plotOptions: {
					        line: {
					            dataLabels: {
					                enabled: true
					            },
					            enableMouseTracking: false
					        }
					    },
					    series: [{
					        name: 'Response',
					        data: dataResponse
					    }, {
					        name: 'Repair',
					        data: dataRepair
					    }, {
					        name: 'Downtime',
					        data: dataDowntime
					    }]
					});

		        }
		    });

		    $.ajax({
		        url: "<?php echo base_url(); ?>"+"andon/jsonGetSumDonut/",
		        dataType: 'json',
		        type: 'post',
		        cache:false,
		        data:{
		        	'date' : date,
		        	'date' : date,
		        	'machine' : machine
		        },
		        success: function(data){

		        	machineCall = parseInt(data[0]['machineCall']);
		        	materialCall = parseInt(data[0]['materialCall']);
		        	helpCall = parseInt(data[0]['helpCall']);
		        	qualityCall = parseInt(data[0]['qualityCall']);

					Highcharts.chart('container_donut', {
					    chart: {
					        type: 'pie',
					        options3d: {
					            enabled: true,
					            alpha: 45
					        }
					    },
					    title: {
					        text: 'Monthly Andon Percentage'
					    },
					    subtitle: {
					        text: ''
					    },
					    plotOptions: {
					        pie: {
					            innerSize: 100,
					            depth: 45
					        }
					    },
					    series: [{
					        name: 'Delivered amount',
					        data: [
					            ['Machine Call', machineCall],
					            ['Material Call', materialCall],
					            ['Help Call', helpCall],
					            ['Quality Call',qualityCall]
					        ],
					        colors: ['#a1cab3','#de8e8e','#bfbf71','#63a6bf']
					    }]
					});

		        }
		    });

		    load_machine();

		    // console.log(<?php echo $selected_machine;?>);
        });

		// $("#text_dept").change(function(){
		// 	load_machine();
		// });

		function selectElement(id, valueToSelect) {
		    let element = document.getElementById(id);
		    element.value = valueToSelect;
		}

	   function load_machine(){
	      var text_dept = $("#text_dept").val();
	      $.ajax({
	         url: "<?php echo base_url();?>json/get_machines",
	         cache: false,
	         type: 'POST',
	         data: {
	            'text_dept': text_dept,
	         },
	         success: function(msg){
	            $("#text_machine").html("<option value=''>All Machines</option>"+msg);
			    selectElement('text_machine', '<?php echo $selected_machine;?>');
	         }
	      });
	   }

	   function downloadExcel(){
			date    = document.getElementById("datepicker1").value;
			dept    = document.getElementById("text_dept").value;
			machine = document.getElementById("text_machine").value;

	    	window.open("<?php echo base_url(); ?>andon/download_summary/"+date+'/'+(dept == '' ? 0 : dept)+'/'+(machine == '' ? 0 : machine));
	   }

	</script>