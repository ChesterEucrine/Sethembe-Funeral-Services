<?php

$message = "Testing auto email functionality";

function mailToSethembe($message='') {
  $to_email = "info@sethembefs.co.za";
  $subject = "Test Email Data Sender";
  $headers = NULL;
  mail($to_email,$subject,$message);
}

mailToSethembe($message);

?>