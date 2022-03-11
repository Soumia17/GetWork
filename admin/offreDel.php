<?php
session_start();

include_once 'includes/database-linck.php';
$conn;

$offreDel=$_GET['offreDel'];

$req="DELETE FROM offers WHERE idOffer='$offreDel'";
$res = mysqli_query($conn,$req);

header('location: http://localhost/PFFE/admin/Administration.php');