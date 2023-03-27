@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$product->title}}</div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-6 mb-2 shadow-sm">
                                <div class="card"style="width:18rem,height:100%">
                                    <div class="card-img-top">
                                        <img class="img-fluid rounded" src="{{$product->image}}" alt="{{$product->title}}">

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->title}}</h5>
                                        <p class="text-dark font-weight-blod">
                                            {{$product->category->title}}
                                        </p>
                                        <p class="d-flex flex-row justify-content-between align-items-center">
                                                <span class="text-muted">
                                                    {{$product->price}} DH
                                                </span>
                                                <span class="text-danger">
                                                 <strike>{{$product->old_price}} DH</strike>   
                                                </span>
                                        </p>
                                        <p class="card-text">
                                            {{$product->description}}
                                        </p>
                                        <p class="font-weight-blod">
                                            @if ($product->instock>0)
                                            <span class="text-success">
                                                Disponible 
                                                {{$product->qty}}
                                            </span>
                                            @else
                                            <span class="text-danger">
                                                Non Disponible
                                            </span>
                                                
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                </div>
                            <hr>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="col-md-4">
           <form action="{{route('add.cart',$product->slug)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="qte" class="label-input">
                    Quantite:
                </label>
                <input type="number" name="qty" id="qty"   max="{{$product->qty}}" min="1" class="from-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block bg-dark">
                    <i class="fa fa-shopping-cart"></i>
                    Ajoute au panier
                </button>
            </div>
           </form>
           </div>
        </div>
        
    </div>
</div>
@endsection
{{-- {{route("category.products",$category->sulg)}} --}}
