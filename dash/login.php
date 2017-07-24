<head>
	<meta charset="utf-8">
	<!--[if lt IE 9]>-->
	<!--[endif]-->
</head>
<div id="login">
	<h1><span class="fa fa-lock"></span> Sign In<span class="pull-right" role="button" id="close" data-dismiss="modal">&times;</span></h1>
	<form action="<?php echo htmlspecialchars('dash/connect.php'); ;?>" method="POST">
		<fieldset>
			<p><label for="name">Username</label></p>
			<p><input type="text" id="name" name="username" value="" required></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->
			<p><label for="password">Password</label></p>
			<p><input type="password" name="password" id="password" value="" required></p> <!-- JS because of IE support; better: placeholder="password" -->
			<p><input type="submit" name="submit" value="Sign In"></p>
		</fieldset>
	</form>
</div> <!-- end login -->
<script>
</script>