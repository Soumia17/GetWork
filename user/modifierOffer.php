<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
if(isset($_GET['seen'])){
  $req="UPDATE notification SET seen=1 where la_Persones ='".$_SESSION['pseudo']."'";
$res = mysqli_query($conn,$req);
}
if(!empty($_GET['OffMO'])){
$id=$_GET['OffMO'];
$_SESSION['off']=$id;
//$id= $_SESSION['off'];




            
            if(isset($_POST['save'])){
                
              $OfferDescription=addslashes($_POST['OfferDescription']);
              $OfferCategore=$_POST['OfferCategore'];
              $OfferPrix=$_POST['OfferPrix'];
            //   $OfferImage=$_POST['OfferImage'];
        
              $re="UPDATE offers
              SET  OfferDescription= '".$OfferDescription."',OfferCategore= '".$OfferCategore."',OfferPrix= '".$OfferPrix."'
              WHERE idOffer='".$_SESSION['off']."'";
              $res = mysqli_query($conn,$re);
              if($res){
                //   echo "hello";
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
          <script>swal( "L'offre a été modifie avec succès","", "success")</script>
          
                  </body>
                  </html>
                  <?php
              }
              if($_FILES['OfferImage']['name']!=""){
                $file=$_FILES['OfferImage']['name'];
                  $re="UPDATE offers
              SET  OfferImage= '".$file."'
              WHERE idOffer='".$_SESSION['off']."'";
              $res = mysqli_query($conn,$re);
              move_uploaded_file($_FILES['OfferImage']['tmp_name'],$file);
              }
              if($res){
                //   echo "hello";
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
          <script>swal( "L'offre a été modifie avec succès","", "success")</script>
          
                  </body>
                  </html>
                  <?php
              }
              
              
          
          
         
          
          }
          $Offer="SELECT * FROM offers WHERE idOffer ='".$id."'";
            $Offer_run=mysqli_query($conn,$Offer);
if(mysqli_num_rows($Offer_run)<1){
  header("Location:../error.html"); 
}
            while($g=mysqli_fetch_assoc($Offer_run)){
             $OfferCategore= $g['OfferCategore'];
             $OfferDescription=$g['OfferDescription'];
             $OfferImage=$g['OfferImage'];
             $OfferPrix=$g['OfferPrix'];


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
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css?v=<?php echo time();?>">
    <title>getWork</title>
</head>
<body>
    <header class="header">
  
        <div class="wrapper">
            <div class="navbar">
            <div class="logo">
            <img src="../imageService/business-2684758__340.webp" alt="">
                    <a href="../admin/Acceui_Admin.php">getWork</a>
                </div>
                <form class="example" action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
  <input type="text" placeholder="quel service recherchez-vous aujourd'hui ?
" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li">
                           <!-- <i class="fas fa-plus"></i>-->
                        </li>
                       
    
                        <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="../admin/Administration.php" id="shield"> entre à l'administration <i class="fas fa-user-shield hii"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                             <li class="nr_li not">
                        <div class="nutification" onclick="toggleNotifi()" >
                        <?php $not="SELECT * From notification where la_Persones ='".$_SESSION['pseudo']."' ";
                   $res_em=mysqli_query($conn,$not);
                   if(mysqli_num_rows($res_em)>0){
                   while($e=mysqli_fetch_assoc($res_em)){
                    $m=$e['seen'];
                   }}
                   if(mysqli_num_rows($res_em)>0){
                   if($m==0 ){
                   ?>
                   
                        <span class="badge"><?php echo mysqli_num_rows($res_em)?></span>
                        <?php
                   }} 
                        ?>
                   <img  src="../admin/images_Admin/bell-solid.svg" alt="" class="nutif" >
                   </div>
                  
                   <div class="notifi-box" id="box">
                  
			<h2>Notifications <span><?php echo mysqli_num_rows($res_em)?></span></h2>
            <?php  if(mysqli_num_rows($res_em)>0){
                     $not="SELECT * From notification where la_Persones ='".$_SESSION['pseudo']."' ";
                    $res_em=mysqli_query($conn,$not);
                   while($eml=mysqli_fetch_assoc($res_em)){
                       
                   ?>
			<div class="notifi-item">
				<img src="../admin/images_Admin/<?php echo $eml['icon'] ?>" alt="img">
				<div class="text">
				   <h4><?php echo $eml['Subject'] ?></h4>
				   <p><?php echo $eml['text'] ?></p>
			    </div> 
			</div>

		<?php  }}?>



			
			</div>
            </div>         

                    </li>
                       
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
     
<div class="offe" >
        <div class="mainD">

            <!--cards -->
          
           <div class="cardd">
           
           <div class="image">
              <img src="<?php echo "../user/".$OfferImage ?>">
           </div>
           <div class="des">
            <span class="spn">Description :</span>
            <p><?php echo $OfferDescription ?></p>
           
           </div>

           
           <div class="des">
            <span class="spn">Le type:<?php echo $OfferCategore ?></span>
           

           </div>
           <div class="des">
            <span class="spn">prix:<?php echo $OfferPrix ?> DZ</span>
           

           </div>
           
          <!-- <form action="" method="POST">
          <button name="dellet" class="des_btn">Supprimer</button>
          
          </form> -->
           </div>
        </div>
        <div class="offe" id="down" >
        
      <section id="newService_Formulair" class="newService_Formulair">
            
              
              <!-- <div class="but_Hors_Service">
              <form action="">
              <div class="select">
   <select name="format" id="format">
      <option selected disabled>Choose a book format</option>
      <option value="pdf">PDF</option>
      <option value="txt">txt</option>
      <option value="epub">ePub</option>
      <option value="fb2">fb2</option>
      <option value="mobi">mobi</option>
   </select>
</div>
               </form>
      </div> -->
              
        <form id="enviar" action="" method="POST"  enctype="multipart/form-data">

         
         
          <h2>Modifier l Offre</h2>

         <center> <div class="alert" id="alert" >
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<span id="echoAlertt"></span>
</div></center>
              
              
                  <label for=""> Description du service</label>
                  <input name="OfferDescription" id="customx" type="text" class="field"  value="<?php echo $OfferDescription ?>">
                  <span>Entrez une description clair qui décrit l offre. N'entrez pas de symboles ou de mots tels que « exclusivement », « pour la première fois », « pour un temps limité », etc.</span>
                  <span>Vous devriez utiliser des phrases comme , je vais concevoir, je vais développer...</span>
                  <br><br>
                 
                  <label >Selectionne le type de services</label>
                  <div class="boxx">
            
                    <select id="test" name="OfferCategore" >
                      <option value="<?php echo $OfferCategore ?> "><?php echo $OfferCategore ?></option>
                      <?php 
                      $req="SELECT serviceName  FROM services";
                      $res = mysqli_query($conn,$req);
                      while($resul=mysqli_fetch_assoc($res)){
                          if($resul['serviceName']!=$OfferCategore){

                      ?>
                      <option value="<?php echo ($resul['serviceName'])?>"><?php echo ($resul['serviceName'])?></option>
                      <?php
                      }}
                      ?>
                    </select>  
                    
                    
                  </div>
                  
                    <label >Le prix:</label><br>
                    <div id="prix">
                    <input type="text" class="inpPrix" placeholder="donne un prix" name="OfferPrix" value="<?php echo$OfferPrix ?>" ><span>DZ</span>
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

</div>

</body>
<script src="../admin/Control-Administration.js?V=<?php echo time()?>"></script>

<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
<script src="ControlAddOfer.js?V=<?php echo time()?>"></script>
<script src="../admin/controlService.js?V=<?php echo time()?>"></script>
<script src="ControlNewOffre.js?v=<?php echo time();?>"></script>

</html>
<?php

}
else{
  header("Location:../error.html"); 
}
}
?>