<?php
session_start();

include_once 'includes/database-linck.php';
$conn;

$blockUtil=$_GET['blockUtil'];

$req="DELETE FROM offers WHERE OfferPoster='$blockUtil' ";
$res = mysqli_query($conn,$req);

$re="UPDATE userinformation
SET  block=1
WHERE psudo='".$blockUtil."'";
$res = mysqli_query($conn,$re);

header('location: http://localhost/PFFE/admin/Administration.php');