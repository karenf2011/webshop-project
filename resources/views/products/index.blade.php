@extends('layouts.layout')

@section('content')

<div class="productsection wf-section">
    <div class="productpageheading">
        <h4 class="heading productcategory">Alle producten</h4>
       
        <div class="div-block-51">

            <!-- <div data-hover="false" data-delay="0" class="w-dropdown">
                <div class="dropdown-toggle-2 w-dropdown-toggle">
                    <div class="icon w-icon-dropdown-toggle"></div>
                    <div class="text-block-10">Sorteer op</div>
                </div> -->
                <form method="GET" action="/products">
                        <!-- <select  id="sort" name="sort">
                            <option value="price_asc">Prijs oplopend</option>
                            <option value="price_dcs">Prijs aflopend</option>
                        </select> -->

                        <select class="selectpicker" name="sort">
                        <option selected value="{{ Session::get('sort') }}">Kies</option>
                        <option value="price_asc">Prijs oplopend</option>
                        <option value="price_dcs">Prijs aflopend</option>                       
                        </select>
                <!-- <nav class="dropdown-list w-dropdown-list">
                </nav> -->
            <!-- </div> -->
        </div>
        
        <script>

        </script>

    </div>
    <div class="productcontainer w-container">
        <div class="filterwrapper">
            <div class="brands">
                <div class="brandfield">
            
                @foreach ($brands as $brand)
                    <div class="brand">
                        <input type="checkbox" class="brandcheckbox"  name="brand[]" value="{{$brand->id}}">
                        <label> {{$brand->name}} {{$brand->line}} </label>
                    </div>
                @endforeach

                </div>

            </div>

 

            <div class="pricefilter">
                <div class="price-slider">

                    <p id="price-slider-paragraph">
                        € 0 - € 200
                    </p>


                    <input type="range" name="min_price" id="min-price" class="price-slider-range"
                        value="{{ Session::get('min_price') }}" min="0" max="200" step="1">
                    <input type="range" name="max_price" id="max-price" class="price-slider-range"
                        value="{{ Session::get('max_price') }}" min="0" max="200" step="1">


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
                    <img src="{{ asset($product->images->first()->img_path) }}"
                        loading="lazy" sizes="(max-width: 479px) 89vw, (max-width: 767px) 67vw, 70vw"
                        srcset="{{ asset($product->images->first()->img_path) }}"
                        alt="" class="image-11" />
                    <img class="wishlist" p_id="{{ $product->id }}" src="images/favorite.png"
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
<script>
$('#mov_type').on('change', function() {
    // Save value in localstorage
    localStorage.setItem("mov_type", $(this).val());
 
 $(document).ready(function() {
   if ($('#mov_type').length) {
      $('#mov_type').val(localStorage.getItem("mov_type"));
   }
});
</script>
<script>
(function() {
    let boxes = document.querySelectorAll("input[name='brand[]']");
    for (var i = 0; i < boxes.length; i++) {
        var box = boxes[i];
        if (box.hasAttribute("value")) {
            setupBox(box);
        }
    }

    function setupBox(box) {
        let storageId = box.getAttribute("value");
        let oldVal    = localStorage.getItem(storageId);
        box.checked = oldVal === "true" ? true : false;
        box.addEventListener("change", function() {
            localStorage.setItem(storageId, this.checked);
        });
    }
})();
</script>  


<script>
    slider();

    function slider() {
        const range = document.getElementsByClassName('price-slider-range');
        const min = Math.min(range[0].value, range[1].value);
        const max = Math.max(range[0].value, range[1].value);
        document.getElementById('price-slider-paragraph').innerHTML = `€ ${min} - € ${max}`;

        const progress = document.getElementById('price-progress');
        progress.style.setProperty('--max', max);
        progress.style.setProperty('--min', min);
    }

    const range = document.querySelectorAll('input[type=range]')

    range.forEach((r) => {
        r.addEventListener('mousemove', () => {
            slider();
        })
    })
</script>
@endsection

{{-- @push('scripts')
    <script>
        $(document).on('click', '.wishlist', function (event) {
            let product_id = $(this).attr('p_id');

            axios({
                method: 'POST',
                url: '{{ route("wishlist") }}'
                data: {
                    product_id: product_id
                }
            }).then(function (response) {
                if (response.data.success) {
                   
                }
            }).catch(function (error) {
            
            })
        })
    </script>
@endpush --}}