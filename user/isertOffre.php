<?php

session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;


if(isset($_POST['save'])){
    $OfferDescription=addslashes($_POST['OfferDescription']);
    $OfferCategore=$_POST['OfferCategore'];
    $OfferPrix=$_POST['OfferPrix'];
    //$OfferImage=$_POST['OfferImage'];
    $file=$_FILES['OfferImage']['name'];
    $OfferPoster=$_SESSION['pseudo'];
   
    $req="INSERT INTO offers(OfferDescription,OfferCategore,OfferPrix,OfferImage,OfferPoster) values('$OfferDescription','$OfferCategore','$OfferPrix','$file','$OfferPoster')";
    $res=mysqli_query($conn,$req);
    move_uploaded_file($_FILES['OfferImage']['tmp_name'],$file);
   

    if($res){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
            <title>getWork</title>
        </head>
        <body>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal( "","Supprimé avec succès", "success");</script>

        </body>
        </html>
        <?php
    }
    
}

}
?>