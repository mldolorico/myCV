<?php include "server.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">
		<!-- Alert Message -->
  		<?php if (isset($_SESSION['warning'])) { ?>
    		<div class="errors">
      		<?php 
      		echo $_SESSION['warning'];
      		unset ($_SESSION['warning']);
    		?>
   </div>
  <?php } ?>
		<?php include "errors.php"; ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>

</body>
</html>