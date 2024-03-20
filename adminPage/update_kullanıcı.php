
<?php
@include 'config.php';
session_start();

$id = $_GET['id'];
if (isset($_POST['update-btn'])) {
    $namecontact = mysqli_real_escape_string($conn, $_POST['name']);
    $usercontact = mysqli_real_escape_string($conn, $_POST['user_type']);
    $passcontact = mysqli_real_escape_string($conn, $_POST['password']);
    $mailcontact = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email already exists excluding the current user
    $check_query = "SELECT id FROM user_db WHERE email=? AND id<>?";
    $check_stmt = mysqli_prepare($conn, $check_query);

    if (!$check_stmt) {
        echo "Hazırlama hatası: " . mysqli_error($conn);
        exit;
    }

    mysqli_stmt_bind_param($check_stmt, 'si', $mailcontact, $id);
    mysqli_stmt_execute($check_stmt);
    $result_check = mysqli_stmt_get_result($check_stmt);
    $existing_user = mysqli_fetch_assoc($result_check);

    mysqli_stmt_close($check_stmt);

    // If there is an existing user with the same email, display an error
    if ($existing_user) {
        // echo "Bu email zaten başka bir kullanıcı tarafından kullanılıyor.";
        echo '<div class="alert alert-danger" role="alert">
        Bu email zaten başka bir kullanıcı tarafından kullanılıyor</div>';

    }else{
        $update_query = "UPDATE user_db SET name=?, email=?, password=?, user_type=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $update_query);

        if (!$stmt) {
            echo "Hazırlama hatası: " . mysqli_error($conn);
            exit;
        }

        mysqli_stmt_bind_param($stmt, 'ssssi', $namecontact, $mailcontact, $passcontact, $usercontact, $id);
        $result_update = mysqli_stmt_execute($stmt);

        if ($result_update) {
            echo "Kullanıcı başarıyla güncellendi.";
        } else {
            echo "Güncelleme sırasında bir hata oluştu: " . mysqli_error($conn);
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

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="kontrol.js"></script>
  
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
        <h2>KULLANICI GÜNCELLE</h2>
    </div>
</div>

<section class="contact" id="contact">
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Kullanıcı id" value="kullanıcı id = <?= $id ?>" class="box" name="id" disabled>
            <input type="text" placeholder="Kullanıcı Ad Soyad" class="box" name="name" value="<?= $row['name'] ?>">
            <input type="text" placeholder="Kullanıcı şifre" class="box" name="password" value="<?= $row['password'] ?>">
            <input type="text" placeholder="Kullanıcı mail" class="box" name="email" value="<?= $row['email'] ?>">

            <select id="user_type" class="box" name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>

            <!-- CSRF koruması için gizli alan -->
            <input type="submit" value="Güncelle" name="update-btn" class="btn">
        </form>
    </div>
</section>

</body>
</html>
