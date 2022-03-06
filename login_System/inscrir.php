<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();                      // Set mailer to use SMTP -----//// hado khalihom matbedlihom 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers -----//// hado khalihom matbedlihom 
$mail->SMTPAuth = true;               // Enable SMTP authentication -----//// hado khalihom matbedlihom 
$mail->Username = 'ab28fb@gmail.com';   // SMTP username -----//// hado khalihom matbedlihom 
$mail->Password = 'gputxcgsjgueloam';   // SMTP password -----//// hado khalihom matbedlihom 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;    
$mail->setFrom('sender@soumia.com', 'soumia'); 
$mail->addReplyTo('reply@soumia.com', 'soumia'); 
 

/* le code php de formulair cree un compte*/ 
$conn= mysqli_connect('localhost','root','','forminscription') or die(mysqli_error());
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$passwor = $_POST['password'];
$token=bin2hex(random_bytes(50));
//$hashd_password= md5($_POST['password']);






$req="INSERT INTO userinformation (nom,prenom,email,passwor,psudo,token) values('$nom','$prenom','$email','$passwor','$userName','$token')";


if($conn->query($req)===TRUE){
   
// Add a recipient //------ hna diri adress mail ta3ek bah tseyyiii 

$mail->addAddress($email); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'Email from Localhost by soumia'; 
 
// Mail body content 
$bodyContent ="<div style=\"font-family:Helvetica,Arial,sans-serif;font-size:16px;margin:0;color:#0b0c0c\">\n" .
"\n" .
"<span style=\"display:none;font-size:1px;color:#fff;max-height:0\"></span>\n" .
"\n" .
"  <table role=\"presentation\" width=\"100%\" style=\"border-collapse:collapse;min-width:100%;width:100%!important\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n" .
"    <tbody><tr>\n" .
"      <td width=\"100%\" height=\"53\" bgcolor=\"#0b0c0c\">\n" .
"        \n" .
"        <table role=\"presentation\" width=\"100%\" style=\"border-collapse:collapse;max-width:580px\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n" .
"          <tbody><tr>\n" .
"            <td width=\"70\" bgcolor=\"#0b0c0c\" valign=\"middle\">\n" .
"                <table role=\"presentation\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse\">\n" .
"                  <tbody><tr>\n" .
"                    <td style=\"padding-left:10px\">\n" .
"                  \n" .
"                    </td>\n" .
"                    <td style=\"font-size:28px;line-height:1.315789474;Margin-top:4px;padding-left:10px\">\n" .
"                      <span style=\"font-family:Helvetica,Arial,sans-serif;font-weight:700;color:#ffffff;text-decoration:none;vertical-align:top;display:inline-block\">Confirm your email</span>\n" .
"                    </td>\n" .
"                  </tr>\n" .
"                </tbody></table>\n" .
"              </a>\n" .
"            </td>\n" .
"          </tr>\n" .
"        </tbody></table>\n" .
"        \n" .
"      </td>\n" .
"    </tr>\n" .
"  </tbody></table>\n" .
"  <table role=\"presentation\" class=\"m_-6186904992287805515content\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse;max-width:580px;width:100%!important\" width=\"100%\">\n" .
"    <tbody><tr>\n" .
"      <td width=\"10\" height=\"10\" valign=\"middle\"></td>\n" .
"      <td>\n" .
"        \n" .
"                <table role=\"presentation\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse\">\n" .
"                  <tbody><tr>\n" .
"                    <td bgcolor=\"#1D70B8\" width=\"100%\" height=\"10\"></td>\n" .
"                  </tr>\n" .
"                </tbody></table>\n" .
"        \n" .
"      </td>\n" .
"      <td width=\"10\" valign=\"middle\" height=\"10\"></td>\n" .
"    </tr>\n" .
"  </tbody></table>\n" .
"\n" .
"\n" .
"\n" .
"  <table role=\"presentation\" class=\"m_-6186904992287805515content\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse;max-width:580px;width:100%!important\" width=\"100%\">\n" .
"    <tbody><tr>\n" .
"      <td height=\"30\"><br></td>\n" .
"    </tr>\n" .
"    <tr>\n" .
"      <td width=\"10\" valign=\"middle\"><br></td>\n" .
"      <td style=\"font-family:Helvetica,Arial,sans-serif;font-size:19px;line-height:1.315789474;max-width:560px\">\n" .
"        \n" .
"            <p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\">Hi " . $userName . ",</p><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\"> Thank you for registering. Please click on the below link to activate your account: </p><blockquote style=\"Margin:0 0 20px 0;border-left:10px solid #b1b4b6;padding:15px 0 0.1px 15px;font-size:19px;line-height:25px\"><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\"> <a href=/" . "\">Activate Now</a> </p></blockquote> <p>See you soon</p>" .
"        \n" .
"      </td>\n" .
"      <td width=\"10\" valign=\"middle\"><br></td>\n" .
"    </tr>\n" .
"    <tr>\n" .
"      <td height=\"30\"><br></td>\n" .
"    </tr>\n" .
"  </tbody></table><div class=\"yj6qo\"></div><div class=\"adL\">\n" .
"\n" .
"</div></div>"

; 

$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
} 


    echo "yessss";
}
else{
    echo "nooo";
}
?>