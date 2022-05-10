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
    }

 //  header('location: http://localhost/PFFE/user/modifierOffer.php?OffMO='.$_SESSION['off'].'');

}

if(isset($_POST['dellet'])){
    $re="DELETE from offers WHERE idOffer='".$_SESSION['off']."'";
    $res = mysqli_query($conn,$re);
    header('location: http://localhost/PFFE/user/userProfil.php');
}
}
?>