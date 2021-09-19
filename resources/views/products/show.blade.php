@extends('layouts.layout')

@section('content')

<div class="wf-section">
    <div class="container-4 w-container">
      <div class="w-layout-grid grid-2">
        <div class="div-block-57">
          <div class="productdetails card">
            <div class="productcard details">
              <div class="productimage">
                  
                <a href="#" class="lightbox-link w-inline-block w-lightbox">
                <img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13">
                
                <!-- <img src="/images/product-2.jpeg" loading="lazy" width="261" sizes="(max-width: 479px) 90vw, (max-width: 767px) 45vw, (max-width: 991px) 35vw, 25vw" srcset="/images/product-2-p-800.jpeg 800w, images/product-2.jpeg 972w" alt="" class="image-27"> -->
                @foreach ($product->images as $product->image)
                @if ($loop->first)
                <img src="{{url($product->image->img_path)}}" loading="lazy" width="261" sizes="(max-width: 479px) 90vw, (max-width: 767px) 45vw, (max-width: 991px) 35vw, 25vw" srcset="{{url($product->image->img_path)}}, {{url($product->image->img_path)}}" alt="" class="image-27">
                @endif
                @endforeach
                
                @foreach ($product->images as $product->image)
                @if ($loop->first) @continue @endif
                <img src="{{url($product->image->img_path)}}" loading="lazy" width="112" sizes="(max-width: 767px) 80px, 120px" srcset="{{url($product->image->img_path)}} 1080w, {{url($product->image->img_path)}} 1332w" alt="" class="image-28">
                <!-- <img src="/images/product1.jpeg" loading="lazy" width="112" sizes="(max-width: 767px) 80px, 120px" srcset="/images/product1-p-1080.jpeg 1080w, /images/product1.jpeg 1332w" alt="" class="image-28"> -->
                @endforeach
                  
                <script type="application/json" class="w-json">{
  "items": [
    @foreach ($product->images as $product->image)
    {
      "width": 972,
      "caption": "",
      "height": 1296,
      "fileName": "613600a2590665c96799b700_product 2.jpeg",
      "origFileName": "product 2.jpeg",
      "url": "{{url($product->image->img_path)}}",
      "_id": "613600a2590665c96799b700",
      "type": "image",
      "fileSize": 43804
    }, 
    @endforeach
    
    {
      "width": 1332,
      "caption": "",
      "height": 1000,
      "fileName": "6136007fe16aa28c6d5f6a91_product1.jpeg",
      "origFileName": "product1.jpeg",
      "url": "",
      "_id": "6136007fe16aa28c6d5f6a91",
      "type": "image",
      "fileSize": 157120
    },
    {
      "width": 1024,
      "caption": "",
      "height": 768,
      "fileName": "6135decb1aac48075ba50cfd_glasswerk rood.jpeg",
      "origFileName": "glasswerk rood.jpeg",
      "url": "",
      "_id": "6135decb1aac48075ba50cfd",
      "type": "image",
      "fileSize": 86662
    }
  ],
  "group": "Images"
}</script>
    
                </a>
                <div class="productinformation">
                  <h4 class="productcardtitle">{{$product->brand->name}} {{$product->brand->line}} {{$product->name}}</h4>
                  <div class="text-block-12">{{$product->time_period->name}}</div>
                  <h4 class="productcardtitle price">&euro;{{$product->price}}</h4>
                  <div class="instock"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="div-block-57">
          <div class="productdetails _2">
            <div class="div-block-59">
              <div class="w-layout-grid grid-11">
                <h4>Category</h4>
                <h4>Keramic</h4>
              </div>
              <div class="w-layout-grid grid-11">
                <h4>Price</h4>
                <h4>&euro;{{$product->price}}-</h4>
              </div>
              <div class="w-layout-grid grid-11">
                <h4>Stock</h4>
                <h4>{{$product->stock}}</h4>
              </div>
              <div class="div-block-60">
                <a href="#" class="button-4 w-button">ADD TO CART</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-2 wf-section">
    <div class="container-6 related w-container">
      <div class="div-block-87">
        <h3 class="heading-19">Related products</h3>
        <div class="w-layout-grid productpagegrid">
          <div class="productcard">
            <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy" sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw" srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt="" class="image-11">
            <img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13"></div>
            <div class="productinformation">
              <h4 class="productcardtitle">Nike - Blue pot</h4>
              <div>Time period : 70&#x27;s<br><br></div>
              <h4 class="productcardtitle price">$ 39,99</h4>
              <div class="instock"></div>
            </div>
          </div>
          <div class="productcard">
            <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy" sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw" srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt="" class="image-11"><img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13"></div>
            <div class="productinformation">
              <h4 class="productcardtitle">Nike - Blue pot</h4>
              <div>A short description</div>
              <h4 class="productcardtitle price">$ 39,99</h4>
              <div class="instock"></div>
            </div>
          </div>
          <div class="productcard">
            <div class="productimage"><img src="/images/product-2.jpeg" loading="lazy" sizes="(max-width: 479px) 70vw, (max-width: 767px) 67vw, 70vw" srcset="/images/product-2-p-800.jpeg 800w, /images/product-2.jpeg 972w" alt="" class="image-11"><img src="/images/favorite.png" loading="lazy" width="41" alt="" class="image-13"></div>
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
  
@endsection