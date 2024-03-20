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
        <a href="admin_page.php">ANASAYFA</a>
        <a href="kullanıcılar.php">KULLANICILAR</a>
        <a class="active" href="contact.php">İLETİŞİM</a>
        <a href="calisanlar.php">ÇALIŞANLAR</a>
    </div>
    
    <!-- Topbar -->
    <div class="top">
        <h2>İLETİŞİM</h2>
    </div>
</div>

<!-- Page content -->
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        İLETİŞİM MESAJLARI
                    </h4>
                </div>
                <div class="card-body">
    
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
    
                            <th>
                                Ad
                            </th>
    
                            <th>
                                Email
                            </th>
                            <th>
                                Telefon Numarası
                            </th>
                            <th>
                                Text
                            </th>
    
    
                            <th>
                                Action
                            </th>
    
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                            $query="SELECT * FROM contact_us";
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
                                        <td><?= $resultItem['phoneNumber']?></td>
                                        <td><?= $resultItem['text']?></td>
                                        <td class="action-column">
                                            <a href="geri_mesaj.php?id=<?= $resultItem['id'];?>" class="btn btn-success btn-sm">Cevapla</a>
                                            
                                        </td>
                                        
                                    </tr>
    
                                    <?php
                                }
    
    
                            }else{
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
    
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
