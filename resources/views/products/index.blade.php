@extends('layouts.layout')

@section('content')

<div class="productsection wf-section">
    <div class="productpageheading">
        <h4 class="heading productcategory">Alle producten</h4>
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
            <a href="{{ route ('products.show', $product) }}">
            <div class="productcard">
                <div class="productimage">
                    <img src="{{ asset($product->images->first()->img_path) }}"
                        loading="lazy" sizes="(max-width: 479px) 89vw, (max-width: 767px) 67vw, 70vw"
                        srcset="{{ asset($product->images->first()->img_path) }}"
                        alt="" class="image-11" />
                    <img src="images/favorite.png"
                        loading="lazy" width="41" alt="" class="image-13" />
                </div>
                <div class="productinformation">
                    <h4 class="productcardtitle">{{ $product->brand->name }} {{ $product->brand->line }} {{ $product->name }}</h4>
                    <div>{{ $product->time_period->name }}</div>
                    <h4 class="productcardtitle price">€ {{ $product->price }}</h4>
                </div>
            </div>
            </a>
            @endforeach
        </div>
        
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
</div>
@endsection
