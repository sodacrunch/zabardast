<?php                  
$fileatt_type = "application/octet-stream"; 

$email_from = "haroon@sodacrunch.com"; 
$email_subject = "Zabardast - QRCODE"; 
$email_message = "Mail sent by Zabardast"; 

$email_to = $_POST['mail']; 

$headers = "From: $email_from";   

$data= $_POST['img'];

$semi_rand = md5(time());   
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";   

$headers .= "\nMIME-Version: 1.0\n" .   
            "Content-Type: multipart/mixed;\n" .   
            " boundary=\"{$mime_boundary}\"";   

$email_message = "This is a multi-part message in MIME format.\n\n" .   
                "--{$mime_boundary}\n" .   
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" .   
               "Content-Transfer-Encoding: 7bit\n\n" .   
$email_message . "\n\n";   


$email_message .= "--{$mime_boundary}\n" .   
                  "Content-Type: {$fileatt_type};\n" .   
                  //"Content-Disposition: attachment;\n" . 
                  //" filename=\"{$fileatt_name}\"\n" . 
                  "Content-Transfer-Encoding: base64\n\n" .   
                 $data . "\n\n" .   
                  "--{$mime_boundary}--\n";   

$mailsend = mail($email_to, $email_subject, $email_message, $headers);   

echo $mailsend;

?>