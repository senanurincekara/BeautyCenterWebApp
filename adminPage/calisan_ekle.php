<?php
@include 'config.php';
session_start();

if (isset($_POST['calisanekle-btn'])) {
    $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
    $textcontact = mysqli_real_escape_string($conn, $_POST['hizmeti']);
    $unamecontact = mysqli_real_escape_string($conn, $_POST['uname']);

    $image_path = ''; 

    if (isset($_FILES['pic']) && $_FILES['pic']['error'] == UPLOAD_ERR_OK) {
        $image_name = $_FILES['pic']['name']; // dosyanın orjınal adı
        $image_tmp = $_FILES['pic']['tmp_name']; // geçici path
    
        $upload_directory = 'img/about/'; 
        $image_path = $upload_directory . $image_name;
    
        if (!file_exists($upload_directory)) {
            mkdir($upload_directory, 0755, true);
        }
    
        // echo "File Name: $image_name<br>";
        // echo "Temporary Name: $image_tmp<br>";
        // echo "Upload Directory: $upload_directory<br>";
        // echo "Image Path: $image_path<br>";
    
        // if (move_uploaded_file($image_tmp, $image_path)) {
        //     // File upload successful
        //     echo "File moved successfully<br>";
        // } else {
        //     echo "Dosya yükleme hatası: Move operation failed<br>";
        //     echo "Error Code: " . $_FILES['pic']['error'] . "<br>";
        //     // exit;
        // }
    }
    

    // Debugging: Display the values before inserting into the database
    // echo "Name: $namecontact<br>";
    // echo "Text: $textcontact<br>";
    // echo "Image Path: $image_path<br>";

    // Assuming 'id' is an auto-increment field
    $insert = "INSERT INTO calisan_tablo (calisan_ad_soyad, uzmanlik,uzmanlık_yıl, image) VALUES (?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $insert);

    if (!$stmt) {
        echo "Hazırlama hatası: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ssss', $namecontact, $textcontact, $unamecontact, $image_path);
    $result_insert = mysqli_stmt_execute($stmt);

    if ($result_insert) {
        echo "başarıyla kaydedildi.";
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
      <form action="" method="post" enctype="multipart/form-data">
          <input type="text"placeholder="Çalışan Ad Soyad" class="box" name="name">
          <select id="hizmet" class="box" name="hizmeti"> 
            <option  value="cilt Bakımı">Cilt Bakım</option>
            <option value="kirpik Lifting">Kirpik Lifting</option>
            <option value="lazer Epilasyon">Lazer</option>
            <option value="Hydrafacial">Hydrafacial</option>
            <option value="Kalıcı Makyaj">Kalıcı Makyaj</option>
            <option value="Padikür&Manikür">Padikür & Manikür</option>
            
          </select>
          <input type="text"placeholder="Sektörde Kaçıncı yılı" class="box" name="uname">

          <input type="file" name="pic" id="pic" class="box">
          

          <!-- CSRF koruması için gizli alan -->
          <input type="submit" value="çalışan ekle" name="calisanekle-btn" class="btn">
       </form>
 
       <div class="image">
          <img src="img/calendar.png" alt="">
       </div>
    </div>
 </section>


</body>
</html>
