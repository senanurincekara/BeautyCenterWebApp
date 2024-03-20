<?php
@include 'config.php';

session_start();

// if (!isset($_SESSION['usermail'])) {
//    header('location:login_form.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style2.css">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<!-- header start -->
<header>
   <a href="#" class="logo">Carpe Diem Beauty Center <span></span></a>
   <nav class="navbar">
      <a href="user.php"> ANASAYFA</a>
      <a href="about_page.php">UZMANLARIMIZ</a>
      <a href="hizmet.php">HİZMETLERİMİZ</a>
      <a href="contact_page.php">İLETİŞİM</a>
      <a href="logout.php">ÇIKIŞ</a>

   </nav>
   <div class="icons">
      <a href="#" class="fas fa-heart"></a>
      <a href="#" class="fas fa-user"></a>
   </div>
</header>
<!-- header end -->

<!-- çalışanlar başlangıç-->

<section class="calisan" id="calisan">
   <h1 class="heading">UZMANLARIMIZ</h1>

   <div class="box-container-calisan">
      <?php
      $query = "SELECT * FROM calisan_tablo";
      $result = mysqli_query($conn, $query);

      if (!$result) {
         die('Sorgu hatası: ' . mysqli_error($conn));
      }

      if (mysqli_num_rows($result) > 0) {
         foreach ($result as $resultItem) {
            echo '<div class="box">';
            echo '<img src="' . $resultItem['image'] . '" alt="">';
            echo '<h3>' . $resultItem['calisan_ad_soyad'] . '</h3>';
            echo '<h4>Uzmanlık Alanı : ' . $resultItem['uzmanlik'] . '</h4>' ;
            
            echo'<span>Sektörde ' . $resultItem['uzmanlık_yıl'] . '. yılı</span>';
            echo '</div>';
         }
      }
      ?>
   </div>
</section>
<!-- çalışanlar son -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
