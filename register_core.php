<?php

include 'includes/config.php';
include 'includes/classes/Account.php';
include 'includes/classes/Constants.php';
require_once("includes/classes/FormSanitizer.php");

	$account = new Account($con);

if (isset($_POST["submitButton"])) {
	
	$firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
	$lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
	$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
	$phonenumber = FormSanitizer::sanitizeFormNumber($_POST["phonenumber"]);
	$email = FormSanitizer::sanitizeFormemail($_POST["email"]);
	$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
	$confirmpassword = FormSanitizer::sanitizeFormPassword($_POST["confirmpassword"]);

	$success = $account->register($firstName, $lastName , $username, $phonenumber , $email , $password , $confirmpassword);

	if ($success) {
			//Store session
			$_SESSION["userLoggedIn"] = $phonenumber;
			header("Location: index.php");
	}

  }

function getinputValue($name){
	if (isset($_POST["$name"])) {
		echo $_POST["$name"];
	}
}
?>