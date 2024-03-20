<!-- <?php

@include 'config.php';

session_start();

if(isset($_SESSION['usermail'])){
   echo"<h3>".$_SESSION["usermail"]." merhaba </h3>";
}
else{
   echo"bu sayfayı görüntüleme yetkinyok ";
}


?> -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style2.css">
   
   <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
</head>
<body>

<!-- header start -->
<header>
   <a href="#" class="logo">Carpe Diem Beauty Center <span></span></a>
   <nav class="navbar">
      <a href="user.php"> ANASAYFA</a>
      <a href="about_page.php">UZMANLARIMIZ</a>
      <a href="hizmet.php">HİZMETLERİMİZ</a>
      <a href="contact_page.php">İLETİŞİM</a>
      <a href="logout.php">ÇIKIŞ</a>

   </nav>
   <div class="icons">
      <a href="#" class="fas fa-heart"></a>
      <a href="#" class="fas fa-user"></a>

   </div>

   </header>  
<!-- header end -->

<!-- home section -->
<section class="home" id="home">
   <div class="content">
      <h3>Neden CARPE DIEM Beauty Center</h3>
      <span>Çünkü Her Güzellik Bir Detaydır Ve Biz Detayları Unutmuyoruz</span>
      <p>Müşterilerimize en kaliteli ve profesyonel hizmetleri sunma vizyonuyla hareket ediyoruz. Güzellik ve bakım konusundaki uzmanlığımızı kullanarak müşterilerimizin ihtiyaçlarına uygun çözümler sunuyoruz. Bu bağlamda, merkezimizde çeşitli hizmetler sunuyoruz ve müşterilerimizin güzellik yolculuklarında yanlarında oluyoruz.</p>
      <a href="contact_page.php" class="btn">İletişim</a>


   </div>


</section>

<!-- home end -->

<!-- about start-->

<section class="about" id="about">
   <h1 class="heading"><span>NEDEN</span> biz?</h1>
   <div class="row">
      <div class="video-container">
         <video src="img/videom.mp4" loop autoplay muted ></video>
         <h3>Hayalinizdeki Güzelliği Gerçeğe Dönüştürüyoruz</h3>

      </div>
      <div class="content">
         <h3>Neden bizi seçmelisin</h3>
         <p>15 yıllık birikimimizle, sektördeki değişen trendleri ve güzellik dünyasındaki yenilikleri yakından takip ederek müşterilerimize en son tekniklerle hizmet veriyoruz. Carpe Diem Beauty Center, güvenli ve etkili hizmetleri sunmak için sürekli olarak kendimizi geliştiriyor, kaliteyi ve müşteri memnuniyetini ön planda tutuyoruz.</p>
         <p>.................. </p>
         <a href="about_page.php" class="btn">Uzmanlarımız</a>

      </div>

   </div>

</section>
<!-- about end -->

<!-- icons start -->
<section class="icons-container">
   <div class="icons">
      <img src="img/2.png" alt="">
      <div class="info">
         <h3>PROFESYONEL KADROMUZ</h3>
         <span>sektörde +10 yıl uzmanlaşmış</span>
      </div>

   </div>

   <div class="icons">
      <img src="img/3.png" alt="">
      <div class="info">
         <h3>İNDİRİMLER VE HEDİYE KARTLARI</h3>
         <span>İlk seansına özel %50 indirim ve daha fazlası ...</span>
      </div>

   </div>
   

   <div class="icons">
      <img src="img/1.png" alt="">
      <div class="info">
         <h3>PARA İADESİ</h3>
         <span>Memnun kalmazsanız para iadesi</span>
      </div>

   </div>

</section> 

<!-- icons end -->

<!-- hizmet bsalangıc -->
<h1 class="heading">Hizmetlerimiz</h1>
<section class="products" id="products">
   
   <div class="box-container">

      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/4.png" alt="">
            <div class="icons">
               <a href="#" class="fas fa-heart"></a>
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>Cilt Bakımı</h3>
            <div class="price">$75<span>$100</span></div>

         </div>

      </div>

      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/1.png" alt="">
            <div class="icons">
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>Lazer</h3>
            <div class="price">$75<span>$100</span></div>

         </div>

      </div>

      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/3.png" alt="">
            <div class="icons">
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>Hydrafacial</h3>
            <div class="price">$75 <span>$100</span></div>

         </div>

      </div>


      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/5.png" alt="">
            <div class="icons">
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>Kalıcı Makyaj ve Makyaj işlemi</h3>
            <div class="price">$75 <span>$100</span></div>

         </div>

      </div>

      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/2.png" alt="">
            <div class="icons">
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>padikür,manikür,protez vb.</h3>
            <div class="price">$75 <span>$100</span></div>

         </div>

      </div>


      <div class="box">
         <span class="discount">-25%</span>
         <div class="image">
            <img src="img/hizmet/6.png" alt="">
            <div class="icons">
               <a href="#" class="cart-btn">DETAYLI BİLGİ</a>

            </div>

         </div>
         <div class="content">
            <h3>Kirpik Lifting</h3>
            <div class="price">$75 <span>100</span></div>

         </div>

      </div>

   </div>

</section>





<!-- hizmet son -->


<!-- rewiew basla -->
<!-- rewiew son -->

<!-- contact basla -->

<!-- <section class="contact" id="contact">
   <h1 class ="heading"> <span>İLETİŞİM</span></h1>
   <div class="row">
         <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="mesaj" id="" cols="30" rows="10"></textarea>
             <input type="submit" value="mesaj yaz" class="btn">  

         </form>
         <div class="image">
            <img src="img/contact.png" alt="">
         </div>


   </div>

</section> -->

<!-- contact son -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>