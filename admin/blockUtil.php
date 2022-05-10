<?php
session_start();

include_once 'includes/database-linck.php';
$conn;

$blockUtil=$_GET['blockUtil'];

$req="DELETE FROM offers WHERE OfferPoster='$blockUtil' ";
$res = mysqli_query($conn,$req);
$req="DELETE FROM admin WHERE emailAD ='$blockUtil' ";
$res = mysqli_query($conn,$req);
$req="DELETE FROM evaleuation WHERE EvalFrom ='$blockUtil' ";
$res = mysqli_query($conn,$req);
$req="DELETE FROM favori WHERE saveforH ='$blockUtil' ";
$res = mysqli_query($conn,$req);
$req="DELETE FROM messages WHERE emailEmeteur ='$blockUtil' ";
$res = mysqli_query($conn,$req);
$re="UPDATE userinformation
SET  block=1
WHERE email='".$blockUtil."'";
$res = mysqli_query($conn,$re);

header('location: http://localhost/PFFE/admin/Administration.php');