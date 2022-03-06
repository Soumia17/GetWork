<?php

session_start();
include_once '../includes/database-linck.php';
$conn;


if(isset($_POST['save'])){
    $OfferDescription=$_POST['OfferDescription'];
    $OfferCategore=$_POST['OfferCategore'];
    $OfferPrix=$_POST['OfferPrix'];
    $OfferImage=$_POST['OfferImage'];
    $OfferPoster=$_SESSION['user'];
    $req="INSERT INTO offers(OfferDescription,OfferCategore,OfferPrix,OfferImage,OfferPoster) values('$OfferDescription','$OfferCategore','$OfferPrix','$OfferImage','$OfferPoster')";
    mysqli_query($conn,$req);
    header('location: http://localhost/PFFE/user/addOffer.php');
}


?>