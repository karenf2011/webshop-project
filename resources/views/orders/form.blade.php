@extends('layouts.layout')

@section('content')
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-4">
            <h2>Order items</h2>
            <ul>
                @foreach($products as $product)
                <li id="{{$product->id}}">
                    <p>{{$product->brand->name}} {{$product->brand->line}} {{$product->name}}</p>
                    <p>Aantal: {{$cart[$product->id]}}</p>
                    <p>Prijs: € {{$product->price}} p.s.</p>
                </li>
                @endforeach
                <li><h3>Total: € {{ $total }}</h3></li>
            </ul>  
        </div>
        <div class="col-8">
            <h2>Gegevens</h2>
            <form action="{{$action}}" method={{$method}}>
            @csrf
                <label for="first_name">First Name: 
                    <input type="text" name="first_name" id="first_name">
                </label>
                <label for="last_name">Last Name: 
                    <input type="text" name="last_name" id="last_name">
                </label>
                <label for="email">Email: 
                    <input type="email" name="email" id="email">
                </label>
                <label for="phone_number">Phone Number: 
                    <input type="tel" name="phone_number" id="phone_number">
                </label>
                <label for="street_address">Street Address: 
                    <input type="text" name="street_address" id="street_address">
                </label>
                <label for="postal_code">Postal Code: 
                    <input type="text" name="postal_code" id="postal_code">
                </label>
                <label for="city">City: 
                    <input type="text" name="city" id="city">
                </label>
                <label for="country">Country: 
                    <input type="text" name="country" id="country">
                </label>
                <button type="submit" class="button-4 w-button">PLACE ORDER</button>
            </form>
        </div>
       
          
       
</div>
</div>
@endsection