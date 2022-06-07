<?php
include_once 'includes/database-linck.php';
$conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login_System/stylrAccueil.css?v=<?php echo time(); ?>">

    <title>Document</title>
    <style>
 
    </style>
</head>
<body>
<section class="noResult">
<div class="search-message-empty-container">
  <span class="search-message-empty-decal">
    <span class="search-message-empty-decal-eyes">:</span>
    <span>(</span>
  </span>
  <h2 class="search-message-empty-message">
   Aucun resultat trouver pour.
  </h2>
</div>
<div class="verif">
  <span>Veuillez vérifier l'orthographe, essayez un terme de recherche plus générique ou essayez d'autres termes de recherche.</span>
  <div class="hrr"><hr ></div>
</div>

</section>
<section class="util">
<h2 >vous pourriez aussi trouver cela utile  </h2>
<span>Vous cherchez les offres de type :</span>
<div class="box-etoile">
      <?php
      $sql="SELECT * FROM services";
      $res = mysqli_query($conn,$sql);
      while($g=mysqli_fetch_assoc($res)){
        if($g['serviceName']!="Autre"){
      ?>
       <a href="../login_System/nosServic.php?Sevice=<?php echo $g['serviceName']?>">
      <div class="ser">
      <a href="?Sevice=<?php echo $g['serviceName']?>">
        <div class="service_i">
              <img  src="../admin/<?php echo ($g['serviceIcon'])?>" alt="hiii">
    
       
        <hr>
        <span><?php echo ($g['serviceName'])?></span>
        </div>
        </a>
    </div>
    </a>
    <?php
      }}
    ?>
    

    </div>
</section>
</body>
</html>