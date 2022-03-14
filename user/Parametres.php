<?php
session_start();

if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
         
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
    <title>Document</title>
   
</head>
<body >

    <header class="header">
  
        <div class="wrapper">
            <div class="navbar">
                <div class="logo">
                    <a href="#">getWork</a>
                </div>
                <div>
                <form action="">
                    <div class="box-recherch">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    <input placeholder="trouver des services" id="input-Rechercher" type="text">
                    <button id="button-Rechercher">Rechercher</button>
                  </div>
                    
                </form>
            </div>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li">
                            <!--<i class="fas fa-plus"></i>-->
                        </li>
                       
    
                        <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="../admin/Administration.php">  <i class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                        
                       
                        <li class="nr_li">
                            <i class="fas fa-envelope-open-text"></i>
                        </li>
                        
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
                                       <a href="userProfil.php"> <li>Profil</li></a>   
                                      <!-- <a href="Administration.php"> <li>Administration</li></a>-->
                                       <a href=""> <li>Favorites</li> </a>               
                                       <a href=""> <li>Settings</li> </a>
                                       <a href=" http://localhost/PFFE/admin/deconnextion.php"><li>Deconnextion</li></a>      
                                        
                                    </ul>
                                </div>
                            </div>
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
                                <img  src="<?php echo $_SESSION['img'];?>" id="photo">
                                    
                                </div>
                               
                               
                               
                                <h6 class="f-w-600 m-t-25 m-b-10"><?php echo ($_SESSION['user']); ?></h6>
                            
                            </div>
                               
                                <p class="text-muted">Membre depuis : <?php  echo $_SESSION['dat'];?></p>
                                <hr>
                                
                                   
                                   

                                   
                                   
                        
                            </div>
                        </div>
                  
            </div>

          
                    
                </div>
                

                
   
            </div>
            
        </div>

        
    </div>

    
    <br>
    <br>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<!--<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>-->
<script src="../admin/Control-Administration.js"></script>
<script src="Control_profil.js"></script>
<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
</body>
</html>

<?php
}
?>