<div class="form">
	<div class="left">Production Status</div>
	<div class="right">
		<button class="btn-green">Excel</button>
		<button class="btn-green2">Save</button>
		<button class="btn-blue" onclick="getData()">Search</button>
		<input type="text" id="datepicker1" name="text_date" value="<?php echo date('Y-m');?>" />
	</div>
</div>
<div class="body-data">
	<table id="product-status" class="display" width="100%" border="0">
	<thead>
	  <tr>
	    <th class="trth" rowspan="2" width="3%">No</th>
	    <th class="trth" rowspan="2" width="9%">Part No</th>
	    <th class="trth" rowspan="2" width="5%">Model </th>
	    <th class="trth" rowspan="2" width="8%">Description</th>
	    <th class="trth" rowspan="2" width="4%">Capa<br>/Day</th>
	    <th class="trth" rowspan="2" width="3%">Item</th>
	    <th class="trth" colspan="31" width="61%">Production Plan</th>
	   	<th class="trth" rowspan="2" width="3%">T/T</th>
	    <th class="trth" rowspan="2" width="4%">%</th>
	  </tr>
	  <tr>
	  	<?php for ($i=1; $i <= 31; $i++) { ?>
	    	<th class="trth"><?php echo $i; ?></th>
		<?php } ?>
	  </tr>
	</thead>
	<tbody id="idTableData">
		<tr>
			<td colspan="39">No Data</td>
		</tr>
	</tbody>
	</table>
</div>

<script type="text/javascript">
	function getData() {
		tgl = document.getElementById("datepicker1").value;
		department = <?php echo $department; ?>;

		// console.log(tgl);
	    $.ajax({
	        url: "<?php echo base_url(); ?>department/production_status_data/",
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

</script>