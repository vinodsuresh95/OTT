<?php
include 'login_core.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>cNE Lokha </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<div class="signInContainer">
		<div class="column">

				<div class="header">
					<img src="images/ederra.png" title="Logo" alt="Site logo">
					<h3> Sign In</h3>
					<span>to continue to cNe Lokha</span>
				</div>

			<form method="POST">
		
				<?php  echo $account->getError(Constants::$loginFailed); ?>
				<input type="text" name="phonenumber" placeholder="Phonenumber" maxlength="10" autocomplete="off" value="<?php getInputValue("phonenumber"); ?>" required>

				<input type="password" name="password" placeholder="Password"  autocomplete="off" required>

				<input type="submit" name="submitButton" value="SUBMIT">

			</form>
					<a href="register.php" class="signInMessage"> Create an account? Sign Up here
		</div>
	</div>
</body>
</html>