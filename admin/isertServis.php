<?php
session_start();
if(!isset($_SESSION['pseudo']) || ( $_SESSION['admin']!=1 )){
    header('location:http://localhost/PFFE/login_System/regester.php');
  }
include_once 'includes/database-linck.php';
$conn;
if (isset($_POST["serviceName"])){
$serviceName=$_POST['serviceName'];
                $serviceDescription=$_POST['serviceDescription'];
                //$serviceIcon='./images_Admin/'.$_POST['serviceIcon'];
                $file=$_FILES['serviceIcon']['name'];
               

                $req="INSERT INTO services(serviceName,serviceDescription,serviceIcon) values('$serviceName','$serviceDescription','$file')";
                
                mysqli_query($conn,$req);

                move_uploaded_file($_FILES['serviceIcon']['tmp_name'],$file);
                // $emai="SELECT email FROM userinformation";
                // $res_em=mysqli_query($conn,$emai);
                // if(mysqli_num_rows($res_em)>0){
                //   while($eml=mysqli_fetch_assoc($res_em)){
                //     $req="INSERT INTO notification(la_Persones,icon,Subject,text) values('".$eml['email']."','fas fa-briefcase','Ajouter','Administrateur a ajouté un nouveau service')";
                //     mysqli_query($conn,$req);
                //   }
                // }
              
                header('location: http://localhost/PFFE/admin/services.php');
            }


                 if(!empty($_GET['del'])){
                 $del=$_GET['del'];
                 
              

                 $req="DELETE FROM services WHERE serviceName='$del'";
                 $res = mysqli_query($conn,$req);
                
                 header('location: http://localhost/PFFE/admin/services.php');
                }

                 
                 
                 





                //header('location: http://localhost/PFFE/admin/services.php');


