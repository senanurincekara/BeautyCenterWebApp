<?php
@include 'config.php';

session_start();

if (isset($_POST['kullanıcı_delete'])) {
    $id = $_POST['id'];

    $delete_query = "DELETE FROM user_db WHERE id = $id";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo '<div class="alert alert-success" role="alert">Kullanıcı başarıyla silindi.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Kullanıcı silinirken bir hata oluştu: ' . mysqli_error($conn) . '</div>';
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
        <a  class="active" href="kullanıcılar.php">KULLANICILAR</a>
        <a href="contact.php">İLETİŞİM</a>
        <a  href="calisanlar.php">ÇALIŞANLAR</a>
    </div>
    
    <!-- Topbar -->
    <div class="top">
        <h2>KULLANICILAR</h2>
    </div>
</div>

<!-- Page content -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        KULLANICI EKLE 
                        <a href="kullanıcı_ekle.php" class="btn1">Kullanıcı ekle</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ad ve Soyad</th>
                                    <th>email</th>
                                 
                                    <th>kullanıcı tipi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query="SELECT * FROM user_db";
                                $result=mysqli_query($conn,$query);
                                if (!$result) {
                                    die('Sorgu hatası: ' . mysqli_error($conn));
                                }
                                if(mysqli_num_rows($result) > 0){
                                    foreach($result as $resultItem)
                                    {
                                    ?>
                                    <tr>
                                        <td><?= $resultItem['id']?></td>
                                        <td><?= $resultItem['name']?></td>
                                        <td><?= $resultItem['email']?></td>
                                        
                                        <td><?= $resultItem['user_type']?></td>

                                        <td class="action-column">
                                            <a href="update_kullanıcı.php?id=<?= $resultItem['id'];?>" class="btn btn-success btn-sm">Güncelle</a>
                                            <button type="submit" class="btn-danger" name="kullanıcı_delete">Sil</button>
                                            <input type="hidden" name="id" value="<?= $resultItem['id']; ?>">
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="7"> kayıt bulunamadı
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
