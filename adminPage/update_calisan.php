<?php
@include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['update-btn'])) {
        $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
        $textcontact = mysqli_real_escape_string($conn, $_POST['hizmeti']);
        $unamecontact = mysqli_real_escape_string($conn, $_POST['uname']);

        // Update the database record
        $update_query = "UPDATE calisan_tablo SET calisan_ad_soyad=?, uzmanlik=?, uzmanlık_yıl=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $update_query);

        if (!$stmt) {
            echo "Hazırlama hatası: " . mysqli_error($conn);
            exit;
        }

        mysqli_stmt_bind_param($stmt, 'sssi', $namecontact, $textcontact, $unamecontact, $id);
        $result_update = mysqli_stmt_execute($stmt);

        if ($result_update) {
            // Check if a new image is selected
            if (isset($_FILES['pic']) && $_FILES['pic']['error'] == UPLOAD_ERR_OK) {
                $image_name = $_FILES['pic']['name']; // Original name of the file
                $image_tmp = $_FILES['pic']['tmp_name']; // Temporary name/path on server

                // Move the file to a specific location (e.g., 'uploads/' folder)
                $upload_directory = 'img/about/'; // Change this to your desired directory
                $image_path = $upload_directory . $image_name;

                // Create the directory if it doesn't exist
                if (!file_exists($upload_directory)) {
                    mkdir($upload_directory, 0755, true);
                }

                if (move_uploaded_file($image_tmp, $image_path)) {
                    // Update the image path in the database
                    $update_image_query = "UPDATE calisan_tablo SET image=? WHERE id=?";
                    $stmt_image = mysqli_prepare($conn, $update_image_query);

                    if (!$stmt_image) {
                        echo "Hazırlama hatası: " . mysqli_error($conn);
                        exit;
                    }

                    mysqli_stmt_bind_param($stmt_image, 'si', $image_path, $id);
                    $result_update_image = mysqli_stmt_execute($stmt_image);

                    if ($result_update_image) {
                        echo "Çalışan ve resim başarıyla güncellendi.";
                    } else {
                        echo "Güncelleme sırasında bir hata oluştu: " . mysqli_error($conn);
                    }

                    mysqli_stmt_close($stmt_image);
                } else {
                    echo "Dosya yükleme hatası: Move operation failed<br>";
                    echo "Error Code: " . $_FILES['pic']['error'] . "<br>";
                    exit;
                }
            } else {
                echo "Çalışan başarıyla güncellendi.";
            }
        } else {
            echo "Güncelleme sırasında bir hata oluştu: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }

    // Fetch the current record from the database
    $select_query = "SELECT * FROM calisan_tablo WHERE id=?";
    $stmt_select = mysqli_prepare($conn, $select_query);

    if (!$stmt_select) {
        echo "Hazırlama hatası: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($stmt_select, 'i', $id);
    mysqli_stmt_execute($stmt_select);
    $result_select = mysqli_stmt_get_result($stmt_select);
    $row = mysqli_fetch_assoc($result_select);

    mysqli_stmt_close($stmt_select);
} else {
    echo "Çalışan ID'si belirtilmedi.";
    exit;
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
        <a  href="contact.php">İLETİŞİM</a>
        <a class="active" href="calisanlar.php">ÇALIŞANLAR</a>
    </div>
    
    <!-- Topbar -->
    <div class="top">
        <h2>İLETİŞİM-CEVAP</h2>
    </div>
</div>


<section class="contact" id="contact">
        <div class="row">
       <form action="" method="post" enctype="multipart/form-data">
          <input type="text" placeholder="Çalışanid" value="<?= $id ?>" class="box" name="id" disabled>
          <input type="text"placeholder="Çalışan Ad Soyad" class="box" name="name" value="<?= $row['calisan_ad_soyad'] ?>">

          <select id="hizmet" class="box" name="hizmeti"> 
            <option value="cilt Bakımı" <?= ($row['uzmanlik'] == 'cilt Bakımı') ? 'selected' : '' ?>>Cilt Bakım</option>
            <option value="kirpik Lifting" <?= ($row['uzmanlik'] == 'kirpik Lifting') ? 'selected' : '' ?>>Kirpik Lifting</option>
            <option value="lazer Epilasyon" <?= ($row['uzmanlik'] == 'lazer Epilasyon') ? 'selected' : '' ?>>Lazer</option>
            <option value="Hydrafacial" <?= ($row['uzmanlik'] == 'Hydrafacial') ? 'selected' : '' ?>>Hydrafacial</option>
            <option value="Kalıcı Makyaj" <?= ($row['uzmanlik'] == 'Kalıcı Makyaj') ? 'selected' : '' ?>>Kalıcı Makyaj</option>
            <option value="Padikür&Manikür" <?= ($row['uzmanlik'] == 'Padikür&Manikür') ? 'selected' : '' ?>>Padikür & Manikür</option>
        </select>

            <input type="text" placeholder="Sektörde Kaçıncı yılı" class="box" name="uname" value="<?= $row['uzmanlık_yıl'] ?>">
            <input type="file" name="pic" id="pic" class="box">

          <!-- CSRF koruması için gizli alan -->
          <input type="submit" value="Güncelle" name="update-btn" class="btn">
       </form>
 
       <div class="image">
          <img src="img/calendar.png" alt="">
       </div>
    </div>
 </section>


</body>
</html>
