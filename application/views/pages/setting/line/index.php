<div class="form">
	<div class="left">Setting Line MC</div>
	<button class="btn-slt-crd">Save</button>
	<button class="btn-slt-crd">Delete</button>
	<button class="btn-slt-crd">+ Add</button>
	<button class="btn-slt-ref">Check Again</button>
</div>
<div class="body-data">
	<table id="setting-line-mc" class="display" width="100%" border="1">
		<thead>
		  <tr>
			 <th width="3%">NO</th>
			 <th width="10%">Process</th>
			 <th width="4%">No.M/C  </th>
			 <th width="13%">Machine  Name </th>
			 <th width="10%">1 Shift worker</th>
			 <th width="10%">2 Shift worker</th>
			 <th width="10%">3 Shift worker</th>
			 <th width="10%">Operation of terminal</th>
			 <th width="10%">Terminal  IP No</th>
			 <th width="10%">Terminal S/W Update</th>
			 <th width="10%">Remarks</th>
		  </tr>
		</thead>
		<tbody>
			<?php $i = 1; foreach ($data as $key) { ?>
				  <tr>
					 <td class="text-center"><?php echo $i++; ?></td>
					 <td class="text-center"><?php echo $key['dept']; ?></td>
					 <td class="text-center"><?php echo $key['mc_no']; ?></td>
					 <td class="text-center"><?php echo $key['name']; ?></td>
					 <td class="text-center">Arasyid </td>
					 <td class="text-center">Nurdin</td>
					 <td class="text-center">&nbsp;</td>
					 <td class="text-center">OK</td>
					 <td class="text-center">123. 123. 123. 123</td>
					 <td class="text-center">&nbsp;</td>
					 <td class="text-center">Manual input</td>
				  </tr>
			<?php } ?>
			<!--
				  <tr>
					 <td>2</td>
					 <td>H/S PRESS </td>
					 <td>HP1</td>
					 <td>H/S 60TON 1</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>NG</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>3</td>
					 <td>H/S PRESS </td>
					 <td>HP2</td>
					 <td>H/S 60TON 2</td>
					 <td>Muhlidin</td>
					 <td>Suhermanto</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>4</td>
					 <td>H/S PRESS </td>
					 <td>HP3</td>
					 <td>H/S 60TON 3</td>
					 <td>Yudam</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>5</td>
					 <td>Press</td>
					 <td>P1</td>
					 <td>SAMHO 60 t</td>
					 <td>Dicky</td>
					 <td>Dany Nur</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>6</td>
					 <td>Press</td>
					 <td>P2</td>
					 <td>SSANG YONG 80 t</td>
					 <td>Geri </td>
					 <td>Iwan Tri</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>7</td>
					 <td>Press</td>
					 <td>P3</td>
					 <td>SEOUL 110 t</td>
					 <td>Kahfi</td>
					 <td>Ony Yuliono</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>8</td>
					 <td>Press</td>
					 <td>P4</td>
					 <td>MIDA 110 t</td>
					 <td>Iskandar</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>9</td>
					 <td>Press</td>
					 <td>P5</td>
					 <td>HIM 80 t</td>
					 <td>Misnan</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>10</td>
					 <td>Press</td>
					 <td>P6</td>
					 <td>KUKIL 80 t</td>
					 <td>Taufik Hidayat</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>11</td>
					 <td>Press</td>
					 <td>P7</td>
					 <td>HANOUL 80 t</td>
					 <td>Wahyu Adi</td>
					 <td>Aji Saputra</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>12</td>
					 <td>Press</td>
					 <td>P8</td>
					 <td>HANOUL 80 t</td>
					 <td>Warsito</td>
					 <td>Ilfan</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>13</td>
					 <td>Press</td>
					 <td>P9</td>
					 <td>HANOUL 80 t</td>
					 <td>Dadi</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>14</td>
					 <td>Press</td>
					 <td>P10</td>
					 <td>HWAIL 60 t</td>
					 <td>Faturohman</td>
					 <td>Abdurohman</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>15</td>
					 <td>Press</td>
					 <td>P11</td>
					 <td>SAMHO 60 t</td>
					 <td>Oma</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>16</td>
					 <td>Press</td>
					 <td>P12</td>
					 <td>OKK 60t</td>
					 <td>Entoni</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>17</td>
					 <td>Press</td>
					 <td>P13</td>
					 <td>KUKIL 200 t</td>
					 <td>Irwan</td>
					 <td>Rio Hermanto</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>18</td>
					 <td>Press</td>
					 <td>P14</td>
					 <td>SAMHO 200t</td>
					 <td>Nana</td>
					 <td>Ahmad Ramsudin</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>19</td>
					 <td>Press</td>
					 <td>P15</td>
					 <td>SAMHO 200t</td>
					 <td>Rahmat Hidayat</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>20</td>
					 <td>Press</td>
					 <td>P16</td>
					 <td>SEOUL 200t</td>
					 <td>Sumaryana</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>21</td>
					 <td>Press</td>
					 <td>P17</td>
					 <td>SAM YANG 200t</td>
					 <td>Heriyanto</td>
					 <td>Asep N</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>22</td>
					 <td>Press</td>
					 <td>P18</td>
					 <td>SEOUL 160 t</td>
					 <td>Dani S</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>23</td>
					 <td>Press</td>
					 <td>P19</td>
					 <td>HWAIL 200 t</td>
					 <td>Ahmad S</td>
					 <td>Hendra</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>24</td>
					 <td>Press</td>
					 <td>P20</td>
					 <td>CHINFONG 160 t</td>
					 <td>Aji Susanto</td>
					 <td>Wahidin</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>25</td>
					 <td>Press</td>
					 <td>P21</td>
					 <td>HANOUL 160 t</td>
					 <td>Luki</td>
					 <td>Asep S</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>26</td>
					 <td>Press</td>
					 <td>P22</td>
					 <td>HANOUL 160 t</td>
					 <td>Sahrul</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>27</td>
					 <td>Press</td>
					 <td>P23</td>
					 <td> WS 150t</td>
					 <td>Panji</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>28</td>
					 <td>Press</td>
					 <td>P24</td>
					 <td>WS 150t</td>
					 <td>Risno</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>29</td>
					 <td>Press</td>
					 <td>P25</td>
					 <td>SIMPAC 300 t</td>
					 <td>Taryadi</td>
					 <td>Toni W</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>30</td>
					 <td>Press</td>
					 <td>P26</td>
					 <td>SEOUL 250t</td>
					 <td>Handi Puji</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>31</td>
					 <td>Assembly</td>
					 <td>Assy 1</td>
					 <td>SPINING M/C</td>
					 <td>M. Habil</td>
					 <td>Khaerul</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
				  <tr>
					 <td>32</td>
					 <td>Assembly</td>
					 <td>Assy 2</td>
					 <td>SPINING M/C</td>
					 <td>Dede Apandi</td>
					 <td>Asep</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
					 <td>&nbsp;</td>
				  </tr>
			 -->
		</tbody>
	</table>

</div>
</body>
</html>