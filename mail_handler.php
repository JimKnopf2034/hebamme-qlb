/*
 * Formmailer in php for contact form
 */

<?php

function spamcheck($field){
	// Sanitize e-mail address
  	$field=filter_var($field, FILTER_SANITIZE_EMAIL);
  	// Validate e-mail address
  	if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    	return TRUE;
  	} else {
    	return FALSE;
  	}
}

header('location: contact.html')


if(isset($_POST['submit'])){

  $string1 = 'anmeldung';
  $string2 = 'hebamme-qlb.de';
  $string3 = '@';
  $to = $string1.$string3.$string2;

  $name = $_POST['inputName'];
  $from = $_POST['inputEmail'];
  $head = "FROM: ".$from;
  $check = spamcheck($from);
  if ($check == FALSE){
    echo "Invalid Mail Adress";
  }

  $mailtext = $_POST['inputText'];
  $subject = "Kontaktanfrage www.hebamme-qlb.de";

  mail(
    $to,$subject,$mailtext,$head
    )or die(
    "Die Nachricht konnte aufgrund ein Serverfehlers nicht versendet werden!");

}
?>
