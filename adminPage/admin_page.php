<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['adminmail'])){
   header('location:../login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\style.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />    
</head>
<body>

<!-- Container for sidebar and topbar -->
<div class="container">
    <!-- The sidebar -->
    <div class="sidebar">
        <h2>ADMİN PANEL</h2>
        <a class="active" href="admin_page.php">ANASAYFA</a>
        <a href="kullanıcılar.php">KULLANICILAR</a>
        <a href="contact.php">İLETİŞİM</a>
        <a href="calisanlar.php">ÇALIŞANLAR</a>
    </div>
    
    <!-- Topbar -->
    <div class="top">
        <h2>ADMİN PANEL</h2>
    </div>
</div>

<!-- Page content -->
<div class="content">
    <h1>HOŞGELDİNİZ</h1>
    <h2><?php echo $_SESSION['adminmail']; ?></h2>
</div>

</body>
</html>
