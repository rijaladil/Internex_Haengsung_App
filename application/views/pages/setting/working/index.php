<script>
	function showModalEdit(id) {
	  document.getElementById("myForm1").style.display = "block";
	}
	function closeModalEdit(id) {
	  document.getElementById("myForm1").style.display = "none";
	}
</script>

<div class="form">
	<div class="left">Working Setting</div>
	<!-- <button class="red sright"  onclick="showModalEdit()">+ Add </button> -->
</div>
<div class="body-data">
	<div class="left">
		<table id="setting-working1" class="display" width="50%" border="1">
		<thead>
		  <tr><th colspan="11">1 Week : 6 Days Working</th></tr>
		  <tr>
		    <th width="20%">Day of the Week</th>
		    <th width="5%">Shift</th>
		    <th width="8%">Start Time</th>
		    <th width="8%">End Time</th>
		    <th width="16%" colspan="2">Meal Period</th>
		    <th width="16%" colspan="2">Rest Period 1</th>
		    <th width="16%" colspan="2">Rest Period 2</th>
		    <th width="8%">Option</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
		    <td rowspan="3">Monday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>15:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>15:30</td>
		    <td>23:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>23:30</td>
		    <td>7:30</td>
		    <td>4:00</td>
		    <td>4:40</td>
		    <td>1:50</td>
		    <td>2:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		     <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Tuesday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>15:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>15:30</td>
		    <td>23:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>23:30</td>
		    <td>7:30</td>
		    <td>4:00</td>
		    <td>4:40</td>
		    <td>1:50</td>
		    <td>2:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Wednesday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>15:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>15:30</td>
		    <td>23:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>23:30</td>
		    <td>7:30</td>
		    <td>4:00</td>
		    <td>4:40</td>
		    <td>1:50</td>
		    <td>2:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Thursday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>15:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>15:30</td>
		    <td>23:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>23:30</td>
		    <td>7:30</td>
		    <td>4:00</td>
		    <td>4:40</td>
		    <td>1:50</td>
		    <td>2:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Friday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>15:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>15:30</td>
		    <td>23:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>23:30</td>
		    <td>7:30</td>
		    <td>4:00</td>
		    <td>4:40</td>
		    <td>1:50</td>
		    <td>2:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Saturday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>12:30</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		   <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>12:30</td>
		    <td>16:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>14:20</td>
		    <td>14:30</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>16:50</td>
		    <td>21:50</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>20:50</td>
		    <td>21:00</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Sunday</td>
		    <td>1</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		</tbody>
		</table>
	</div>

	<div class="right">
		<table  id="setting-working2" class="display"  width="50%" border="1">
		<thead>
		  <tr><th colspan="11">2 Week : 5 Days Working</th></tr>
		  <tr>
		    <th width="20%">Day of the Week</th>
		    <th width="5%">Shift</th>
		    <th width="8%">Start Time</th>
		    <th width="8%">End Time</th>
		    <th width="16%" colspan="2">Meal Period</th>
		    <th width="16%" colspan="2">Rest Period 1</th>
		    <th width="16%" colspan="2">Rest Period 2</th>
		    <th width="8%">Option</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
		    <td rowspan="3">Monday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>16:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		     <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>16:30</td>
		    <td>1:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>22:30</td>
		    <td>22:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		     <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		     <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Tuesday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>16:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>16:30</td>
		    <td>1:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>22:30</td>
		    <td>22:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Wednesday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>16:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>16:30</td>
		    <td>1:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>22:30</td>
		    <td>22:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Thursday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>16:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>16:30</td>
		    <td>1:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>22:30</td>
		    <td>22:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Friday</td>
		    <td>1</td>
		    <td>7:30</td>
		    <td>16:30</td>
		    <td>11:40</td>
		    <td>12:20</td>
		    <td>9:30</td>
		    <td>9:40</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>16:30</td>
		    <td>1:30</td>
		    <td>18:00</td>
		    <td>18:40</td>
		    <td>22:30</td>
		    <td>22:50</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Saturday</td>
		    <td>1</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td rowspan="3">Sunday</td>
		    <td>1</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		  <tr>
		    <td>3</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>
		    	<a class="click-btn-u" onclick="showModalEdit()" href="#">Update</a>
		    	
		    </td>
		  </tr>
		</tbody>
		</table>

		<!-- <button>Save</button> -->
	</div>

</div>
</body>

<div class="form-popup" id="myForm1">
	<div id="modalUpdate" class="form-container">
		<div class="title">Update Working</div>
		<br>
		<input type="text" name="" id="textUpdateHid" hidden="">
		
		
		<table width="100%" border="0">
		  <tr>
		    <td>Day of the Week :<input type="text" name="" id=""></td>
		    <td>Shift :<input type="text" name="" id=""></td>
		  </tr>
		  <tr>
		    <td>Start Time :<input type="text" name="" id=""></td>
		    <td>End Time :<input type="text" name="" id=""></td>
		  </tr>
		  <tr>
		    <td>Meal Period Start:<input type="text" name="" id=""></td>
		    <td>Meal Period End:<input type="text" name="" id=""></td>
		  </tr>
		  <tr>
		    <td>Rest Period 1 Start : 	<input type="text" name="" id=""></td>
		    <td>Rest Period 1 End: 		<input type="text" name="" id=""></td>
		  </tr>
		  <tr>
		    <td>Rest Period 2 Start: 	<input type="text" name="" id=""></td>
		    <td>Rest Period 2 End: 		<input type="text" name="" id=""></td>
		  </tr>
		  <tr>
		    <td>Week Working : 			<input type="text" name="" id=""></td>
		    <td>&nbsp;</td>
		  </tr>
		</table>
		<button class="btn" onclick='update()'>UPDATE</button>
		<button class="cancel" onclick='closeModalEdit()'>CLOSE</button>
	</div>
</div>
</html>