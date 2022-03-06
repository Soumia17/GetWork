<?php
session_start();

session_unset();
session_destroy();
header('location: http://localhost/PFFE/login_System/Formulaire.html');
?>