@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        @include('layouts.sidebar')
          
        
        </div>
        <div class="col-md-8">
           <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>description</th>
                    <th>Qte</th>
                    <th>Prix</th>
                    <th>inStock</th>
                    <th>image</th>
                    <th>categories</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{Str::limit($product->description,50)}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if($product->instock>0)
                            <i class="fa fa-check text-success"></i>
                        @else
                            <i class="fa fa-times text-danger"></i>
                        @endif
                    </td>
                    <td>
                        <img src="{{$product->image}}" alt="{{$product->title}}" width="50" height="50" class="img-fluid rounded">
                    </td>
                    <td> {{$product->category->title}}</td>
                    <td>{{$product->id}}</td>
                </tr>
                @endforeach
            </tbody>
           </table>
            <hr>
            <div class="justify-content-center d-flex">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
