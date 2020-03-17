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
		    <button onclick="myFunction3()" class="subnavbtn"><?php echo $key['name']; ?></button>
		    <div id="myDropdown3" class="subnav-content">
		      <a href="<?php echo base_url(); ?>department/production_status/<?php echo $key['id']; ?>">Production Status</a>
		      <a href="<?php echo base_url(); ?>department/actual_production/<?php echo $key['id']; ?>">Actual Production</a>
		    </div>
		  </div>
	  <?php } ?>

<!--
	  <div class="subnav">
	    <button onclick="myFunction2()" class="subnavbtn">Powder Coating</button>
	    <div id="myDropdown2" class="subnav-content">
	      <a href="powder_coating_production_status.php">Production Status</a>
	      <a href="powder_coating_actual_production.php">Actual Production</a>
	  	</div>
	  </div>
	  <div class="subnav">
	    <button onclick="myFunction3()" class="subnavbtn">H/S Press</button>
	    <div id="myDropdown3" class="subnav-content">
	      <a href="hs_press_production_status.php">Production Status</a>
	      <a href="<?php echo base_url(); ?>department/actual_production/2">Actual Production</a>
	    </div>
	  </div>
	  <div class="subnav">
	    <button onclick="myFunction4()" class="subnavbtn">Press</button>
	    <div id="myDropdown4" class="subnav-content">
	      <a href="press_production_status.php">Production Status</a>
	      <a href="press_actual_production.php">Actual Production</a>
	     </div>
	  </div>
	  <div class="subnav">
	    <button onclick="myFunction5()" class="subnavbtn">Assembly</button>
	    <div id="myDropdown5" class="subnav-content">
	      <a href="assembly_production_status.php">Production Status</a>
	      <a href="assembly_actual_production.php">Actual Production</a>
	     </div>
	  </div>
 -->
	  <div class="subnav">
	    <button onclick="myFunction6()" class="subnavbtn">Andon</button>
	    <div id="myDropdown6" class="subnav-content">
	      <a href="<?php echo base_url(); ?>andon">Andon Summary</a>
	      <a href="<?php echo base_url(); ?>andon/history">Andon History</a>
	     </div>
	  </div>
	  <div class="subnav">
	    <button onclick="myFunction7()" class="subnavbtn">Setting</button>
	    <div id="myDropdown7" class="subnav-content">
	      <a href="<?php echo base_url(); ?>setting/working">Working setting</a>
	      <a href="<?php echo base_url(); ?>setting/user">User setting</a>
	      <a href="<?php echo base_url(); ?>setting/quality">Quality setting</a>
	      <a href="<?php echo base_url(); ?>setting/losstime">Loss Time setting</a>
	      <a href="<?php echo base_url(); ?>setting/line">Line/MC setting</a>
	      <a href="<?php echo base_url(); ?>setting/upload_spk">Upload SPK</a>
	      </div>
	  </div>
	  <a href="login.php">Logout</a>
	</div>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("subnavbtn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "none") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

	function myFunction1() {
	  document.getElementById("myDropdown1").style.display="block";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction2() {
	  document.getElementById("myDropdown2").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction3() {
	  document.getElementById("myDropdown3").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction4() {
	  document.getElementById("myDropdown4").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction5() {
	  document.getElementById("myDropdown5").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction6() {
	  document.getElementById("myDropdown6").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown7").style.display="none";
	}
	function myFunction7() {
	  document.getElementById("myDropdown7").style.display="block";
	  document.getElementById("myDropdown1").style.display="none";
	  document.getElementById("myDropdown2").style.display="none";
	  document.getElementById("myDropdown3").style.display="none";
	  document.getElementById("myDropdown4").style.display="none";
	  document.getElementById("myDropdown5").style.display="none";
	  document.getElementById("myDropdown6").style.display="none";
	}
</script>

</body>
</html>