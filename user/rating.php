<?php
session_start();

if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
if(!empty($_POST['rating'])){
$eval=$_POST['rating'];
$evalTo=$_SESSION['post'];
$evalFrom=$_SESSION['user'];

$ins="INSERT INTO evaleuation(Eval,EvalTo,EvalFrom)VALUE('$eval','$evalTo','$evalFrom')";
$insr=mysqli_query($conn,$ins);

header('location:http://localhost/PFFE/user/userview.php');


}
}