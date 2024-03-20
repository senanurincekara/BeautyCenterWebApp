<?php
@include 'config.php';
session_start();

if (isset($_POST['kullanıcıekle-btn'])) {
    $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
    $usercontact = mysqli_real_escape_string($conn, $_POST['user_type']);
    $passcontact = mysqli_real_escape_string($conn, $_POST['password']);
    $mailcontact = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email already exists
    $check_query = "SELECT id FROM user_db WHERE email=?";
    $check_stmt = mysqli_prepare($conn, $check_query);

    if (!$check_stmt) {
        echo "Hazırlama hatası: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($check_stmt, 's', $mailcontact);
    mysqli_stmt_execute($check_stmt);
    $result_check = mysqli_stmt_get_result($check_stmt);
    $existing_user = mysqli_fetch_assoc($result_check);

    mysqli_stmt_close($check_stmt);

    // If there is an existing user with the same email, display an error
    if ($existing_user) {
        echo "Bu email zaten başka bir kullanıcı tarafından kullanılıyor.";
    } else {
        // Insert the new user into the database
        $insert_query = "INSERT INTO user_db (name, email, password, user_type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);

        if (!$stmt) {
            echo "Hazırlama hatası: " . mysqli_error($conn);
            exit;
        }

        mysqli_stmt_bind_param($stmt, 'ssss', $namecontact, $mailcontact, $passcontact, $usercontact);
        $result_insert = mysqli_stmt_execute($stmt);

        if ($result_insert) {
            echo "Kullanıcı başarıyla kaydedildi.";
        } else {
            echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
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
        <a class="active" href="kullanıcılar.php">KULLANICILAR</a>
        <a href="contact.php">İLETİŞİM</a>
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
          
            <input type="text" placeholder="Kullanıcı Ad Soyad" class="box" name="name" value="<?= $row['name'] ?>">
            <input type="text" placeholder="Kullanıcı şifre" class="box" name="password" value="<?= $row['password'] ?>">
            <input type="text" placeholder="Kullanıcı mail" class="box" name="email" value="<?= $row['email'] ?>">

            <select id="user_type" class="box" name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
          

          <!-- CSRF koruması için gizli alan -->
          <input type="submit" value="kullanıcı ekle" name="kullanıcıekle-btn" class="btn">
       </form>

    </div>
 </section>


</body>
</html>
