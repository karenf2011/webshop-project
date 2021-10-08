@extends('layouts.layout')

@section('content')

<div class="productsection wf-section">
    <div class="productpageheading">
        <h4 class="heading productcategory">Alle producten</h4>
        <div class="div-block-51">
                <form method="GET" action="/products">
                    <select name="sort">
                    <option selected value="{{ session('sort') }}">Sorteer</option>
                    <option value="price_asc">Prijs oplopend</option>
                    <option value="price_dcs">Prijs aflopend</option>                       
                    </select>
        </div>
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
                        value="{{ session('min_price') }}" min="0" max="200" step="1">
                    <input type="range" name="max_price" id="max-price" class="price-slider-range"
                        value="{{ session('max_price') }}" min="0" max="200" step="1">
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
            <div class="productcard">
                <a href="{{ route ('products.show', $product) }}">
                <div class="productimage">
                    <img src="{{ asset($product->images->first()->img_path) }}"
                        loading="lazy" sizes="(max-width: 479px) 89vw, (max-width: 767px) 67vw, 70vw"
                        srcset="{{ asset($product->images->first()->img_path) }}"
                        alt="" class="image-11" />
                </div>
                </a>
                <div class="productinformation">
                    <a href="{{ route ('products.show', $product) }}">
                    <h4 class="productcardtitle">{{ $product->brand->name }} {{ $product->brand->line }} {{ $product->name }}</h4>
                    <div>{{ $product->time_period->name }}</div>
                    </a>
                    @auth
                    @if ($wishlist)
                    @foreach ($wishlist as $favorite)
                        @if($product->id === $favorite->product_id)
                            <div id="{{ $product->id }}" class="remove-from-wishlist" w_id="{{ $favorite->id }}">
                            <img src="/images/passion.png"
                        loading="lazy" width="41" alt="" class="image-13" />
                            </div>
                        @else
                            <div id="{{ $product->id }}" class="add-to-wishlist">
                            <img src="/images/favorite.png"
                        loading="lazy" width="41" alt="" class="image-13" />
                            </div>
                        @endif
                    @endforeach
                    @else
                        <div id="{{ $product->id }}" class="add-to-wishlist">
                            <img src="/images/favorite.png"
                        loading="lazy" width="41" alt="" class="image-13" />
                            </div>
                    @endif
                    @endauth
                    <h4 class="productcardtitle price">€ {{ $product->price }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

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

@push('scripts')
    <script>
        $(document).on('click', '.add-to-wishlist', function (event) {
            let product_id = $(this).attr('id');

            axios({
                method: 'POST',
                url: '{{ route("wishlist.store") }}',
                data: {
                    product_id: product_id
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('#' + product_id).removeClass('add-to-wishlist').addClass('remove-from-wishlist').attr('w_id', response.data.w_id)
                    $('#' + product_id).html(response.data.html).replace()
                }
            }).catch(function (error) {
            
            })
        })
    </script>

    <script>
        $(document).on('click', '.remove-from-wishlist', function (event) {
            let wishlist_id = $(this).attr('w_id');
            let product_id = $(this).attr('id');

            axios({
                method: 'POST',
                url: '{{ route("wishlist.delete") }}',
                data: {
                    w_id: wishlist_id,
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('#' + product_id).removeClass('remove-from-wishlist').addClass('add-to-wishlist').removeAttr('w_id')
                    $('#' + product_id).html(response.data.html).replace()
                }
            }).catch(function (error) {
            
            })
        })
    </script>
@endpush