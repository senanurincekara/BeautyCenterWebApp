<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_db WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'user already exist';
   }else{
      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_db(name,email, password,user_type) VALUES('$name','$email','$pass','$user_type')";
         $result_insert = mysqli_query($conn, $insert);

         if ($result_insert) {
            echo "Kullanıcı başarıyla kaydedildi.";
            header('location: login_form.php');
         } else {
            echo "Kayıt sırasında bir hata oluştu: " . mysqli_error($conn);
         }
      }
   }

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
      <h3 class="title">kayıt ol</h3>
      <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
      ?>
      <input type="email" name="usermail" placeholder="email adresinizi giriniz" class="box" required>
      <input type="name" name="name" required placeholder="name"class="box" required>
      <input type="password" name="password" placeholder="şifrenizi giriniz" class="box" required>
      <input type="password" name="cpassword" placeholder="şifrenizi tekrar giriniz" class="box" required>
      <select name="user_type" class="box" required>
            <option value="user">user</option>
            
        </select>
      <input type="submit" value="register now" class="form-btn" name="submit">
      <p>Hesabınız var mı? <a href="login_form.php">GİRİŞ!</a></p>
   </form>

</div>

</body>
</html>