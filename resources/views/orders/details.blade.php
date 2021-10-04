@extends('layouts.layout')

@section('content')

<div class="ordercompletecontainer">

    <div class="ordercompletemessage">
        <h1>Bedankt voor je bestelling {{$order->user->first_name}} {{$order->user->last_name}}!</h1>
        <h4>Je ontvangt een bevestiging op: {{$order->user->email}}.</h4>
    </div>

    <div class="ordercompletebox">
        <div class="ordercompleteinfo">
            <h2>Bestelling</h2>
            <ul>
                @foreach($order->orderProducts as $product)
                <li>
                    <p>{{$product->name}}</p>
                    <p>Aantal: {{$product->quantity}}</p>
                    <p>Prijs: € {{$product->price}} p.s.</p>
                </li>
                @endforeach
                <h3>Total: € {{ $order->total }}</h3>
            </ul>  
        </div>



    </div>

</div>

@endsection