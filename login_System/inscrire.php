<?php
session_start();
include_once 'includes/database-linck.php';


 
$conn;







/* le code php de formulair cree un compte*/ 
//$conn= mysqli_connect('localhost','root','','pfe') or die(mysqli_error());

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$passwor = $_POST['password'];
//$token=bin2hex(random_bytes(50));
$hashd_password= md5($_POST['password']);

$email_query="SELECT * FROM userinformation WHERE email ='$email'";
$psudo_suery="SELECT * FROM userinformation WHERE psudo ='$userName'";
$psudo_suery_run=mysqli_query($conn,$psudo_suery);
$email_query_run=mysqli_query($conn,$email_query);
if(mysqli_num_rows($email_query_run)>0 || mysqli_num_rows($psudo_suery_run)>0 ){
    if(mysqli_num_rows($email_query_run)>0){
    ?>
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

<script  >
   //alert("email existe deja");
   swal("email existe deja!").then(function(){
       window.location= "http://localhost/PFFE/login_System/regester.php"
   });
</script>
       </body>
       </html>
    <?php

        }
 
     if(mysqli_num_rows($psudo_suery_run)>0){?>
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

<script  >
   //alert("email existe deja");
   swal("pseudo existe deja!").then(function(){
       window.location= "http://localhost/PFFE/login_System/regester.php"
   });
</script>
       </body>
       </html>
         <?php
         }

         
         
 
 }


else{

$req="INSERT INTO userinformation(nom,prenom,email,passwor,psudo) values('$nom','$prenom','$email','$hashd_password','$userName')";

if($conn->query($req)===TRUE){
    $_SESSION['pseudo'] = $email;
    $_SESSION['admin']=2;
    header('location: http://localhost/PFFE/admin/Acceui_Admin.php');

}
}
