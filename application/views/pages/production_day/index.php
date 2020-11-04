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
	<script type="text/javascript">
		 $(document).ready(function(){
		   $(".active2").css("background-color","red");
		   $(".ac-border2").css("background-color","#4d4d4d");
		   $(".ac-border2").css("color","#fff");
		   $(".sc2").css("display", "block");
		 });
	</script>

<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Production Status (Day)</div>
	<div class="right">
		<button class="btn-green" onclick="downloadExcel_xxx()" form="cek">Excel</button>
		<button class="btn-blue" onclick="getData()">Search</button>
		<input type="text" id="datepickersum" name="text_date" value="<?php echo date('Y-m');?>"  autocomplete="off"/>
	</div>
</div>
<div class="body-data"  id="contents">
	<table id="product-status" class="display" width="100%" border="0">
	<thead>
	  <tr>
	    <th class="trth" rowspan="2" width="7%">Process</th>
	    <th class="trth" rowspan="2" width="4%">Line / MC</th>
	    <th class="trth" rowspan="2" width="7%">Item</th>
	    <th class="trth" colspan="31" width="82%" style="border-bottom: 1px solid white">Production</th>
	    <th class="trth" rowspan="2" width="4%">Total</th>
	   	

	  </tr>
	  <tr>

	  	<?php for ($i=1; $i <= 31; $i++) { ?>
	    	<th class="trth" ><?php echo $i; ?></th>
		<?php } ?>
		
	  </tr>
	</thead>
	<tbody id="idTableData">
		<tr>
			<td colspan="39" >No Data</td>
		</tr>
	</tbody>
	</table>
</div>

<script type="text/javascript">

	function getData() {
		tgl = document.getElementById("datepickersum").value;
		department = <?php echo $department; ?>;

		// console.log(tgl);
	    $.ajax({
	        url: "<?php echo base_url(); ?>department/production_day_data/",
	        type: 'POST',
	        data: {
	            'tgl': tgl,
	            'department': department,
	        },
	        cache: false,
	        success: function(msg){
	            $("#idTableData").html(msg);

	        }
	    });
	}


    function downloadExcel(){
		dep   = <?php echo $department; ?>;
		dates = document.getElementById('datepickersum').value;
    	window.open("<?php echo base_url(); ?>department/production_download/"+dep+'/'+dates);
    }




</script>