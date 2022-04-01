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
    //$OfferImage=$_POST['OfferImage'];
    $file=$_FILES['OfferImage']['name'];
    $OfferPoster=$_SESSION['user'];
    $req="INSERT INTO offers(OfferDescription,OfferCategore,OfferPrix,OfferImage,OfferPoster) values('$OfferDescription','$OfferCategore','$OfferPrix','$file','$OfferPoster')";
    mysqli_query($conn,$req);
    move_uploaded_file($_FILES['OfferImage']['tmp_name'],$file);
    header('location: http://localhost/PFFE/user/addOffer.php');
}

}
?>