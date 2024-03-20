document.addEventListener("DOMContentLoaded", function() {
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {

        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    // Otomatik geçiş
    function autoSlide() {
        showSlides(slideIndex += 1);
    }

    // 3 saniyede bir otomatik geçiş
    setInterval(autoSlide, 3000);

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";

        // Resimlere tıklanınca da geçiş yapma
        for (i = 0; i < dots.length; i++) {
            dots[i].addEventListener("click", function() {
                currentSlide(Array.from(dots).indexOf(this) + 1);
            });
        }

        // Resimlere tıklanınca da geçiş yapma (alternatif)
        // for (i = 0; i < slides.length; i++) {
        //     slides[i].addEventListener("click", function() {
        //         currentSlide(Array.from(slides).indexOf(this) + 1);
        //     });
        // }
    }
});
