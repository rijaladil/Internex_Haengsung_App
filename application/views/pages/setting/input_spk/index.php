<script>
	function openFormInput() {
	  document.getElementById("myForm").style.display = "block";
	}
	function showModalEdit(id) {
	  document.getElementById("myForm1").style.display = "block";
	}

	function showModalDelete(id) {
	  document.getElementById("myFormDel").style.display = "block";
	}

	function closeFormInput() {
	  document.getElementById("myForm").style.display = "none";
	}
	function closeModalEdit(id) {
	  document.getElementById("myForm1").style.display = "none";
	}
	function closeModalDelete(id) {
	  document.getElementById("myFormDel").style.display = "none";
	}
</script>

<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<div class="form">
	<div class="left">Production Planning Today</div>
</div>

<div class="body-data">
	<div class="slt">
		<!-- <div class="upload"><button>Upload Add Excel</button></div> -->
		<table id="setting1" class="display" border="0">
		<thead>
		  <tr>
		    <th colspan="6">Assembly SPK</th>
		   <!--  <th colspan="2">
		    	<input type="text" readonly="" name="date" id="datepicker1" value="">
		    </th> -->
		  </tr>
		  <tr >
		    <th width="10%">Date</th>
		    <th width="10%">No</th>
		    <th width="10%">M/C</th>
		    <th width="10%">Part No</th>
		    <th width="10%">Plan Qty</th>
		    <th width="10%">Ranking</th>
		  </tr>
		</thead>
		<tbody id="idContent">
		<?php $i = 1; foreach ($data_assy as $key) { ?>
			<tr>
			    <td class="text-center"><?php echo $key['date']; ?></td>
			    <td class="text-center"><?php echo $key['rank']; ?></td>
			    <td class="text-center"><?php echo $key['mc_no']; ?></td>
			    <td class="text-center"><?php echo $key['part_no']; ?></td>
			    <td class="text-center"><?php echo number_format($key['qty']); ?></td>
			    <td class="text-center"><?php echo $key['rank']; ?></td>
			 </tr>
		<?php } ?>
		</tbody>
		<!-- <tfoot >
			<tr >
			    <td class="text-center"></td>
			    <td class="text-center"></td>
			    <td class="text-center">TOTAL</td>
			    <td class="text-center"></td>
			    <td class="text-center">xxxx</td>
			    <td class="text-center"></td>
			 </tr>
		</tfoot> -->
		</table>
	</div>

	<div class="slt-r">
		<!-- <div class="upload"><button>Upload Add Excel</button></div> -->
		<table id="setting2" class="display" width="50%" border="0">
		<thead>
		  <tr>
		    <th colspan="6">Clamping SPK</th>
		   <!--  <th colspan="2"><input type="text" readonly="" name="date" id="datepicker2" value=""></th> -->
		  </tr>
		  <tr>
		    <th width="10%">Date</th>
		    <th width="10%">No</th>
		    <th width="10%">M/C</th>
		    <th width="10%">Part No</th>
		    <th width="10%">Plan Qty</th>
		    <th width="10%">Ranking</th>
		  </tr>
		</thead>
		<tbody id="idContent">
			<?php $j = 1; foreach ($data_clamping as $key) { ?>
				<tr>			    	
				    <td class="text-center"><?php echo $key['date']; ?></td>
				    <td class="text-center"><?php echo $key['rank']; ?></td>
				    <td class="text-center"><?php echo $key['mc_no']; ?></td>
				    <td class="text-center"><?php echo $key['part_no']; ?></td>
				    <td class="text-center"><?php echo number_format($key['qty']); ?></td>
				   <td class="text-center"><?php echo $key['rank']; ?></td>

				  </tr>
				<?php } ?>

		</tbody>
		<!-- <tfoot >
			<tr >
			    <td class="text-center"></td>
			    <td class="text-center"></td>
			    <td class="text-center">TOTAL</td>
			    <td class="text-center"></td>
			    <td class="text-center">xxxx</td>
			    <td class="text-center"></td>
			 </tr>
		</tfoot> -->
		</table>
	</div>
</div>

<!-- <div id="modal" hidden=""> -->


</body>
</html>