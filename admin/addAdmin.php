 <?php
session_start();
include_once 'includes/database-linck.php';
$conn;
                 
                 $newAd=$_GET['newAD'];
                 $date=date("j, n, Y");
                 $addby=$_SESSION['user'];
             
                 $req="SELECT pseudoo from admin WHERE pseudoo='".$newAd."' ";
                 $res = mysqli_query($conn,$req);

if(mysqli_num_rows($res)>0){
                

 
               ?>
               <!DOCTYPE html>
               <html lang="en">
               <head>
                   <meta charset="UTF-8">
                   <meta http-equiv="X-UA-Compatible" content="IE=edge">
                   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                   <title>Document</title>
               </head>
               <body>
               <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script  >
           //alert("Admin existe deja");
           swal("Admin existe deja!").then(function(){
               window.location= "http://localhost/PFFE/admin/lesAdmin.php"
           });
        </script>
               </body>
               </html>
            <?php

            }
            else{
               $req="INSERT INTO  admin(pseudoo,adminDate,addBy)values('$newAd','$date','$addby')";
               $res = mysqli_query($conn,$req);
               $req="UPDATE userinformation
               SET Theadmin =1
               WHERE psudo= '$newAd'";
               $res = mysqli_query($conn,$req);
               

               header('location: http://localhost/PFFE/admin/lesAdmin.php');         
            }

            
                 
                 
              





               
