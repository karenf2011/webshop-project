@extends('layouts.layout')

@section('content')

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-4">
            <h2>Bestelling</h2>
            <ul>
                @foreach($order->orderProducts as $product)
                <li>
                    <p>{{$product->name}}</p>
                    <p>Aantal: {{$product->quantity}}</p>
                    <p>Prijs: € {{$product->price}} p.s.</p>
                </li>
                @endforeach
                <li><h3>Total: € {{ $order->total }}</h3></li>
            </ul>  
        </div>
        <div class="col-6">
            <h1>Bedankt voor je bestelling {{$order->user->first_name}} {{$order->user->last_name}}!</h1>
            <h4>Je ontvangt een bevestiging op: {{$order->user->email}}.</h4>
        </div>
    </div>
</div>

@endsection