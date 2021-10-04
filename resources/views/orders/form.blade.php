@extends('layouts.layout')

@section('content')
<div class="checkoutcontainer">
    <div class="checkoutgrid">
        
        <div class="checkoutform">
            <h3>Gegevens</h3>
            <form action="{{ $action }}" method={{ $method }}>
            @csrf
                <label for="first_name">
                    <h4 class="formtext">Voornaam</h4>
                    <input type="text" name="first_name" id="first_name">
                </label>
                <label for="last_name">
                    <h4 class="formtext">Achternaam</h4>
                    <input type="text" name="last_name" id="last_name">
                </label>
                <label for="email">
                    <h4 class="formtext">E-mail</h4>
                    <input type="email" name="email" id="email">
                </label>
                <label for="phone_number">
                    <h4 class="formtext">Telefoon</h4> 
                    <input type="tel" name="phone_number" id="phone_number">
                </label>
                <label for="street_address">
                    <h4 class="formtext">Adres</h4>
                    <input type="text" name="street_address" id="street_address">
                </label>
                <label for="postal_code">
                    <h4 class="formtext">Postcode</h4>
                    <input type="text" name="postal_code" id="postal_code">
                </label>
                <label for="city">
                    <h4 class="formtext">Plaats</h4>
                    <input type="text" name="city" id="city">
                </label>
                <label for="country">
                    <h4 class="formtext">Land</h4>
                    <input type="text" name="country" id="country">
                </label>
        </div>

        <div class="checkoutitems">
            <h3 id="bestelling">Bestelling</h3>
            <ul>
                @foreach($products as $product)
                <li id="{{ $product->id }}">
                    <p>{{ $product->brand->name }} {{ $product->brand->line }} {{ $product->name }}</p>
                    <p>Aantal: {{ $cart[$product->id] }}</p>
                    <p>Prijs: € {{ $product->price }} p.s.</p>
                </li>
                @endforeach
                <h4 id="checkouttotal">Totaal: € {{ $total }}</h4>
            </ul>  
            <button type="submit" id="orderbutton" class="button-4 w-button">PLAATS ORDER</button>

        </div>
       
        </form>  
       
</div>
</div>
@endsection