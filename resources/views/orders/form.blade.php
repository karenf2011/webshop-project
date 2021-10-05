@extends('layouts.layout')

@section('content')
<div class="checkoutcontainer">
    <div class="checkoutgrid">
        <div class="checkoutform">
            <h3 class="mb-4">Gegevens</h3>
            <form action="{{ $action }}" method={{ $method }}>
            @csrf
                <label for="first_name">
                    <h4 class="formtext">Voornaam</h4>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" readonly>
                </label>
                <label for="last_name">
                    <h4 class="formtext">Achternaam</h4>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" readonly>
                </label>
                <label for="email">
                    <h4 class="formtext">E-mail</h4>
                    <input type="email" name="email" value="{{ $user->email }}" readonly>
                </label>
                <label for="phone_number">
                    <h4 class="formtext">Telefoon</h4> 
                    @if (isset($user->phone_number))
                        <input type="tel" name="phone_number" value="{{ $user->phone_number }}" readonly>
                    @else
                        <input type="tel" name="phone_number" maxlength="255" required>
                    @endif
                </label>
                @if (!empty($user->addresses[0]))
                    <label for="street_address">
                        <h4 class="formtext">Adres</h4>
                        <input type="text" name="street_address" value="{{ $user->addresses[0]->street_address }}" readonly>
                    </label>
                    <label for="postal_code">
                        <h4 class="formtext">Postcode</h4>
                        <input type="text" name="postal_code" value="{{ $user->addresses[0]->postal_code }}" readonly>
                    </label>
                    <label for="city">
                        <h4 class="formtext">Plaats</h4>
                        <input type="text" name="city" value="{{ $user->addresses[0]->city }}" readonly>
                    </label>
                    <label for="country">
                        <h4 class="formtext">Land</h4>
                        <input type="text" name="country" value="{{ $user->addresses[0]->country }}" readonly>
                    </label>
                @else
                    <label for="street_address">
                        <h4 class="formtext">Adres</h4>
                        <input type="text" name="street_address" maxlength="255" required>
                    </label>
                    <label for="postal_code">
                        <h4 class="formtext">Postcode</h4>
                        <input type="text" name="postal_code" maxlength="255" required>
                    </label>
                    <label for="city">
                        <h4 class="formtext">Plaats</h4>
                        <input type="text" name="city" maxlength="255" required>
                    </label>
                    <label for="country">
                        <h4 class="formtext">Land</h4>
                        <input type="text" name="country" maxlength="255" required>
                    </label>
                @endif
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
                @if ($total > 0)
                    <button type="submit" id="orderbutton" class="button-4 w-button">PLAATS ORDER</button>
                @endif 
            </div>
            </form>  
    </div>
</div>
@endsection