@extends('layouts.original')
@section('content')
<div class="container">
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$editItem['title']}}
                        </h5>
                        <div class="card-text" style="display:flex;">
                            ${{$editItem['price']}}
                            <form action="{{route('product.update', $editItem['id'])}}" method="post">
                            @csrf
                            <input type="text" name="qty" id="qty" value="{{$editItem['Qty']}}">
                            <input type="submit" value="Update" class="btn btn-warning">
                            </form>
                        </div>
                        <div>
                            @error("qty")
                                    <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection