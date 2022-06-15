<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;


if(isset($_POST['save'])){
    $OfferDescription=addslashes($_POST['OfferDescription']);
    $OfferCategore=$_POST['OfferCategore'];
    $OfferPrix=$_POST['OfferPrix'];
    //$OfferImage=$_POST['OfferImage'];
    $file=$_FILES['OfferImage']['name'];
    $OfferPoster=$_SESSION['pseudo'];
   
    $req="INSERT INTO offers(OfferDescription,OfferCategore,OfferPrix,OfferImage,OfferPoster) values('$OfferDescription','$OfferCategore','$OfferPrix','$file','$OfferPoster')";
    $res=mysqli_query($conn,$req);
    move_uploaded_file($_FILES['OfferImage']['tmp_name'],$file);
   

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
<script>swal( "L'offre a été ajoutée avec succès","", "success").then(function(){
       window.location= "../user/userProfil.php"
   });</script>

        </body>
        </html>
        <?php
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>"> 
    <link rel="stylesheet" href="style_profil.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <title>getWork</title>
</head>
<body>
   
<header class="header">
  
  <div class="wrapper">
      <div class="navbar">
      <div class="logo">
              <a href="../admin/Acceui_Admin.php">getWork</a>
          </div>
          <form class="example" action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
  <input type="text" placeholder="quel service recherchez-vous aujourd'hui ?
" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
          <div class="nav_right">
              <ul>
                  <!-- <li class="nr_li">
                      <i class="fas fa-plus"></i>
                  </li> -->
                 

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
                  </li>
                
              </ul>
          </div>
      </div>
  </div>	

    
  </header>


      <section id="newService_Formulair" class="newService_Formulair">
            
      <div class="addOfer">
          <div class="">
      <img class="imgg1" src="../imageService/png-transparent-thinking-woman-thinking-woman-image-idea-creative-advertising-removebg-preview.png" alt="">
      </div>
      <div class="nouOfer">
     <h2>Ajouter un nouveau Offre</h2>
     <span>Quelle est l'idée de votre nouveau projet ? Faites-le savoir et obtenez le plus grand nombre de commandes.</span>
     </div> 
    <div>
    <img class="imgg2" src="../imageService/images-removebg-preview (1).png" alt="">
    </div>
</div>
              
        <form id="enviar" action="" method="POST" enctype="multipart/form-data" >

         
         
          

         <div class="alert" id="alert" >
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<span id="echoAlertt"></span>
</div>
              
              
                  <label for=""> Description du service</label>
                  <input name="OfferDescription" id="customx" type="text" class="field" >
                  <span>Entrez une description clair qui décrit l offre. N'entrez pas de symboles ou de mots tels que « exclusivement », « pour la première fois », « pour un temps limité », etc.</span>
                  <span>Vous devriez utiliser des phrases comme , je vais concevoir, je vais développer...</span>
                  <br><br>
                 
                  <label >Selectionne le type de services</label>
                  <div class="boxx">
            
                    <select id="test" name="OfferCategore" >
                      <option value="">Selectionne le type</option>
                      <?php 
                      $req="SELECT serviceName  FROM services";
                      $res = mysqli_query($conn,$req);
                      while($resul=mysqli_fetch_assoc($res)){
                          if($resul['serviceName']!="Autre"){

                      ?>
                      <option value="<?php echo ($resul['serviceName'])?>"><?php echo ($resul['serviceName'])?></option>
                      <?php
                      }}
                      ?>
                       <option value="Autre">Autre type...</option>
                    </select>  
                    
                   
                  </div>
                  <span>Si vous n'arrivez pas a trouver le type approprié ,merci de nous <a href="../user/Parametres.php">contacte</a>. </span>
<br>
                    <label >Le prix:</label><br>
                    <div id="prix">
                    <input id="prixx" type="text" class="inpPrix" placeholder="donne un prix" name="OfferPrix"  ><span>DZ</span>
                </div>
                 

                 
                  
              

               
                <br>
                  <label for="">Ajoute une image </label>
                  <div class="drop-zone">
                      <span class="drop-zone__prompt">cliquez pour télécharger</span>
                      <input name="OfferImage" id="fileUpload" type="file" name="myFile" class="drop-zone__input">
                    </div>

                    <button type="submit"  name="save">sauvegarder</button>
    
        </form>

     



    </section>
</body>
<script src="../admin/Control-Administration.js"></script>

<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
<script src="ControlNewOffre.js"></script>
<script src="../admin/controlService.js"></script>


</html>

<?php
}
?>