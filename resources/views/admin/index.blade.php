@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('admin.products') }}" style="text-decoration: none;color:white;">
                <div class="card bg-primary card-body d-flex flex-column  justify-content-center align-items-center">
                    <h3>Produits</h3>
                    <span class="font-weight-bold">
                        {{ $products->count() }}
                    </span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.orders') }}" style="text-decoration: none;color:white;">
                <div class="card bg-danger card-body d-flex flex-column  justify-content-center align-items-center">
                    <h3>Commandes</h3>
                    <span class="font-weight-bold">
                        {{ $orders ->count() }}
                    </span>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
