@extends('layouts.layout')

@section('content')

<div class="wf-section mt-5">
    <div class="container-4 w-container">
        <div class="w-layout-grid grid-2">
            <div class="div-block-57">
                <div class="productdetails checkout">
                    @foreach($products as $product)
                        <div class="productcard checkout" id="{{ $product->id }}">
                            <div class="div-block-61">
                                <a href="{{ route ('products.show', $product) }}">
                                    <img id='cartimage' src="{{ asset($product->images->first()->img_path) }}"
                                        class="img-fluid" alt="Responsive image">
                                </a>
                            </div>
                            <div class="div-block-62">
                                <a href="{{ route ('products.show', $product) }}">
                                    <div>{{ $product->brand->name }} {{ $product->brand->line }}
                                        {{ $product->name }}</div>
                                </a>

                                <div class="text-block-13">€ {{ $product->price }} p.s.</div>
                                <div class="div-block-65">
                                    <a class="button-5 w-button adjust-quantity" p_id="{{ $product->id }}"
                                        quantity="{{ $cart[$product->id] }}" value="-">-</a>
                                    <a class="button-6 w-button">{{ $cart[$product->id] }}</a>
                                    <a class="button-7 w-button adjust-quantity" p_id="{{ $product->id }}"
                                        quantity="{{ $cart[$product->id] }}" value="+">+</a>
                                </div>
                                <button class="delete" p_id="{{ $product->id }}">Verwijderen</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="productdetails part2">

                <div class="div-block-59">
                    <div class="text-block-11">Totaal : <span class="text-span-3">€
                            {{ $total }}</span><br>‍<br>Leveringstijd: 3-5 dagen <br><br><br><br><br></div>
                    <div class="div-block-60">
                        <a href="{{ route('orders.create') }}"
                            class="button-4 w-button">UITCHECKEN</a>
                        <a href="{{ route('products.index') }}" class="button-4 w-button">VERDER WINKELEN</a>
                    </div>
                    <div class="div-block-64"><img src="images/ideal-logo.svg" loading="lazy" width="84" alt=""
                            class="image-15"><img src="images/PayPal-Logo-PNG4.png" loading="lazy" width="111"
                            sizes="(max-width: 479px) 111px, (max-width: 767px) 14vw, (max-width: 991px) 13vw, 111px"
                            srcset="images/PayPal-Logo-PNG4-p-500.png 500w, images/PayPal-Logo-PNG4-p-800.png 800w, images/PayPal-Logo-PNG4-p-1080.png 1080w, images/PayPal-Logo-PNG4.png 5000w"
                            alt=""></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        // UPDATE FUNCTION
        $(document).on('click', '.adjust-quantity', function (event) {
            let product_id = $(this).attr('p_id');
            let quantity = $(this).attr('quantity');
            let operator = $(this).attr('value');
            (operator === '+') ? quantity++ : quantity--;

            axios({
                method: 'POST',
                url: '{{ route("cart.update") }}',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('.text-span-3').text('€ ' + response.data.total)
                    $('#' + product_id).find('.div-block-65').html(response.data.html).replace()
                }
            }).catch(function (error) {
            
            })
        })
		
		//DELETE FUNCTION
        $(document).on('click', '.delete', function (event) {
            let product_id = $(this).attr('p_id');

            axios({
                method: 'POST',
                url: '{{ route("cart.delete") }}',
                data: {
                    product_id: product_id,
                }
            }).then(function (response) {
                if (response.data.success) {
                    $('.text-span-3').text('€ ' + response.data.total)
                    $('.productcard.checkout#' + product_id).remove()
                }
            }).catch(function (error) {

            })
        })

    </script>
@endpush
