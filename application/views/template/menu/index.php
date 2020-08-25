<html>

<script src="<?php echo base_url(); ?>assets/js/datetime.js"></script>
<!-- <script src="js/menu.js"></script> -->

<body>
<!-- HEADER -->
	<div class="head">
		<div class="left">PT. DAE BAEK</div>
		<div class="center">DAE BAEK SMART FACTORY SYSTEM</div>
		<div class="right time"></div>
	</div>
<!-- LOGIN -->
	<div class="login"><!-- Login : D.Agus --></div>
<!-- MENU & SUBMENU -->
	<div class="navbar">
	  <div class="subnav">
	    <button onclick="myFunction1()" class="subnavbtn">Summary</button>
	    <div id="myDropdown1" class="subnav-content">
	      <a href="<?php echo base_url(); ?>">Summary</a>
	    </div>
	  </div>

	  <?php foreach ($this->model_department->get_all() as $key) { ?>
		  <div class="subnav">
		    <button onclick="myFunction2()" class="subnavbtn"><?php echo $key['name']; ?></button>
		    <div id="myDropdown3" class="subnav-content">
		      <a href="<?php echo base_url(); ?>department/production_status/<?php echo $key['id']; ?>">Production Status</a>
		      <a href="<?php echo base_url(); ?>department/actual_production/<?php echo $key['id']; ?>">Actual Production</a>
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
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/working">Working setting</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/user">User setting</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/operator">Operator setting</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/quality">Quality setting</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
		      <a href="<?php echo base_url(); ?>setting/losstime">Loss Time setting</a>
		  <?php } ?>
		  <?php if ( (in_array($this->session->userdata('level'), array(1,2,3))) ) { ?>
	      <a href="<?php echo base_url(); ?>setting/line">Line/MC setting</a>
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