<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    $email =  $_POST['usermail'];
    $pass = $_POST['password'];

    $select = " SELECT * FROM user_db WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            session_start();
            $_SESSION['adminmail'] = $email;
            header('location:adminPage\admin_page.php');
        } elseif ($row['user_type'] == 'user') {
            session_start();
            $_SESSION['usermail'] = $email;
            header('location:user.php');
        }
    } 
    
}

else if (isset($_POST['kayitsiz'])) {
    // Store bosmail in the session
    $_SESSION['usermail'] = null; // or don't set it at all if you want to check existence in user.php

    // Redirect to user.php
    header("location:user.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3 class="title">giriş</h3>
        
            <input type="email" name="usermail" placeholder="email adresinizi giriniz" class="box" >
            <input type="password" name="password" placeholder="şifrenizi giriniz" class="box" >

            <input type="submit" value="Giriş Yap" class="form-btn" name="submit">
            <a href="user.php?email=<?php echo urlencode($email); ?>" class="form-btn" name="kayitsiz">Giriş Yapmadan Devam Et</a>
            <p>hesabın yok mu? <a href="register_form.php">kayıt ol!</a></p>
        </form>

    </div>

</body>

</html>


