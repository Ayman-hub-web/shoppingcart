@extends('layouts.original')
@section('content')
<div class="container">
    <section>
    <div>
    @if( session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
    </div>
    <div class="row mt-2">
    @foreach($products as $product)
        <div class="col-md-4" style="margin-bottom:3px;">
            <div class="card">
            <img class="card-img-top" src="{{$product->image}}">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{route('cart.add', $product->id)}}" class="btn btn-primary">Buy</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    </section>
</div>
@endsection