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
            
                <nav class="dropdown-list w-dropdown-list">
                    
                    <form method="GET" action="/products">
                    <select name="sort">
                        <option value="price_asc">Prijs oplopend</option>
                        <option value="price_dcs">Prijs aflopend</option>
                    </select>
                   
                </nav>
            </div>
        </div>
    </div>
    <div class="productcontainer w-container">
        <div class="filterwrapper">
            <div class="brands">
                <div class="brandfield">
                    <div class="brand">
                        <input type="checkbox" id="brandcheckbox" name="brand" value="italla">
                        <label for="vehicle1"> Italla</label>
                    </div>
                    <div class="brand">
                        <input type="checkbox" id="brandcheckbox" name="brand" value="ittala-ultima">
                        <label for="vehicle1"> Italla ultima</label>
                    </div>
                    <div class="brand">
                        <input type="checkbox" id="brandcheckbox" name="brand" value="arabia-artica">
                        <label for="vehicle1"> Arabia artica</label>
                    </div>
              
                </div>
                
                <div class="brandfield">
                    <div class="brand">
                        <input type="checkbox" id="brandcheckbox" name="brand" value="arabia-lumi">
                        <label for="vehicle1"> Arabia lumi</label>
                    </div>
                    <div class="brand">
                        <input type="checkbox" id="brandcheckbox" name="brand" value="marimekko">
                        <label for="vehicle1"> Marimekko</label>
                    </div>
                </div>
                
        
            </div>
          
            <div class="pricefilter">
                <div class="price-slider">
  
                    <p  id="price-slider-paragraph">
                      € 0 - € 200
                    </p>
                    
           
                    <input type="range" 
                           name="min_price" 
                           id="min-price" 
                           class="price-slider-range"  
                           value="{{ Session::get('min_price')}}"
                           min="0" 
                           max="200" 
                           step="1"
                           >
                    <input type="range" 
                           name="max_price" 
                           id="max-price" 
                           class="price-slider-range"
                           value="{{ Session::get('max_price')}}"
                           min="0" 
                           max="200" 
                           step="1" >
                           
                    
                    <div class="price-progress" id="price-progress"></div>
                  
                    
                  </div> 
                
            </div>
       
        </div>
        <div class="filterbutton">
            <input type="submit" value="Filter" id="filterbutton">
        </div>
    </form>
        <div class="w-layout-grid productpagegrid">

            @foreach ($products as $product)
            <a href="{{ route ('products.show', $product) }}">
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
                    <h4 class="productcardtitle price">€ {{$product->price}}</h4>
                </div>
            </div>
            </a>
            @endforeach

        </div>
    </div>
</div>
 <script>
 slider();


function slider(){
  const range = document.getElementsByClassName('price-slider-range');
  const min = Math.min(range[0].value, range[1].value);
  const max = Math.max(range[0].value, range[1].value);
  document.getElementById('price-slider-paragraph').innerHTML = `€ ${min} - € ${max}`;

  const progress = document.getElementById('price-progress');
  progress.style.setProperty('--max', max);
  progress.style.setProperty('--min', min);
}

const range = document.querySelectorAll('input[type=range]')

range.forEach((r)=>{
  r.addEventListener('mousemove', ()=>{
    slider();
  })
})

 </script>
@endsection
