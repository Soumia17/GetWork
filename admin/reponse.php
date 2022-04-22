<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();                      // Set mailer to use SMTP -----//// hado khalihom matbedlihom 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers -----//// hado khalihom matbedlihom 
$mail->SMTPAuth = true;               // Enable SMTP authentication -----//// hado khalihom matbedlihom 
$mail->Username = 'mustapha.stambouli29m@gmail.com';
$mail->Password = 'aqomztvlzlvldtjm';  // SMTP password -----//// hado khalihom matbedlihom 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;    
$mail->setFrom('sender@soumia.com', 'admin'); 
$mail->addReplyTo('reply@soumia.com', 'admin'); 
 
if(!isset($_SESSION['pseudo'])){
  header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
if(!empty($_GET['send'])){
$msg=$_GET['send'];
$upd="UPDATE messages set lire=1 where idemail ='".$msg."'";
mysqli_query($conn,$upd);
// $action="SELECT * FROM userinformation where psudo='".$msg."'";
//     $offr = mysqli_query($conn,$action);
//     while($email=mysqli_fetch_assoc($offr)){

// $eml=$email['email'];

//     }

$action="SELECT * FROM messages where idemail='".$msg."'";
    $offr = mysqli_query($conn,$action);
    while($email=mysqli_fetch_assoc($offr)){

$eml=$email['emailEmeteur'];

    }

 
if(isset($_POST['envoye'])){

  
    $message=$_POST['mess'];

$mail->addAddress($eml); 
$mail->isHTML(true);
$mail->Subject = 'Email from GETWORK by admin';
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
"                      <span style=\"font-family:Helvetica,Arial,sans-serif;font-weight:700;color:#ffffff;text-decoration:none;vertical-align:top;display:inline-block\">aide d'administration</span>\n" .
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
"            <p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\">merci de nous contacter " .$msg. "  ,</p><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\">  ".$message. " </p><blockquote style=\"Margin:0 0 20px 0;border-left:10px solid #b1b4b6;padding:15px 0 0.1px 15px;font-size:19px;line-height:25px\"><p style=\"Margin:0 0 20px 0;font-size:19px;line-height:25px;color:#0b0c0c\"></p></blockquote> <p>À bientôt</p>" .
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
if($mail->send()) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "Le message a été envoyé",
 
  icon: "success",
  button: "d'accord!",
  
  
});


 
    </script>
    </body>
    </html>
    <?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Administration.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="style_messages.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../login_System/logoStyle.css">
   


    <title>Document</title>
</head>
<body>   
        <header class="page-header">
          <nav>
            
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="admin-menu">
              <!--<a href="">LOGO</a>-->
              <center> <div class="left">
                <span class="greeting">Bonjour  <?php echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="../user/<?php echo ($_SESSION['img']);?>" alt="profile_img">
                  </div></center>
              <li class="menu-heading">

                <h3>Admin</h3>
              </li>
              
                <li>
                  <a href="http://localhost/PFFE/admin/Administration.php">
                    
                    <i class="fas fa-home"></i>
                    
                    <span>Accueil</span>
                  </a>
                </li>
                <li>
                <a href="http://localhost/PFFE/admin/lesAdmin.php">
                  
                  <i class="fas fa-user-shield"></i>
                  
                  <span>Administrateurs</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/utilisateurs.php">
                  <i class="fas fa-users"></i>
                  <span>utilisateurs</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/Message.php">
                  <i class="far fa-comments"></i>
                  <span>Message</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/services.php">
                  <i class="fas fa-briefcase"></i>
                  <span>Services</span>
                </a>
              </li>
             
             
              <li>
                <div class="switch">
                  <input type="checkbox" id="mode" checked>
                  <label for="mode">
                    <span></span>
                    <span>Dark</span>
                  </label>
                </div>
                <a href="http://localhost/PFFE/admin/Acceui_Admin.php">
                  
                  <i class="fas fa-sign-out-alt"></i>
                  <span>sortir de l'dministration</span>
                </a>
                <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                  <i class="fas fa-chevron-left"></i>
                  <span>Effondrer</span>
                </button>
              </li>
            </ul>
          </nav>
        </header>
        <section class="page-content">
          <section class="search-and-user">
                  <!-- <form action="GET">
                  <input type="search" placeholder="Chercher...">
                  <button type="submit" aria-label="submit form">
                    <i class="fas fa-search"></i>
                  </button>

                </form>-->
                
                <div class="admin-profile">
                 <!-- <span class="greeting">Bonjour  <?php //echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php //echo ($_SESSION['img'//]);?>" alt="profile_img">-->
                  
              <div class="notifications">
               <!-- <span class="badge">1</span>-->
                <svg>
                  <use xlink:href="#users"></use>
                </svg>
              </div>
            </div>
          </section>
          <div class=" shadow-none mt-3 border border-light">
               <div class="card-body">
                 <div class="media mb-3">
                 <?php
                                        $mess="SELECT * FROM messages where idemail='".$msg."'  ";
                                        $mess = mysqli_query($conn,$mess);
                                        
                                        while($mes=mysqli_fetch_assoc($mess)){
                                          // $mesimg="SELECT * FROM userinformation where psudo='".$mes['emetteur']."'  ";
                                          // $m = mysqli_query($conn,$mesimg);
                                          // while($me=mysqli_fetch_assoc($m)){
                                          //   $img=$me['image'];
                                          // }
                                        
                                        ?>
                   <!-- <img src="../user/<?php //echo $img?>" class="rounded-circle mr-3 mail-img shadow" alt="media image"  width="100" height="100"> -->
                     <div class="media-body">
                       
                        <span class="media-meta float-right"><?php echo $mes['dateMess']  ?></span>
                        <h1>Message</h1>
                        <h4 class="text-primary m-0"><?php echo $mes['emetteur'] ?></h4>
                       <br>
                       
                       
                        
                       
                        <br>
                      </div>
                  </div> <!-- media -->

                  
                  <p><?php echo $mes['messag']?></p>
<?php
                                        }
?>

                  <hr>
                  <br>
                  
<form action="" method="POST">
                  <div class="media mt-3">
                      <a href="javascript:void();" class="media-left">
                          <img alt="" src="../user/<?php echo ($_SESSION['img']);?>" width="50" height="50">
                      </a>
                   
                      <div class="media-body">
                          <textarea name="mess" class="wysihtml5 form-control" rows="9" placeholder="Répondez ici..."></textarea>
                      </div>
                  </div>
                  <div class="text-right">
                      <button  name="envoye" type="submit" class=" btn-primary waves-effect waves-light mt-3"><i class="fa fa-send mr-1"></i> envoyer</button>
                  </div>
             
                                    </form>
              </div>
            </div> <!-- card -->
        </div> <!-- end Col-9 -->
                    
                    </div>
         

        </section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<script src="Control_Admin.js"></script>


</html>

<?php
}
else{
  header("Location:../error.html"); 
}

}

?>