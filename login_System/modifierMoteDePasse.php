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
    <div  class="for2">
    <form onmousemove="onmous()"   id="form1" method="POST"  >
       <!-- <div class="inputDiv2">
            <img class="iconF2" src="https://img.icons8.com/material-outlined/24/000000/filled-message.png"/>
        <input  name="emailPass" onclick="onNpne()" type="email" id="emailPass"  class="inpForm" placeholder="donne votre email" >
    </div>-->
       
    <div class="inputDiv2">
        <img id="eyOP3" src="icons/oeil.png" alt="">
            <img id="eyCL3" src="icons/eyeC.png" alt="">
            <img id="eye" class="iconFS2" src="https://img.icons8.com/windows/50/000000/key-security.png"/>
        <input onclick="eyes()" class="inpP" name="passW" onclick="onCl()" type="password" id="password"  placeholder="neveau mot de passe"  class="inpForm" >
        </div>
        <div id="inputDiv3">
            <img id="eyOP4" src="icons/oeil.png" alt="">
                <img id="eyCL4" src="icons/eyeC.png" alt="">
                <img id="eye2" class="iconFS2" src="https://img.icons8.com/windows/50/000000/key-security.png"/>
            <input  onclick="eyes2()" class="inpP"  onclick="onCl()" type="password" id="passwordC"  placeholder="conferme le mot de passe"  class="inpForm" >
            </div>
            
            
       
    
            <div>
                <div class="imgS4">
                    <img src="icons/icons8-bunch-of-keys-30.png" alt="" >
                   
                    
                </div>
                <div class="imgSR2"><h3>neveau mote de passe</h3></div>
            </div>

            <dive class="but">
                <input id="sub2" name="suub"  type="submit" value="modifier">
            </div>
    </form>
   

</div>
<script src="forgetpassM.js"></script>

<?php
//$conn= mysqli_connect('localhost','root','','forminscription') or die(mysqli_error());
$conn;
//$Pass = $_POST['emailPass'];
if(isset($_GET['token']))
{
    
$token= $_GET['token'];
$qery="SELECT * FROM userinformation WHERE token='$token'";
$res= mysqli_query($conn,$qery);
$Dexprim=date("U");

while($resu = mysqli_fetch_assoc($res))
{
  $email= $resu['email'];
  $exprim= $resu['exprim'];

}


if(isset($email)==''|| $exprim <= $Dexprim ) {
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
    <script>
        swal({
  title: "Oooops!",
  text: "Le lien a expiré ou il manque quelque chose!",
  icon: "error",
  button: "d'accord!",
  
}).then(function(){
   window.location = " http://localhost/PFFE/login_System/Formulaire.html";
});

 
    </script>
    </body>
    </html>
    
    
    <?php
    }
//echo $token;
}
if(isset($_POST['suub'])){

   /* $user="SELECT forgetten FROM userinformation WHERE email ='".$Pass."'";
    $res= mysqli_query($conn,$user);
    if($res){
        echo "yess";
    }
    while($ro=mysqli_fetch_array($res)){
        $ot=$ro['forgetten'];
        
    }
    echo $ot;
    if($ot==1){*/



   // $emailPass = $_POST['emailPass'];
    $Pass = $_POST['passW']; 

    $sqlQ="UPDATE userinformation
    SET passwor='$Pass'
    WHERE email='$email'";
    $res= mysqli_query($conn,$sqlQ);

    $sqlQ="UPDATE userinformation
    SET token=''
    WHERE email='$email'";
    $rese= mysqli_query($conn,$sqlQ);


    

    if($res){
        ?>
       
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "ah oui!",
  text: "le mote de passe a ete modifier!",
  icon: "success",
  button: "d'accord!",
  
  
}).then(function(){
   window.location = " http://localhost/PFFE/login_System/Formulaire.html";
});


 
    </script>
        
        
        <?php
    }
    else{

        ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "Oooops!",
  text: "Le mot de passe n'a pas pu etre modifié!",
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