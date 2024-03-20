<!-- <?php

// @include 'config.php';

// session_start();

// if(!isset($_SESSION['usermail'])){
//    header('location:login_form.php');
// }



?> -->

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style2.css">
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <link href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
   <script src="file.js"></script>
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
 

   </header>  
<!-- header end -->


<!-- side bar start-->
<!-- <div class="side-nav">
    <h1 >HİZMETLERİMİZ</h1>
    <ul>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>
        <li><img src="img/kalp.png" alt=""><p>aaaa</p></li>

    </ul>

</div> -->

<!-- start bar end -->

<div class="wrapper">
        <div class="sidebar">
            
            <ul>
                <li href="#cilt"><a href="#cilt"><i class="fas fa-heart"></i>CİLT BAKIMI</a></li>
                <li href="#HYDRAFACİAL"><a href="#HYDRAFACİAL"><i class="fas fa-heart"></i>HYDRAFACİAL</a></li>
                <li href="#MAKYAJ"><a href="#MAKYAJ"><i class="fas fa-heart"></i>KALICI MAKYAJ</a></li>
                <li href="#PADİKÜR&MANİKÜR"><a href="#PADİKÜR&MANİKÜR"><i class="fas fa-heart"></i>PADİKÜR&MANİKÜR</a></li>
                <li href="#Lazer"><a href="#Lazer"><i class="fas fa-heart"></i>LAZER</a></li>
                <li href="#kirpik"><a href="#kirpik"><i class="fas fa-heart"></i>KİRPİK LİFTİNG</a></li>
            </ul> 
    
        </div>

</div>

<div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img\hizmet1\1.png" style="width:100%">
        <div class="text"></div>
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img\hizmet1\2.png" style="width:100%">
        <div class="text"></div>
        </div>
    
        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img\hizmet1\3.png" style="width:100%">
        <div class="text"></div>
        </div>
    
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    
    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>    
</div>

<div class="content_hizmet">
    <h1>Cilt Bakımı</h1>
    <div class="grid-container" id="cilt">
        <p>Cilt yapısını tanıyıp düzenli bakım yapmak oldukça önemlidir. Düzenli cilt bakımı, daha sağlıklı ve aydınlık bir cilde sahip olmanıza olanak tanımaktadır. Özel olarak geliştirilen teknolojik aletlerle yapılan cilt bakımlarımız, mükemmel bir cilde sahip olmanızı sağlamaktadır. Klasik cilt bakımında, cildiniz tüm siyah nokta ve yağlardan arındırılmakta, serum, maske ve masajla beslenmektedir.</p>


                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\7.png" style="width:100%">
                
    
    </div>


    <h1>HYDRAFACİAL</h1>
    <div class="grid-container" id="HYDRAFACİAL">
        <p>Cildi ölü derilerden arındırır cildin en üst tabakasındaki yıpranmış, hasarlı, ölü dokuların uzaklaştırılması amaçlanır. Siyah nokta, yağ bezesi , akne gibi cilt sorunlarını giderir. Cilt alt dokuların tetiklenmesiyle beraber yenilenen doku ortaya çıkar ve uygulama esnasında kullanılan solisyonlarla hızlı emilim sağlar.Ayda 1 kerelik periyotlarda işlem yapılır. Hydrafacial cilt problemine bağlı kalarak ortalama 4 seansa kadar önerilir.</p>

                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\9.png" style="width:100%">
                
    
    </div>


    <h1>KALICI MAKYAJ</h1>
    <div class="grid-container" id="MAKYAJ">
        <P>Kalıcı makyaj hata kabul etmez kendinizi kime teslim ettiğinize çok dikkat edin. Salonumuz kalıcı makyaj konusunda son derece profesyonel bir ekip ile çalışmaktadır. Üç boyutlu kıl effekti ve kalıcı kıl tekniği çalışmaları ile son derece doğal görünüşlü kaş yapısı sizlere sunulmaktadır. Gerçek kaş görünümünde olan bu sistem Avrupa ve Amerika’dan sonra Türkiye de!</P>

                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\11.png" style="width:100%">
                
    
    </div>


    <h1>PADİKÜR&MANİKÜR</h1>
    <div class="grid-container" id="PADİKÜR&MANİKÜR">
            <p>Geleneksel manikür pedikür uygulamalarının aksine el ve ayakların suda beklemediği, tırnakların kuru olarak şekillendirildiği uygulamadır. Profesyonel cihaz ve uçlar yardımıyla uzman kişilerce uygulanır. Tırnak etlerinin derinlemesine temizlenmesi sağlar, sadece deri üstü değil deri altından gelmekte olan keratin sıkışmalarının temizlenmesi işlemidir. Kesme işlemi yapılmaması nedeniyle manikür ve pedikür kullanım süresini ortalama 1 hafta daha uzatır</p>

                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\10.png" style="width:100%">
                
    
    </div>


    <h1>LAZER EPİLASYON</h1>
    <div class="grid-container" id="Lazer">
        <p>Diğer yöntemlere kıyasla daha acısız ve pratik olan lazer epilasyon, en çok talep gören yöntemdir. Lazer epilasyonda yapılan işlem, lazerin kıllara rengini veren melanin isimli maddeye tutunmasıdır. Bu sırada oluşan ısı kıl köklerini etkiler ve orada yer alan kök hücrelerin deforme olmasını sağlayıp kıl oluşumunu engeller.</p>           
                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\8.png" style="width:100%">


    </div>


    <h1>KİRPİK LİFTİNG</h1>
    <div class="grid-container" id="kirpik">
        <p>Argan yağı, proteinler, keratin ve vitaminler ile kirpikleri güçlendiren ve besleyen, hidrolize keratin maskesi ile yapılan işlemdir. Bu besleyici maske, kirpikleri keratin ile doldurarak daha kalın, dolgun ve uzun hale getirir. İki kata kadar hacimli kirpikler ortaya çıkar. Kirpiklere zarar vermez, aksine besler ve güçlendirir.</p>

                <!-- Full-width images with number and caption text -->
                <img src="img\hizmet1\12.png" style="width:100%">
                
    
    </div>
</div>



<!-- <div class="content_hizmet">
    <h1>Cilt Bakımı</h1>
    <div class="grid-container">
        <p>Cilt yapısını tanıyıp düzenli bakım yapmak oldukça önemlidir. Düzenli cilt bakımı, daha sağlıklı ve aydınlık bir cilde sahip olmanıza olanak tanımaktadır. Özel olarak geliştirilen teknolojik aletlerle yapılan cilt bakımlarımız, mükemmel bir cilde sahip olmanızı sağlamaktadır. Klasik cilt bakımında, cildiniz tüm siyah nokta ve yağlardan arındırılmakta, serum, maske ve masajla beslenmektedir.</p>
        <div class="image">
            <img src="img\hizmet\1.png" alt="Cilt Bakımı Resmi">
        </div>
    </div>
</div> -->





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>