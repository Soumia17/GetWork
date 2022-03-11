<?php
session_start();

if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;


    
    
        $re="UPDATE userinformation
    SET  image= '".$_POST['newImag']."'
    WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    $_SESSION['img']=$_POST['newImag'];
   
}


