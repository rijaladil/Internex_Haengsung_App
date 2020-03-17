<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style-login.css">
<head>
	<title>DAEBAEK</title>
</head>
<body>
<div class="login">
	<div class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png"></div>
	<div class="logo-text"><b>DAEBAEK</b><br><small>SMART FACTORY SYSTEM</small></div>
    <form method="post" action="<?php echo base_url(); ?>login">
    	<input class="text-center" type="text" name="nip" placeholder="Username" required="required" autocomplete="off" />
        <input class="text-center" type="password" name="password" placeholder="Password" required="required" autocomplete="off" />
       <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
    </form>


</div>
   	<div class="footer">PT DAEBAEK - 2019</div>
</body>
</html>