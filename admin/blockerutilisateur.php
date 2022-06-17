<?php
session_start();
if(!isset($_SESSION['pseudo']) || ( $_SESSION['admin']!=1 )){
    header('location:http://localhost/PFFE/login_System/regester.php');
  }
include_once 'includes/database-linck.php';
$conn;

$blok_uti=$_GET['blok_uti'];


    echo $blok_uti;
   $req="UPDATE userinformation
   SET block =1
   WHERE psudo= '$blok_uti'";
   $res = mysqli_query($conn,$req);



   
     
  header('location: http://localhost/PFFE/admin/utilisateurs.php');