<?php
session_start();
if(!isset($_SESSION['pseudo']) || ( $_SESSION['admin']!=1 )){
    header('location:http://localhost/PFFE/login_System/regester.php');
  }
include_once 'includes/database-linck.php';
$conn;

$offreDel=$_GET['offreDel'];
$emai="SELECT OfferPoster FROM offers where idOffer='".$_GET['offreDel']."'";
$res_em=mysqli_query($conn,$emai);
echo $offreDel;
if(mysqli_num_rows($res_em)>0){
  while($eml=mysqli_fetch_assoc($res_em)){
   $res=$eml['OfferPoster'];
  }
   $req="INSERT INTO notification(la_Persones,icon,Subject,text) values('$res','icons8-travailler-avec-un-ordinateur-portable-90.png','Supprimer','Administrateur a Supprimer un Offre que vous avez poste')";
$res = mysqli_query($conn,$req);



}

$req="DELETE FROM offers WHERE idOffer='$offreDel'";
$res = mysqli_query($conn,$req);

                

 header('location: http://localhost/PFFE/admin/Administration.php');