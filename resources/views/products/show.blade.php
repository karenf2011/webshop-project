@extends('layouts.layout')

@section('content')


  <div class="slugsection">
    <div class="slugcontainer">

   

  </div>
  </div>

<div class="section-2 wf-section">
    <div class="container-6 related w-container">
        <div class="div-block-87">
            <h3 class="heading-19">Related products</h3>
            <div class="w-layout-grid productpagegrid">
                <div class="productcard">
                    <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy"
                            sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw"
                            srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt=""
                            class="image-11">
                        <img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13"></div>
                    <div class="productinformation">
                        <h4 class="productcardtitle">Nike - Blue pot</h4>
                        <div>Time period : 70&#x27;s<br><br></div>
                        <h4 class="productcardtitle price">$ 39,99</h4>
                        <div class="instock"></div>
                    </div>
                </div>
                <div class="productcard">
                    <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy"
                            sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw"
                            srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt=""
                            class="image-11"><img src="/images/favorite.png" loading="lazy" width="41" alt=""
                            class="image-13"></div>
                    <div class="productinformation">
                        <h4 class="productcardtitle">Nike - Blue pot</h4>
                        <div>A short description</div>
                        <h4 class="productcardtitle price">$ 39,99</h4>
                        <div class="instock"></div>
                    </div>
                </div>
                <div class="productcard">
                    <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy"
                            sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw"
                            srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt=""
                            class="image-11"><img src="/images/favorite.png" loading="lazy" width="41" alt=""
                            class="image-13"></div>
                    <div class="productinformation">
                        <h4 class="productcardtitle">Nike - Blue pot</h4>
                        <div>A short description</div>
                        <h4 class="productcardtitle price">$ 39,99</h4>
                        <div class="instock"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Open the Modal
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    // Close the Modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
  
    var slideIndex = 1;
    // showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
       
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length -1
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        } console.log (slides);
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }

</script>
@endsection
