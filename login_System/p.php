<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}
else{

    /*
require_once("formulair.php");


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcom <?php echo $_SESSION['userName']; ?></h2>
    <button >logout</button>

</body>
</html>*/

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
    <h2>walcom <span style="color:red ;"><?php echo ( $_SESSION['pseudo']);?></span>  </h2>

    <a href="deconnextion.php">deconnection</a>
</body>

<?php
}
?>



