@extends ('layouts.app')

@section('content')
<div class="container-fluid">
<h1>Details</h1>
<div class="row">
    @foreach ($product->images as $product->image)
    <div class="col-3">
        <img src="{{url($product->image->img_path)}}" class="card-img-top" alt="...">
    </div>
    @endforeach
    <div class="col-3">
        <h2 class="card-title">{{$product->brand->name}} {{$product->brand->line}} {{$product->name}} </h2>
        <p>Price: &euro;{{$product->price}} </p>
        <p>Tijdperiode: {{$product->time_period->name}} </p>
        <p>Voorraad: {{$product->stock}} </p>

        <label for="quantity">Aantal: </label>
        <input type="number" name="quantity" id="quantity" max="{{$product->stock}}" >
        <button type="submit" >In winkelwagen</button>
    </div>
   
 
 </div> 
</div>
@endsection