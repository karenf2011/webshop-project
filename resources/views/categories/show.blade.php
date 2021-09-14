@extends ('layouts.app')

@section('content')
<div class="container-fluid">
<h1>{{$category->name}}</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-4">
        <div class="card">
            <img src="{{url($product->images->first()->img_path)}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{$product->brand->name}} {{$product->brand->line}} {{$product->name}} </h5>
            <a href="/products/{{$product->slug}}">Details</a>
            <p class="card-text">Price: &euro;{{$product->price}} </p>
            <p class="card-text">Tijdperiode: {{$product->time_period->name}} </p>

            <form action="">
            <label for="quantity">Aantal: </label>
            <input type="number" name="quantity" id="quantity" max="{{$product->stock}}" >
            <button type="submit" >In winkelwagen</button>
            </form>
            </div>
         </div> 
         </div>
    @endforeach
 </div> 

</div>

@endsection