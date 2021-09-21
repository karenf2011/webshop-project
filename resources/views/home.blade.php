@extends('layouts.layout')

@section('content')
<div class="mobilesubmenu">
        <a href="/products" class="link-block w-inline-block">
            <h4 class="heading">ALLE PRODUCTEN</h4>
        </a>
        <a href="categories/glaswerk" class="link-block w-inline-block">
            <h4 class="heading">GLASWERK</h4>
        </a>
        <a href="categories/keramiek" class="link-block w-inline-block">
            <h4 class="heading">KERAMIEK</h4>
        </a>
        <a href="categories/servies" class="link-block w-inline-block">
            <h4 class="heading">SERVIES</h4>
        </a>
        <a href="categories/sierobjecten" class="link-block w-inline-block">
            <h4 class="heading">SIEROBJECTEN</h4>
        </a>
    </div>
<div class="homecontentsection wf-section">
    
    <div class="homecontentcontainer w-container">
        <div class="homecontenmain"><img src="images/Piet_Mondriaan_-_03.jpeg" loading="lazy"
                sizes="(max-width: 479px) 90vw, 70vw"
                srcset="images/Piet_Mondriaan_-_03-p-500.jpeg 500w, images/Piet_Mondriaan_-_03-p-800.jpeg 800w, images/Piet_Mondriaan_-_03-p-1080.jpeg 1080w, images/Piet_Mondriaan_-_03.jpeg 1131w"
                alt="" class="image-4">
            <div class="homecontenttitle">
                <h1 class="heading-2 partone">Unique glasswork for </h1>
                <h1 class="heading-2 parttwo">your home decoration.</h1>
            </div>
        </div>
        <br>
        <br>
        <div class="div-block-87">
            <h3 class="heading-19">Featured</h3>
            <div class="w-layout-grid productpagegrid">


                @foreach($featured as $feature)
                <a href="/products/{{$feature->slug}}">
                <div class="productcard">
                        <div class="productimage"><img src="{{ url($feature->images->first()->img_path) }}"
                                loading="lazy" sizes="(max-width: 479px) 90vw, (max-width: 767px) 67vw, 70vw"
                                srcset="{{ url($feature->images->first()->img_path) }}, {{ url($feature->images->first()->img_path) }}"
                                alt="" class="image-11"><img src="images/favorite.png" loading="lazy" width="41" alt=""
                                class="image-13"></div>
                        <div class="productinformation">
                            <h4 class="productcardtitle">{{ $feature->brand->name }} {{ $feature->brand->line }}
                                {{ $feature->name }}</h4>
                            <div>Time period : {{$feature->time_period->name}} </div>
                            <h4 class="productcardtitle price">&euro;{{ $feature->price }}</h4>
                            <div class="instock"></div>
                        </div>
                </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
