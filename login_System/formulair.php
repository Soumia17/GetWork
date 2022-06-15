
<?php 
session_start();
include_once 'includes/database-linck.php';

/* le code php de formulair entre au compte*/ 

//$conn= mysqli_connect('localhost','root','','forminscription') or die(mysqli_error());
$conn;
//if(isset($_POST['pseudo'])){
    //$uname=$_POST['pseudo'];
    $passwo=$_POST['passW'];
    $email=$_POST['pseudo']; 

    $hashd_password= md5($_POST['passW']);
    //$sql="SELECT * from userinformation WHERE psudo ='".$uname."'AND passwor='".$hashd_password."'
    //limit 1";
    $sql1="SELECT * from userinformation where email ='".$email."'AND passwor='".$hashd_password."'
    limit 1";
     // mysqli_num_rows($result1)==1

   // $result=mysqli_query($conn,$sql); mysqli_num_rows($result)==1 ||
    $result1=mysqli_query($conn,$sql1);
    



    if(mysqli_num_rows($result1)==1){
        
            while($g=mysqli_fetch_assoc($result1)){
                $admin=$g['Theadmin'];
                $block=$g['block'];

            }
            if($block==1){
                ?>

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
                    <link rel="stylesheet" href="../login_System/logoStyle.css">
                    <title>getWork</title>
                </head>
                <body>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         
         <script  >
            //alert("email existe deja");
            swal("le compte spécifié n’existe pas!").then(function(){
                window.location= "http://localhost/PFFE/login_System/Connexion.php"
            });
         </script>
                </body>
                </html>
            
            
            <?php

            }
            
        else{
       if($admin==1 || $admin==0){
            $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['passW'] = $passwo;
        $_SESSION['admin']=1;
        $action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."'";
    $adm = mysqli_query($conn,$action);
    while($info=mysqli_fetch_assoc($adm)){
$admi=$info['Theadmin'];
$_SESSION['user']=$info['psudo'];
$_SESSION['img']=$info['image'];
$_SESSION['dat']=$info['userDate'];
$_SESSION['phone']=$info['phone'];

    }
     if(isset($_GET['Slike'])){ 
        header('location: http://localhost/PFFE/user/userview.php?idPOS='.$_GET['Slike'].'');
     }else{
        header('location: http://localhost/PFFE/admin/Acceui_Admin.php');
     }
        echo"yesssss";
        exit();
        }
        

        else{
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['passW'] = $passwo;
        $_SESSION['admin']=0;
        $action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."'";
    $adm = mysqli_query($conn,$action);
    while($info=mysqli_fetch_assoc($adm)){
$admi=$info['Theadmin'];
$_SESSION['user']=$info['psudo'];
$_SESSION['img']=$info['image'];
$_SESSION['dat']=$info['userDate'];
$_SESSION['phone']=$info['phone'];

    }
    if(isset($_GET['Slike'])){ 
        header('location: http://localhost/PFFE/user/userview.php?idPOS='.$_GET['Slike'].'');
     }else{
        header('location: http://localhost/PFFE/admin/Acceui_Admin.php');
     }
        echo"yesssss";
        exit();
    }}
    }
    else{
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>getWork</title>
        </head>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 <script  >
    //alert("email existe deja");
    swal("le compte spécifié n’existe pas!").then(function(){
<?php

        if(isset($_GET['Slike'])){ ?>
            window.location= "http://localhost/PFFE/login_System/Connexion.php?idPOS=<?php echo $_GET['Slike'] ?>"
     <?php 
     }else{
         
         ?>
        window.location= "http://localhost/PFFE/login_System/Connexion.php"
       <?php 
     }
       ?>
    });
 </script>
        </body>
        </html>
    
    
    <?php
    }

      //  header('location: http://localhost/PFE/Connexion.php');
    /*
    $raw =mysqli_fetch_array($result);
    

    if(is_array($raw)){
        $_SESSION["uname"]= $raw ['userName'];
        $_SESSION["passwo"]= $raw ['passwor'];

    }

    if(isset($_SESSION["uname"])){
        header('location: http://localhost/PFE/profil.php');
        echo"yesssss";
        
    }*/

//}

?>