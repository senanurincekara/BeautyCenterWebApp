<?php
@include 'config.php';

session_start();


if(isset($_SESSION['usermail'])){
   echo"<h3>".$_SESSION["usermail"]." merhaba </h3>";
}
else{
   echo "<script>alert('Bu sayfa için yetkiniz yok lütfen önce giriş yapın veya kayıt olun');</script>";
   // echo "Bu sayfa için yetkiniz yok lütfen önce giriş yapın veya kayıt olun"; // Display a warning
   // exit();
   
}

if (isset($_GET['bosmail'])) {
   $emailFromURL = isset($_GET['bosmail']) ? htmlspecialchars($_GET['bosmail']) : '';

   if (empty($emailFromURL)) {
       echo "Please log in first."; // Display a warning
       exit();
   }


}else{
   $usermail = $_SESSION['usermail'];
   $query = "SELECT * FROM user_db WHERE email = '$usermail'";
   $result_user = mysqli_query($conn, $query);
   $user = mysqli_fetch_assoc($result_user);
   $id = $user['id'];

   if(isset($_POST['mesaj-yaz'])) {
      $emailcontact = mysqli_real_escape_string($conn, $_POST['email']);
      $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
      $numbercontact = mysqli_real_escape_string($conn, $_POST['number']);
      $textcontact = mysqli_real_escape_string($conn, $_POST['textarea']);

      $insert = "INSERT INTO contact_us(id, name, email, phoneNumber, text) VALUES(?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $insert);
      mysqli_stmt_bind_param($stmt, 'issss', $id, $namecontact, $emailcontact, $numbercontact, $textcontact);
      $result_insert = mysqli_stmt_execute($stmt);

      if ($result_insert) {
         echo "Text başarıyla kaydedildi.";
         header('location: contact_page.php');
         exit;
      } else {
         echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($conn);
      }
      mysqli_stmt_close($stmt);
   }


}


// @include 'config.php';

// session_start();

// if (!isset($_SESSION['usermail'])) {
//     echo "Lütfen önce kayıt olunuz veya giriş yapınız.";
//    //  header('location: login_page.php');
//    //  exit;
// }

// $usermail = $_SESSION['usermail'];
// $query = "SELECT * FROM user_db WHERE email = '$usermail'";
// $result_user = mysqli_query($conn, $query);
// $user = mysqli_fetch_assoc($result_user);
// $id = $user['id'];

// if (isset($_POST['mesaj-yaz'])) {

//       $emailcontact = mysqli_real_escape_string($conn, $_POST['email']);
//       $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
//       $numbercontact = mysqli_real_escape_string($conn, $_POST['number']);
//       $textcontact = mysqli_real_escape_string($conn, $_POST['textarea']);

//       $insert = "INSERT INTO contact_us(id, name, email, phoneNumber, text) VALUES(?, ?, ?, ?, ?)";
//       $stmt = mysqli_prepare($conn, $insert);
//       mysqli_stmt_bind_param($stmt, 'issss', $id, $namecontact, $emailcontact, $numbercontact, $textcontact);
//       $result_insert = mysqli_stmt_execute($stmt);

//       if ($result_insert) {
//          echo "Text başarıyla kaydedildi.";
//          header('location: contact_page.php');
//          exit;
//       } else {
//          echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($conn);
//       }
//       mysqli_stmt_close($stmt);
// //    
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style2.css">
   
   <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
</head>
<body>

<!-- header start -->
<header>
   <a href="#" class="logo">Carpe Diem Beauty Center <span></span></a>
   <nav class="navbar">
      <a href="user.php">ANASAYFA</a>
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

<!-- diğer içerikler -->

<section class="contact" id="contact">
   <br>
   <br>
   <br>
   <br>
   <br>
   <h1 class="heading"><span>İLETİŞİM</span></h1>
   <div class="row">
      <form action="" method="post">
         <input type="text" placeholder="isim giriniz" class="box" name="name" value="<?php echo $user['name']; ?>">
         <input type="email" placeholder="email giriniz" class="box" name="email" value="<?php echo $user['email']; ?>">
         <input type="text" placeholder="numara giriniz" class="box" name="number">
         <textarea name="textarea" class="box" placeholder="mesajınız nedir "  id="" cols="30" rows="10"></textarea>
         <!-- CSRF koruması için gizli alan -->
         <input type="submit" value="mesaj yaz" name="mesaj-yaz" class="btn">
      </form>

      <div class="image">
         <img src="img/contact.png" alt="">
      </div>
   </div>
</section>


<!-- diğer içerikler -->

</body>
</html>
