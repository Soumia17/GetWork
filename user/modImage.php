<?php
session_start();
include_once '../includes/database-linck.php';
$conn;


    
    
        $re="UPDATE userinformation
    SET  image= '".$_POST['newImag']."'
    WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    $_SESSION['img']=$_POST['newImag'];
   



