
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <h4 class="text-dark">Votre panier</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <img src="{{$item->associatedModel->image}}"
                             alt="{{$item->title}}"
                             width="50"
                             height="50"
                             class="img-fluid rounded" >
                        </td>
                        <td>
                            {{$item->name}}
                        </td>
                        <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" action="{{route('update.cart',$item->associatedModel->slug)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                   
                                    <input type="number" name="qty" value="{{$item->quantity}}" id="qty"   max="{{$item->associatedModel->qty}}" min="1" class="from-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                       
                        <td>
                            {{$item->price}} DH
                        </td>
                        <td>
                            {{$item->price * $item->quantity}} DH
                        </td>
                        <td>
                            <form class="d-flex flex-row justify-content-center align-items-center" action="{{route('remove.cart',$item->associatedModel->slug)}}" method="post">
                                @csrf
                                @method('delete')
                            
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="text-dark font-weight-bold">
                        <td class="border border-success" colspan="3">
                            Total
                        </td>
                        <td class="border border-success" colspan="3">
                            {{ Cart::getSubTotal() }} DH
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
