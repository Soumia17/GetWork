<?php
include_once 'includes/database-linck.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFormulair.css">
    <title>Document</title>
</head>
<body>
<header class="header">
  <a href="">LOGO</a>
  <form action="formulair.php" method="POST">
  <ul class="navbar">
    <li><input placeholder="entre pseudo ou email" name="pseudo" class="inpForgotPass"  type="text"></li>
    <li><input name="passW" placeholder="mot de passe" class="inpForgotPass"  type="password"></li>
    <button class="btn-Connexion">Connexion</button>
  </ul>
  </form>
    
    
    
    
 
</header>
    <div  class="for2">
    <form  onmouseover="onmous()" id="form1" method="POST" action="" >
        <div class="inputDiv2">
            <img class="iconF2" src="https://img.icons8.com/material-outlined/24/000000/filled-message.png"/>
        <input name="emailPass" onclick="onC()" type="email" id="emailPass"  class="inpForm" placeholder="donne votre email" >
    </div>
    <dive class="but">
       
        <input id="sub2" name="suub"  type="submit" value="Envoyer un mail de réinitialisation ">
        <img src="icons/icons8-envoi-de-courriel-30.png" alt="">

    </dive>

    </form>
    <div>
        <div class="imgS4">
            <img src="icons/icons8-bunch-of-keys-30.png" alt="" >
        </div>
        <div class="imgSR2"><h3>Mot de passe oublié</h3></div>
    </div>

</div>

<script src="email.js"></script>

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
//$mail->Username = 'ab28fb@gmail.com';   // SMTP username -----//// hado khalihom matbedlihom 
//$mail->Password = 'gputxcgsjgueloam';   // SMTP password -----//// hado khalihom matbedlihom 
$mail->Username = 'mustapha.stambouli29m@gmail.com';
$mail->Password = 'aqomztvlzlvldtjm';
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;    
$mail->setFrom('sender@soumia.com', 'soumia'); 
$mail->addReplyTo('reply@soumia.com', 'soumia'); 
 

/* le code php de formulair cree un compte*/ 
//$conn= mysqli_connect('localhost','root','','forminscription') or die(mysqli_error());
$conn;
if(isset($_POST['suub'])){
$emailPass = $_POST['emailPass'];



$emailPass_suery="SELECT * FROM userinformation WHERE email ='$emailPass'";
$user=  "SELECT nom FROM userinformation WHERE email ='$emailPass'";
$res= mysqli_query($conn,$user);
$userName=mysqli_fetch_row($res);
$emailPass_suery_run=mysqli_query($conn,$emailPass_suery);





if(mysqli_num_rows($emailPass_suery_run) >0 ){
 
    $token = bin2hex(random_bytes(50));
    $sqlQ="UPDATE userinformation
    SET token='$token'
    WHERE email='$emailPass'";
    $res= mysqli_query($conn,$sqlQ);

    $exprim=date("U") + 600;
    
    $sql="UPDATE userinformation
    SET exprim='$exprim'
    WHERE email='$emailPass'";
    $res= mysqli_query($conn,$sql);


$mail->addAddress($emailPass); 
 
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
"                      <span style=\"font-family:Helvetica,Arial,sans-serif;font-weight:700;color:#ffffff;text-decoration:none;vertical-align:top;display:inline-block\">modifier mote de passe</span>\n" .
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
"            <p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\">Hi " . implode('|',$userName)  . "  ,</p><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\">Veuillez cliquer sur le lien ci-dessous pour modifier les mots de passe : </p><blockquote style=\"Margin:0 0 20px 0;border-left:10px solid #b1b4b6;padding:15px 0 0.1px 15px;font-size:19px;line-height:25px\"><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\"> <a href=\"http://localhost/PFFE/login_System/modifierMoteDePasse.php?token=".$token."\"" . "\">modifier les mote de passe</a> </p></blockquote> <p>See you soon</p>" .
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
    //echo 'Message has been sent.'; 
    //header('location: http://localhost/PFFE/yess.html');
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 
    </style>
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "Le message a été envoyé!",
  text: "Vérifiez votre e-mail!",
  icon: "success",
  button: "d'accord!",
  
  
});


 
    </script>
</body>
</html>
    
    <?php
   
   // header('location: http://localhost/PFFE/forgetPassword.html');

 
   

} 


   
}
else{
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 
    </style>
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "Le message n'a pas pu être envoyé,le mail n'existe pas ou il manque quelque chose!",
  text: "réessaye à nouveau!",
  icon: "error",
  button: "d'accord!",
  
});

 
    </script>
</body>
</html>
    
    <?php
}



}
?> 
</body>
</html>