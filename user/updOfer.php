<?php

session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
if(isset($_POST['save'])){
    $OfferDescription=$_POST['OfferDescription'];
    $OfferCategore=$_POST['OfferCategore'];
    $OfferPrix=$_POST['OfferPrix'];
    $OfferImage=$_POST['OfferImage'];

    $re="UPDATE offers
    SET  OfferDescription= '".$OfferDescription."',OfferCategore= '".$OfferCategore."',OfferPrix= '".$OfferPrix."'
    WHERE idOffer='".$_SESSION['off']."'";
    $res = mysqli_query($conn,$re);

    if($OfferImage!=""){
        $re="UPDATE offers
    SET  OfferImage= '".$OfferImage."'
    WHERE idOffer='".$_SESSION['off']."'";
    $res = mysqli_query($conn,$re);
    if($res){
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
<script>swal( "L'offre a été modifie avec succès","", "success").then(function(){
       window.location= "../user/userProfil.php"
   });</script>

        </body>
        </html>
        <?php
    }
    
    }


  header('location: http://localhost/PFFE/user/modifierOffer.php?OffMO='.$_SESSION['off'].'');

}

if(isset($_POST['dellet'])){
    $re="DELETE from offers WHERE idOffer='".$_SESSION['off']."'";
    $res = mysqli_query($conn,$re);
    header('location: http://localhost/PFFE/user/userProfil.php');
}
}
?>