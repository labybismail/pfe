@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouvel Arrivage !</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-6 mb-2 shadow-sm">
                                <div class="card"style="width:18rem,height:100%">
                                    <div class="card-img-top">
                                        <img class="img-fluid rounded" src="{{$product->image}}" alt="{{$product->title}}">

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->title}}</h5>
                                        <p class="d-flex flex-row justify-content-between align-items-center">
                                                <span class="text-muted">
                                                    {{$product->price}} DH
                                                </span>
                                                <span class="text-danger">
                                                 <strike>{{$product->old_price}} DH</strike>   
                                                </span>
                                        </p>
                                        <p class="card-text">
                                            {{Str::limit($product->description,100)}}
                                        </p>
                                        <a href="{{route("products.show",$product->slug)}}"class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                            <hr>
                            <div class="jutify-content-center d-flex">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="col-md-4">
                <div class="list-group">
                    <li class="list-group-item active">
                        Categories
                    </li>
                    @foreach ($categories as $category)
                    <a href="{{route("category.products",$category->slug)}}">
                        {{$category->title}}
                        ({{$category->products->count()}})
                    </a>
                    @endforeach
                </div>
        </div>
        </div>
        
    </div>
</div>
@endsection
{{-- {{route("category.products",$category->sulg)}} --}}
