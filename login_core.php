<?php

include 'includes/config.php';
include 'includes/classes/Account.php';
include 'includes/classes/Constants.php';
require_once("includes/classes/FormSanitizer.php");


	$account = new Account($con);

if (isset($_POST["submitButton"])) {

	$phonenumber = FormSanitizer::sanitizeFormNumber($_POST["phonenumber"]);
	$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

	$success = $account->login( $phonenumber , $password );

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