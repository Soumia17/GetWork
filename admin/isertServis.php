<?php
session_start();

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
            }


                 if(!empty($_GET['del'])){
                 $del=$_GET['del'];
                 
              

                 $req="DELETE FROM services WHERE id='$del'";
                 $res = mysqli_query($conn,$req);
                 header('location: http://localhost/PFFE/admin/services.php');
                }

                 
                 
                 





                //header('location: http://localhost/PFFE/admin/services.php');


