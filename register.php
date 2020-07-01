<?php
include 'register_core.php';
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
					<h3> Sign Up</h3>
					<span>to continue to cNe Lokha</span>
				</div>

			<form method="POST">
				
				<?php  echo $account->getError(Constants::$firstName); ?>
				<input type="text" name="firstName" placeholder="First name" value="<?php getInputValue("firstName"); ?>" autocomplete="off" required>

				<?php  echo $account->getError(Constants::$lastName); ?>
				<input type="text" name="lastName" placeholder="Last name" value="<?php getInputValue("lastName"); ?>" autocomplete="off" required>

				<?php  echo $account->getError(Constants::$username); ?>
				<?php  echo $account->getError(Constants::$usernameTaken); ?>
				<input type="text" name="username" placeholder="Username" value="<?php getInputValue("username"); ?>" autocomplete="off" required>

				<?php  echo $account->getError(Constants::$number); ?>
				<?php  echo $account->getError(Constants::$numberTaken); ?>
				<input type="phonenumber" name="phonenumber" placeholder="Phonenumber" maxlength="10" value="<?php getInputValue("phonenumber"); ?>" autocomplete="off" required>

				<?php  echo $account->getError(Constants::$emailInvalid); ?>
				<?php  echo $account->getError(Constants::$emailTaken); ?>
				<input type="email" name="email" placeholder="Email" value="<?php getInputValue("email"); ?>" autocomplete="off" required>

				<?php  echo $account->getError(Constants::$passwordsDontMatch); ?>
				<?php  echo $account->getError(Constants::$passwordlength); ?>
				<input type="password" name="password" placeholder="Password" autocomplete="off" required>
				<input type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="off" required>

				<input type="submit" name="submitButton" value="SUBMIT">

			</form>
					<a href="login.php" class="signInMessage"> Already have an account? Sign In here
		</div>
	</div>
</body>
</html>