<?php
session_start();
include_once 'includes/database-linck.php';
$conn;

$admin_del=$_GET['del_ad'];


    $req="DELETE  from admin where emailAD ='$admin_del'";
   $res = mysqli_query($conn,$req);
   if($res){
       echo ('yess');
   }
   else echo("non");
   $req="UPDATE userinformation
   SET Theadmin =2
   WHERE 	email = '$admin_del'";
   $res = mysqli_query($conn,$req);



     
     
   header('location: http://localhost/PFFE/admin/lesAdmin.php#con');