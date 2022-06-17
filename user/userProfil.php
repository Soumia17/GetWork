<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;

/*if(isset($_POST['upPH'])){
    if($_POST['newImag']!=""){
        $img="../admin/images_Admin/".$_POST['newImag'];
        $re="UPDATE userinformation
    SET  image= '".$img."'
    WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    $_SESSION['img']=$img;
    }
}*/
if(isset($_POST['upPH'])){
    if(!empty($_FILES['newImag']['name'])){
        $file=$_FILES['newImag']['name'];
        $re="UPDATE userinformation
    SET  image='".$file."'
    WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    move_uploaded_file($_FILES['newImag']['tmp_name'],$file);
    $re="SELECT image FROM userinformation WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    while($f=mysqli_fetch_assoc($res)){
        $m=$f['image'];
    }
    $_SESSION['img']=$m;
    
}}

if(isset($_POST['up'])){
    if($_POST['newPseudo']!=""){
    $psudo_suery="SELECT * FROM userinformation WHERE psudo ='".$_POST['newPseudo']."'";
    $psudo_suery_run=mysqli_query($conn,$psudo_suery);
    if(mysqli_num_rows($psudo_suery_run)>0){?>

    
        <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>getWork</title>
     </head>
     <body>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script  >
 //alert("email existe deja");
 swal("pseudo existe deja!");
</script>
     </body>
     </html>
       <?php
       }
       else{

    $re="UPDATE userinformation
    SET  psudo= '".$_POST['newPseudo']."'
    WHERE email='".$_SESSION['pseudo']."'";
    $res = mysqli_query($conn,$re);
    
    $re="UPDATE offers
    SET  OfferPoster= '".$_POST['newPseudo']."'
    WHERE OfferPoster='".$_SESSION['user']."'";
    $res = mysqli_query($conn,$re);
    $_SESSION['user']=$_POST['newPseudo'];
}
}}
if(isset($_GET['del'])){
    $OffMO=$_GET['del'];
   
           $re="DELETE from offers WHERE idOffer='".$OffMO."'";
           $res = mysqli_query($conn,$re);
           if($res){
               ?>
               <!DOCTYPE html>
               <html lang="en">
               <head>
                   <meta charset="UTF-8">
                   <meta http-equiv="X-UA-Compatible" content="IE=edge">
                   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                   <title>getWork</title>
               </head>
               <body>
               <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>swal( "","Supprimé avec succès", "success");</script>

               </body>
               </html>
               <?php
           }
         
  
}

$Offer="SELECT * FROM offers WHERE OfferPoster ='".$_SESSION['pseudo']."'";
            $Offer_run=mysqli_query($conn,$Offer);


        //     $ofstar="SELECT Eval FROM evaleuation WHERE EvalTo ='".$_SESSION['user']."'";
        //     $ofstar_run=mysqli_query($conn,$ofstar);
        //     if(mysqli_num_rows($ofstar_run)>0){
        //     $w=$t=$th=$f=$fi=$max=0;
        //     while($star=mysqli_fetch_assoc($ofstar_run)){
        //         if($star['Eval']==1)
        //         $w=$w+1;
        //         else
        //         if($star['Eval']==2)
        //         $t=$t+1;
        //         else
        //         if($star['Eval']==3)
        //         $th=$th+1;
        //         else
        //         if($star['Eval']==4)
        //         $f=$f+1;
        //         else
        //         if($star['Eval']==5)
        //         $fi=$fi+1;



        //     } 
        //     if($w>=$t && $w>=$th && $w>=$f && $w>=$fi){
        //         $max=1;
        //     }
        //      else if($t>=$w && $t>=$th && $t>=$f && $t>=$fi){
        //         $max=2;
        //     }
        //    else if($th>=$t && $th>=$w && $th>=$f && $th>=$fi){
        //         $max=3;
        //     }
        //     else if($f>=$t && $f>=$th && $f>=$w && $f>=$fi){
        //         $max=4;
        //     }
        //     else if($fi>=$t && $fi>=$th && $fi>=$w && $fi>=$w){
        //         $max=5;
        //     }
        // }
        // else
        // $max=0; 
        
       
           
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>">
   <!-- <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="style_profil.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../admin/StyleService.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <title>getWork</title>
   
</head>
<body >

    <header class="header">
  
        <div class="wrapper">
            <div class="navbar">
                <div class="logo">
                    <a href="../admin/Acceui_Admin.php">getWork</a>
                </div>
                <!-- <div class="serch">
                <form action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
                <div class="box-recherch">
              <i class="fa fa-search" aria-hidden="true"></i>
                <input name="search" placeholder="trouver des services" id="input-Rechercher" type="text">
                <button id="button-Rechercher">Rechercher</button>
              </div>
                
            </form>
            </div> -->
            <form class="example" action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
  <input type="text" placeholder="quel service recherchez-vous aujourd'hui ?
" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li">
                            <!--<i class="fas fa-plus"></i>-->
                        </li>
                       
    
                        <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="../admin/Administration.php" id="shield"> entre à l'administration <i class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                        
                       
                        <!-- <li class="nr_li">
                            <i class="fas fa-envelope-open-text"></i>
                        </li> -->
                        
                        <li class="nr_li dd_main">
                  
    
                            <img class="image_profil"  src="<?php echo ($_SESSION['img']);?>" alt="profile_img">
                            
                            <div class="dd_menu">
                                <div class="dd_left">
                                    <ul>
                                        <li><i class="far fa-user"></i></li>
                                       <!-- <li><i class="fas fa-user-shield"></i></li>-->
                                        <li><i class="fas fa-bookmark"></i></li>
                                        
                                        <li><i class="fas fa-cog"></i></li>
                                        
                                        <li><i class="fas fa-sign-out-alt"></i></li>
                                    </ul>
                                </div>
                                <div class="dd_right">
                                    <ul>
                                    <a href="../user/userProfil.php"> <li>Profil</li></a>   
                                  <!-- <a href="Administration.php"> <li>Administration</li></a>-->
                                   <a href="../user/favorites.php"> <li>Favorites</li> </a>               
                                   <a href="../user/Parametres.php"> <li>Paramètres</li> </a>
                                   <a href=" http://localhost/PFFE/admin/deconnextion.php"><li>Deconnextion</li></a>      
                                    
                                    </ul>
                                </div>
                            </div>
                            <span><?php echo  $_SESSION['user'] ?></span>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>	
    
          
          
          
          
          
       
      </header>

    <div class="cont">
        <div class="roww profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                   
                    <!-- END MENU -->

                    
                           
                            <div class="card-block">
                                <div  class="user-image">
                                    <form action="userProfil.php" method="POST" enctype="multipart/form-data">
                                    <img  src="<?php echo $_SESSION['img'];?>" id="photo">
                                    <input name="newImag" onclick="document.getElementById('upPhoto').style.display='block';" type="file" id="file">
                                    <label for="file" id="uploadBtn">Choisir une Photo</label>
                                    
                                </div>
                                <div style="display: none; " id="upPhoto" >
                                <button onclick="document.getElementById('upPhoto').style.display='none';"  id="cancel1" >Annuler</button>
                                <button name="upPH" id="update1">Modifier</button>
                                </div>
                                </form>
                                <h6 class="f-w-600 m-t-25 m-b-10"><?php echo ($_SESSION['user']); ?></h6>
                               <center> <button id="icon_change_pseudo" onclick="document.getElementById('btn_new_pseudo').style.display='block'; document.getElementById('new_pseudo').style.display='block';document.getElementById('icon_change_pseudo').style.display='none';" > <img src="https://img.icons8.com/ios-glyphs/30/000000/pencil--v1.png"/></button></center>
                               <div id="anulle">
                                   <form action="userProfil.php" method="POST">
                               <center> <input value=<?php echo ($_SESSION['user']); ?> name="newPseudo" style="display: none;" type="text" id="new_pseudo" placeholder="entre le neveu pseudo" ></center><br>
                                <div class="btn_new_pseudo" id="btn_new_pseudo" style="display: none;">
                                <button  id="cancel" onclick="document.getElementById('btn_new_pseudo').style.display='none'; document.getElementById('new_pseudo').style.display='none';document.getElementById('icon_change_pseudo').style.display='block';">Annuler</button>
                                <button name="up" id="update">Modifier</button>
                                </form>
                            </div>
                            </div>
                               
                                <p class="text-muted">Membre depuis : <?php  echo $_SESSION['dat'] ;?></p>
                                <hr>
                                <p class="text-muted m-t-15">Pour plus d'information contactez moi par :</p>
                                <div class="email details">
                                    <i class="fas fa-envelope"></i>
                                    <div class="topic">Email</div>
                                    <div class="text-one"><?php echo $_SESSION['pseudo']?></div>
                                   
                                  </div>
                                   
                                    <div class="phone details">
                                      <i class="fas fa-phone-alt"></i>
                                      <div class="topic">Phone</div>
                                      <div class="text-one"><?php echo $_SESSION['phone']?></div>
                                      
                                    </div>

                                   
                                   
                                  
                                <p class="text-muted m-t-15">nombre des offeres : <?php echo mysqli_num_rows($Offer_run);?></p>
                               <!-- <div class="bg-c-blue counter-block m-t-10 p-20">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="fa fa-comment"></i>
                                            <p>1256</p>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-user"></i>
                                            <p>8562</p>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-suitcase"></i>
                                            <p>189</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <hr>
                                <div class="row justify-content-center user-social-link">
                                    <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                    <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                    <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                                </div>-->
                            </div>
                        </div>
                  
            </div>

            <?php
            
            
            if(mysqli_num_rows($Offer_run)==0){

            ?>
           <div class="">
                <div class="profile-content">
                   <p class="p"> Il semble que vous n'ayez aucune vue active. Mettez-vous en vente !</p>
                  <a href="addOffer.php"> <button class="button" >commencez maintenant</button></a>


                 



                  
                </div>
                
                

                <?php
            }
            else{
                ?>
                <div class="main">
                <a href="addOffer.php"> <button class="button1" > <i class="fas fa-plus"></i> Ajoute un Offer</button></a>
                <?php
                

                while($g=mysqli_fetch_assoc($Offer_run)){
                    $ofstar="SELECT Eval FROM evaleuation WHERE  numoff ='".$g['idOffer']."'";
                    $ofstar_run=mysqli_query($conn,$ofstar);
                    if(mysqli_num_rows($ofstar_run)>0){
                    $w=$t=$th=$f=$fi=$max=0;
                    while($star=mysqli_fetch_assoc($ofstar_run)){
                        if($star['Eval']==1)
                        $w=$w+1;
                        else
                        if($star['Eval']==2)
                        $t=$t+1;
                        else
                        if($star['Eval']==3)
                        $th=$th+1;
                        else
                        if($star['Eval']==4)
                        $f=$f+1;
                        else
                        if($star['Eval']==5)
                        $fi=$fi+1;
        
        
        
                    } 
                    if($w>=$t && $w>=$th && $w>=$f && $w>=$fi){
                        $max=1;
                    }
                     else if($t>=$w && $t>=$th && $t>=$f && $t>=$fi){
                        $max=2;
                    }
                   else if($th>=$t && $th>=$w && $th>=$f && $th>=$fi){
                        $max=3;
                    }
                    else if($f>=$t && $f>=$th && $f>=$w && $f>=$fi){
                        $max=4;
                    }
                    else if($fi>=$t && $fi>=$th && $fi>=$w && $fi>=$w){
                        $max=5;
                    }
                }
                else
                $max=0;   
                ?>
                

                                        




                    <!--cards -->
                   
                   <div class="card">
                   
                   <div class="image">
                      <img src="../user/<?php echo $g['OfferImage'] ?>">
                   </div>
                   <div class="des">
                    <span class="spn">Description :</span>
                    <div class="OfferDescription">
                    <p><?php echo $g['OfferDescription']?></p>
                    </div>
                   </div>

                   <div class="titl">
                       
                    <span class="spn">Evaluation :</span>
                    <?php
                    if($max==0){
                    ?>
                        
                    <div class="stars">
            <i class="lar la-star " data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==1){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==2){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==3){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==4){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==5){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star star" data-value="4"></i>
            <i class="lar la-star star" data-value="5"></i>
        </div>
        <?php
        } 
        ?>
 
                   </div>
                   <div class="des">
                    <span class="spn">Le type: <?php echo $g['OfferCategore']?></span>
                   
 
                   </div>
                   <div class="des">
                    <span class="spn">prix: <?php echo $g['OfferPrix']?> DZ</span>
                   
 
                   </div class="userBTN">
                   
                   
                
                   
                   <a href="modifierOffer.php?OffMO=<?php echo $g['idOffer'];?>"> <button id="des_btn">Modifier</button></a>
                   
                   <button onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='block'" name="dellet" id="des_btnS">Supprimer</button>
                   

                   </div>
                   <!--cards -->
                   
                   
                   
                   <div id="<?php echo $g['idOffer'] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon">
          <i class="fas fa-exclamation"></i>
        </div>
                     <p>Êtes-vous sûr de vouloir supprimer le service</p>
                     
                     <a  href="userProfil.php?del=<?php echo $g['idOffer']?>"><button   class="del" onclick="hideModal()">Supprimer</button></a>
                    
                     <button onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='none'" type="button"  class="cancel" onclick="hideModal()">Annuler</button>
                     </div>
                     </div> 
                  <?php
                  
                  }
                
                }
                  
                  ?>

                
   
            </div>
            
        </div>

        
    </div>

    
    <br>
    <br>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<!--<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>-->
<script src="../admin/Control-Administration.js"></script>
<script src="Control_profil.js"></script>
<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
</body>
</html>

<?php
}
?>