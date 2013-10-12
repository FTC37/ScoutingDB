<?php
	require_once "../php/Application.php";
	
	$application = new Application();

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="../static/css/vendor/bootstrap-responsive.min.css">
		<link rel="stylesheet" type="text/css" href="../static/css/vendor/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../static/css/global.css">
	</head>
	<body>
		<div class="login-main" style='border-top-color:<?php echo($application->getTeamColor()); ?>'>
			<form>
				<fieldset>
					<div id="legend">
						<legend>Login</legend>
						<?php
							print_r($application->getConfig());
						?>
					</div>

					<div class="control-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="user['username']" class="input-xlarge" /><br/>
						
						<label for="password">Password</label>
						<input type="password" id="password" name="user['password']" class="input-xlarge" />
					</div>
				</fieldset>
			</form>
		</div>

		<?php
			echo $application->copy();
		?>
	</body>
</html>