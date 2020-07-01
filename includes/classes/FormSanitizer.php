<?php


   class FormSanitizer {

   	public static function sanitizeFormString($inputText) {
  	$inputText = strip_tags($inputText);			// removes html tage's in the input
  	$inputText = str_replace(" ", "", $inputText);  //no space's in between name 
  	$inputText = trim($inputText);    				// no space's after or before name 
  	$inputText = strtolower($inputText);			// converts all to lower case
  	$inputText = ucfirst($inputText);				// coverts first alphabet to cap's 
  	 return $inputText;
  } 
  

  	public static function sanitizeFormUsername($inputText) {
  	$inputText = strip_tags($inputText);			// removes html tage's in the input
  	$inputText = str_replace(" ", "", $inputText);  //no space's in between name 
  	return $inputText;
  } 

  public static function sanitizeFormNumber($inputText) {
	$inputText = strip_tags($inputText);			// removes html tage's in the input
	$inputText = str_replace(" ", "", $inputText);  //no space's in between name 
	return $inputText;
} 

    public static function sanitizeFormEmail($inputText) {
  	$inputText = strip_tags($inputText);			// removes html tage's in the input
  	$inputText = str_replace(" ", "", $inputText);  //no space's in between name 
  	return $inputText;
  } 

    public static function sanitizeFormPassword($inputText) {
  	$inputText = strip_tags($inputText);			// removes html tage's in the input
  	return $inputText;
  } 



} 

?>