@extends('layouts.layout')

@section('content')

<div class="productsection wf-section">
    <div class="productpageheading">
        <h4 class="heading productcategory">{{ $category->name }}</h4>
    </div>
    <div class="productcontainer w-container">
        <div class="w-layout-grid productpagegrid">
            @foreach ($products as $product)
                <div class="productcard">
                    <a href="{{ route ('products.show', $product) }}">
                    <div class="productimage">
                        <img src="{{ asset($product->images->first()->img_path) }}" loading="lazy" sizes="(max-width: 479px) 89vw, 
                            (max-width: 767px) 67vw, 70vw" srcset="{{ asset($product->images->first()->img_path) }}" alt="" class="image-11" />
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