@extends('layouts.layout')

@section('content')


<div class="slugsection">
    <div class="slugcontainer">
        <div class="sluggrid">

            <div class="sluggridphotos">
                @foreach($product->images as $product->image)
                    <img src="{{ url($product->image->img_path) }}" onclick="openModal();currentSlide(1)"
                        target="_blank" data-action="lightbox-open" class="img-fluid" alt="Responsive image">
                @endforeach

                <div id="myModal" class="modal">
                    <div class="modal-content">
                        @foreach($product->images as $key =>  $product->image)
                            <span class="close cursor" onclick="closeModal()">&times;</span>
                            <div style="background-color: rgba(0, 0, 0, .8);" class="mySlides">
                                <div class="numbertext">{{ $key +1 }} / {{ count($product->images) }}</div>
                                <div  class="modalimage">
                                    <!-- <img src="{{ url($product->image->img_path) }}"
                                    style="width:100vw; height:100vh; padding-bottom:50px; padding-top:50px;padding-right:25vw;padding-left:25vw;"> -->
                                    <img src="{{ url($product->image->img_path) }}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                            <!-- Next/previous controls -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="sluginfo">
            <h3>{{ $product->brand->name }} {{ $product->brand->line }} {{ $product->name }}</h3>
            <h4>{{ $product->time_period->name }}</h4>
            <h4>Categorieën</h4>
            @foreach($product->categories as $product->category)
                <p>{{ $product->category->name }}</p>
            @endforeach
            <h4>Prijs : &euro;{{ $product->price }}</h4>
            <a href="/cart" class="button-4 w-button add-to-cart" p_id="{{ $product->id }}">ADD TO CART</a>


        </div>

      

    </div>
  </div>
</div>

<div class="section-2 wf-section">
    <div class="container-6 related w-container">
        <div class="div-block-87">
            <h3 class="heading-19">Gerelateerde producten</h3>
            <div class="w-layout-grid productpagegrid">
                <div class="productcard">
                    <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy"
                            sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw"
                            srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt=""
                            class="image-11">
                        <img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13"></div>
                    <div class="productinformation">
                        <h4 class="productcardtitle">Nike - Blue pot</h4>
                        <div>Tijdsperiode : 70&#x27;s<br><br></div>
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

    let slideIndex = 1;
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
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("demo");
        let captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length - 1
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }

</script>
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.add-to-cart', function (event) {
            let product_id = $(this).attr('p_id');

            axios({
                method: 'POST',
                url: '{{ route("cart") }}',
                data: {
                    product_id: product_id,
                    quantity: 1,
                }
            }).then(function (response) {
                if (response.data.success) {
                    console.log(response.data.message);
                }
            }).catch(function (error) {

            })
        })

    </script>
@endpush
