@extends ('layouts.app')

@section('content')
<div class="container-fluid">
<h1>Uitgelichte producten</h1>
<div class="row">
    @foreach ($featured as $feature)
    <div class="col-4">
        <div class="card">
            <img src="{{url($feature->images->first()->img_path)}}" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{$feature->brand->name}} {{$feature->brand->line}} {{$feature->name}} </h5>
            <a href="/products/{{$feature->slug}}">Details</a>
            <p class="card-text">Price: &euro;{{$feature->price}} </p>
            <p class="card-text">Tijdperiode: {{$feature->time_period->name}} </p>

            <form action="">
            <label for="quantity">Aantal: </label>
            <input type="number" name="quantity" id="quantity" max="{{$feature->stock}}" >
            <button type="submit" >In winkelwagen</button>
            </form>
            </div>
         </div> 
         </div>
    @endforeach
 </div> 

<h2 class="mt-4">Categories</h2>
@foreach ($categories as $category)
    <button>
    <a href="/categories/{{$category->name}}" class="h3" >{{$category->name}}</a>
    </button>
@endforeach

</div>

@endsection