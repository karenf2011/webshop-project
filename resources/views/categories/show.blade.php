@extends('layouts.layout')

@section('content')

<div class="productsection wf-section">
    <div class="mobilesubmenu">

        <div class="w-embed">
        <style>
        .mobilesubmenu::-webkit-scrollbar {
            display: none; 
        }
        .left {
            -ms-overflow-style: none; 
            overflow: -moz-scrollbars-none; 
        }
        </style>
        </div>
        <a href="/products" class="link-block w-inline-block">
            <h4 class="heading">ALLE PRODUCTEN</h4>
        </a>
        <a href="/categories/glaswerk" class="link-block w-inline-block">
            <h4 class="heading">GLASWERK</h4>
        </a>
        <a href="/categories/keramiek" class="link-block w-inline-block">
            <h4 class="heading">KERAMIEK</h4>
        </a>
        <a href="/categories/servies" class="link-block w-inline-block">
            <h4 class="heading">SERVIES</h4>
        </a>
        <a href="/categories/sierobjecten" class="link-block w-inline-block">
            <h4 class="heading">SIEROBJECTEN</h4>
        </a>
    </div>
    <div class="productpageheading">
        <h4 class="heading productcategory">{{$category->name}}</h4>
        
        <div class="div-block-51">
            <div data-hover="false" data-delay="0" class="w-dropdown">
                <div class="dropdown-toggle-2 w-dropdown-toggle">
                    <div class="icon w-icon-dropdown-toggle"></div>
                    <div class="text-block-10">Sorteer op</div>
                </div>
                <nav class="dropdown-list w-dropdown-list"><a href="#" class="w-dropdown-link">Link 1</a><a href="#"
                        class="w-dropdown-link">Link 2</a><a href="#" class="w-dropdown-link">Link 3</a></nav>
            </div>
        </div>
    </div>
    <div class="productcontainer w-container">
        <div class="w-layout-grid productpagegrid">

            @foreach ($products as $product)
            <a href="/products/{{$product->slug}}">
            <div class="productcard">
                <div class="productimage">
                    <img src="{{url($product->images->first()->img_path)}}"
                        loading="lazy" sizes="(max-width: 479px) 89vw, (max-width: 767px) 67vw, 70vw"
                        srcset="{{url($product->images->first()->img_path)}}"
                        alt="" class="image-11" />
                    <img src="https://uploads-ssl.webflow.com/6135cf84ecf1c75fd670d1a1/61375716bfa69365be757b67_favorite.png"
                        loading="lazy" width="41" alt="" class="image-13" />
                </div>
                <div class="productinformation">
                    <h4 class="productcardtitle">{{$product->brand->name}} {{$product->brand->line}} {{$product->name}}</h4>
                    <div>{{$product->time_period->name}}</div>
                    <h4 class="productcardtitle price">&euro;{{$product->price}}</h4>
                    <div class="instock">
                    </div>
                </div>
            </div>
            </a>
            @endforeach

        </div>
    </div>
</div>
@endsection
