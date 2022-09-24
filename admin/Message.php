<?php
session_start();
if(!isset($_SESSION['pseudo']) || ( $_SESSION['admin']!=1 )){
  header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
$action="SELECT * FROM offers ORDER BY idOffer DESC ";
    $offr = mysqli_query($conn,$action);

    if(isset($_POST['delet']) && !empty($_POST['mess_delete_id']))
{
    $all_id = $_POST['mess_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM messages WHERE idemail IN($extract_id) ";
    $query_run = mysqli_query($conn, $query);
   
   
}
$mess="SELECT * FROM messages ORDER BY 	idemail DESC ";
$mess = mysqli_query($conn,$mess);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Administration.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="style_messages.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="../login_System/logoStyle.css">
    <title>getWork</title>
</head>
<body>   
        <header class="page-header">
          <nav>
            
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="admin-menu">
              <!--<a href="">LOGO</a>-->
              <center> <div class="left">
                <span class="greeting">Bonjour  <?php echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="../user/<?php echo ($_SESSION['img']);?>" alt="profile_img">
                  </div></center>
              <li class="menu-heading">

                <h3>Admin</h3>
              </li>
              
                <li>
                  <a href="http://localhost/PFFE/admin/Administration.php">
                    
                    <i class="fas fa-home"></i>
                    
                    <span>Accueil</span>
                  </a>
                </li>
                <?php
                if ($_SESSION['admn']==0) {
                  
                
                ?>
                <li>
                <a href="http://localhost/PFFE/admin/lesAdmin.php">
                  
                  <i class="fas fa-user-shield"></i>
                  
                  <span>Administrateurs</span>
                </a>
              </li>
              <?php
              }
              ?>
              <li>
                <a href="http://localhost/PFFE/admin/utilisateurs.php">
                  <i class="fas fa-users"></i>
                  <span>utilisateurs</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/Message.php">
                  <i class="far fa-comments"></i>
                  <span>Message</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/services.php">
                  <i class="fas fa-briefcase"></i>
                  <span>Services</span>
                </a>
              </li>
             
             
              <li>
                <div class="switch">
                  <input type="checkbox" id="mode" checked>
                  <label for="mode">
                    <span></span>
                    <span>Dark</span>
                  </label>
                </div>
                <a href="http://localhost/PFFE/admin/Acceui_Admin.php">
                  
                  <i class="fas fa-sign-out-alt"></i>
                  <span>sortir de l'dministration</span>
                </a>
                <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                  <i class="fas fa-chevron-left"></i>
                  <span>Effondrer</span>
                </button>
              </li>
            </ul>
          </nav>
        </header>
        <section class="page-content">
          <section class="search-and-user">
          <div class="Admini">
            <h1>Administration</h1>
            </div>
                  <!-- <form action="GET">
                  <input type="search" placeholder="Chercher...">
                  <button type="submit" aria-label="submit form">
                    <i class="fas fa-search"></i>
                  </button>

                </form>-->
                
                <div class="admin-profile">
                 <!-- <span class="greeting">Bonjour  <?php //echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php //echo ($_SESSION['img'//]);?>" alt="profile_img">-->
                  
              <div class="notifications">
               <!-- <span class="badge">1</span>-->
                <svg>
                  <use xlink:href="#users"></use>
                </svg>
              </div>
            </div>
          </section>
          <section class="grid">
       
          <article>
                    <div class="admin_num">
                        <div class="admin_num_1"> 
                            <span><?php echo mysqli_num_rows($mess)?></span><br>

                            <label for="">Messags</label>
                        </div>
                        <div class="admin_num_2">
                           <img src="images_Admin/icons8-communication-90.png" alt="">
                        </div>

                    </div>
                </article>
            
          </section>
          <div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="cardd">
                <div class="card-body bg-primary text-white mailbox-widget pb-0">
                    <h2 class="text-white pb-3">Votre boîte aux lettres</h2>
                   
                </div>
                <?php
                                        $mess="SELECT * FROM messages ORDER BY 	idemail DESC ";
                                        $mess = mysqli_query($conn,$mess);
                                        if(mysqli_num_rows($mess)){
                                        ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                        <div>
                            <div class="row p-4 no-gutters align-items-center">
                               
                                <div class="col-sm-12 col-md-6">
                                    <ul class="list-inline dl mb-0 float-left float-md-right">
                                       <form action="" method="POST">
                                    <li class="list-inline-item text-info mr-3">
                                            <a href="#">
                                                <button class="btn btn-circle btn-success text-white" >
                                                <input  type="checkbox" class="custom-control-input" onchange="checkAll(this)" id="cst1" />
                                                </button>
                                                <span class="ml-2 font-normal text-dark">tout sélectionner</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item text-danger">
                                            <a href="#">
                                                <button name="delet" class="btn btn-circle btn-danger text-white" >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <span class="ml-2 font-normal text-dark">supprimer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Mail list-->
                            <div class="table-responsive">
                                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                    <tbody>
                                        <?php
                                        $mess="SELECT * FROM messages ORDER BY 	idemail DESC ";
                                        $mess = mysqli_query($conn,$mess);
                                        
                                        while($mes=mysqli_fetch_assoc($mess)){
                                           if($mes['lire']==0){
                                        
                                        ?>
                                        <!-- row -->
                                        <tr class="tr">
                                            <?php
                                            }else{
                                            ?>
                                            <tr >

                                            <?php
                                            }
                                            ?>
                                            <!-- label -->
                                            <td class="pl-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input name="mess_delete_id[]" value="<?= $mes['idemail']; ?>" type="checkbox" class="custom-control-input" id="cst1" />
                                                    <label class="custom-control-label" for="cst1">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- star -->
                                            <td></td>
                                            <td>
                                                <span class="mb-0 text-muted"><?php echo $mes['emetteur'] ?></span>
                                            </td>
                                            <!-- Message -->
                                            <td class="mess">
                                                <div class="mess">
                                                <a class="link" href="reponse.php?send=<?php echo $mes['idemail'] ?>">
                                                   
                                                    <span class="text-dark"><?php  echo substr($mes['messag'],1,44) ?>....</span>
                                                </a>
                                                </div>
                                            </td>
                                            <!-- Attachment -->
                                            <?php
                                             if($mes['lire']==0){
                                            ?>
                                            <td><i class="fa fa-paperclip text-muted"></i></td>
                                            <?php
                                             }
                                             else{

                                             
                                            ?>
                                            <td></td>
                                            <?php
                                             }
                                            ?>
                                            <!-- Time -->
                                            <td class="text-muted"><?php echo $mes['dateMess']  ?></td>
                                        </tr>
                                       <?php
                                        }
                                       ?>
                                       </form>
                                      
                                       <?php
                                       }
                                       else{
                                           ?>
                                           <span>Aucun message n'a été reçu</span>
                                           <?php
                                       }
                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>

        </section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<script src="Control_Admin.js"></script>
<script>
var checkboxes = document.querySelectorAll("input[type = 'checkbox']");
function checkAll(myCheckbox){
    if(myCheckbox.checked == true){
        checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
        });
    }
    else{
        checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
        });
    }
}
</script>

</html>

<?php
}
?>