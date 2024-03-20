<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['usermail']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user_db WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['adminmail'] = $email;
            header('location:adminPage\admin_page.php');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['usermail'] = $email;
            header('location:user.php');
        }
    } 
    
    else {
        $error[] = 'yanlış şifre veya email adresi !';
    }

}

else if (isset($_POST['kayitsiz'])) {
    $_SESSION['usermail'] = null; 

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
    <style>
        body {
            background-image: url('img/background/background.png');
            background-size: cover;
            font-family: sans-serif;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
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


