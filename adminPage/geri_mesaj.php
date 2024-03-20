<?php
    @include 'config.php';
    session_start();
    
    // kullanıcının id si 
    $mesaj_user_id = $_GET['id']; 

    if(!isset($_SESSION['adminmail'])){
        // Oturum kontrolü yapılmalı, ancak şu anda kullanmıyorsunuz gibi görünüyor.
    }
     
    $usermail = $_SESSION['adminmail'];
    $query = "SELECT * FROM user_db WHERE email = '$usermail'";
    $result_user = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result_user);
    $id = $user['id'];
    $textcontact = mysqli_real_escape_string($conn, $_POST['textarea']);

    if(isset($_POST['gerimesaj-yaz'])) {
        $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
        $textcontact = mysqli_real_escape_string($conn, $_POST['textarea']);

        $insert = "INSERT INTO admin_feedback(user_id, admin_id, admin_name, admin_text) VALUES(?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, 'iiss', $mesaj_user_id, $user['id'], $user['name'], $textcontact);
        $result_insert = mysqli_stmt_execute($stmt);

        if ($result_insert) {
            echo "Text başarıyla kaydedildi.";
            header('location:contact.php');
            exit;
        } else {
            echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
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
        <a href="admin_page.php">ANASAYFA</a>
        <a href="kullanıcılar.php">KULLANICILAR</a>
        <a class="active" href="contact.php">İLETİŞİM</a>
        <a href="calisanlar.php">ÇALIŞANLAR</a>
    </div>
    
    <!-- Topbar -->
    <div class="top">
        <h2>İLETİŞİM-CEVAP</h2>
    </div>
</div>


<section class="contact" id="contact">
        <div class="row">
       <form action="" method="post">
          <input type="text" placeholder="Admin id = <?php echo $user['id']; ?>" class="box" name="adminid" disabled>
          <input type="text"placeholder="Admin Ad = <?php echo $user['name']; ?>" class="box" name="name" disabled>
          <textarea name="textarea" class="box" placeholder="geri dönüş alanı"  id="" cols="30" rows="10"></textarea>
          <!-- CSRF koruması için gizli alan -->
          <input type="submit" value="mesaj yaz" name="gerimesaj-yaz" class="btn">
       </form>
 
       <div class="image">
          <img src="img/calendar.png" alt="">
       </div>
    </div>
 </section>


</body>
</html>
