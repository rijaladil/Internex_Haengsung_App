<html>

<script src="<?php echo base_url(); ?>assets/js/datetime.js"></script>
<!-- <script src="js/menu.js"></script> -->

<body>
<!-- HEADER -->
	<div class="head">
		<div class="left">PT. HAENGSUNG</div>
		<div class="center">HAENGSUNG SMART FACTORY SYSTEM</div>
		<div class="right time"></div>
	</div>
<!-- LOGIN -->
	<div class="login"><!-- Login : D.Agus --></div>
<!-- MENU & SUBMENU -->
	<div class="navbar">

	 <?php if ( (in_array($this->session->userdata('level'), array(1,2,3,4))) ) { ?>
		  <div class="subnav">
		    <button onclick="myFunction6()" class="subnavbtn">Assembly</button>
		    <div id="myDropdown3" class="subnav-content">
		      <a href="<?php echo base_url(); ?>department/production_day/1">Production Day</a>
		      <a href="<?php echo base_url(); ?>department/production_model/1">Production Model</a>
		    </div>
		  </div>
	  <?php } ?>
	  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3,4))) ) { ?>
		  <div class="subnav">
		    <button onclick="myFunction6()" class="subnavbtn">Clamping</button>
		    <div id="myDropdown3" class="subnav-content">
		      <a href="<?php echo base_url(); ?>department/production_day/2">Production Day</a>
		    </div>
		  </div>
	  <?php } ?> 
	  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3,4))) ) { ?>
		  <div class="subnav">
		    <button onclick="myFunction6()" class="subnavbtn">Andon</button>
		    <div id="myDropdown6" class="subnav-content">
		      <a href="<?php echo base_url(); ?>andon">Andon Summary</a>
		      <a href="<?php echo base_url(); ?>andon/history">Andon History</a>
		    </div>
		  </div>
	  <?php } ?>
	  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
	  <div class="subnav">
	    <button onclick="myFunction7()" class="subnavbtn">Setting</button>
	    <div id="myDropdown7" class="subnav-content">
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/user">User setting</a>
		  <?php } ?>
	       <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/input_spk">Input Planning</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/upload_spk">Upload SPK</a>
		  <?php } ?>
	      </div>
	  </div>
	  <?php } ?>
	  <a href="<?php echo base_url(); ?>login/logout">Logout</a>
	</div>

</body>
</html>