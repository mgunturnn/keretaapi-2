<?php
session_start();
require 'server/config.php';
if (isset($_SESSION['email'])) {
	header('Location: index.php');
}
require 'pages/templates/header.php';
?>
<div class="header-login text-center mt-4">
	<h1>Login</h1>
</div>
<div class="login text-center">
	<br />
	<form action="q_login.php" method="post">
		<div class="form-group">
			<label>Email:</label>
			<input type="text" class="form-control col-sm-4 offset-md-4" name="email" id="email" require="required" />
		</div>
		<div>
			<label>Password:</label>
			<input type="password" class="form-control col-sm-4 offset-md-4" name="password" id="password" require="required" />
		</div>
		<br/>
		<div>
			<input type="submit" value="Login" name="login" class="btn btn-primary">
		</div>
	</form>
</div>