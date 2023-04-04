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
                    <th>Client</th>
                    <th>Produit</th>
                    <th>Qte</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Payé</th>
                    <th>Livrée</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->qty}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                        @if($order->paid)
                            <i class="fa fa-check text-success"></i>
                        @else
                            <i class="fa fa-times text-dange"></i>
                        @endif
                    </td>
                    <td>
                    @if($order->delivered)
                            <i class="fa fa-check text-success"></i>
                        @else
                            <i class="fa fa-times text-dange"></i>
                        @endif
                    </td>
                    <td class="d-flex justify-content-center align-items-center ">
                        <form action="{{ route('orders.update',$order->id) }}" method="post">
                            @csrf 
                            @method('put')
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>       
                        <form id='{{ $order->id }}' action="{{ route('orders.destroy',$order->id) }}" method="post">
                            @csrf 
                            @method('delete')
                            <button 
                            onclick="event.preventDefault(); 
                            if(confirm('do you want delete order {{$order->id}}'))
                            document.getElementById('{{ $order->id }}').submit();
                            "
                             class="btn btn-sm btn-danger">
                             <i class="fa fa-trash"></i>
                            </button> 

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
           </table>
            <hr>
            <div class="justify-content-center d-flex">
            {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
