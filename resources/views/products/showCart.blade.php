@extends('layouts.original')
@section('content')
<div class="container">
    <section>
        <div class="row">
        @if($cart->totalQty >= 1)
            <div class="col-md-8">
            @foreach($cart->items as $product)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$product['title']}}
                        </h5>
                        <div class="card-text" style="display:flex;">
                            ${{$product['price']}}
                            <input type="text" name="qty" id="qty" value="{{$product['Qty']}}">
                            <a href="" class="btn btn-warning" style="margin-left:2px;margin-right:2px;">Change</a>
                            <form action="{{route('product.remove', $product['id'])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Remove</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
            <p><strong>Total Price: ${{$cart->totalPrice}}</strong></p> 
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body" style="margin-left:7px;margin-top:7px;margin-bottom:7px;">
                        <h3 class="card-title">
                            Your Cart
                            <hr>
                        </h3>
                        <div class="card-text" style="margin-left:7px;margin-top:7px;margin-bottom:7px;">
                            <p>
                            <span style="color:red;font-weight:bold;">Total Amount is</span>  ${{$cart->totalPrice}}
                            </p>
                            <p>
                                <span style="color:red;font-weight:bold;">Total Quantity is</span>  {{$cart->totalQty}}
                            </p>
                            <a href="{{route('cart.checkout', $cart->totalPrice)}}" class="btn btn-info" style="margin-bottom:7px;">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <p>There are no items in the cart.</p>
        @endif
        </div>
    </section>
</div>
@endsection