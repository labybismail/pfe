<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function index()
    {
        return view('cart.index')->with([
            "items"=> \Cart::getContent()
        ]);
    }


    public function addProductToCart(Request $request, Product $product)
    {
        \Cart::add(array(
            "id"=>$product->id,
            "name"=>$product->title,
            "price"=>$product->price,
            "quantity"=>$request->qty,
            "attributes"=>array(),
            "associatedModel"=>$product,
        ));
        return redirect()->route('cart.index');
    }
    public function updateProductOnCart(Request $request, Product $product)
    {
        \Cart::update($product->id,array(
            'quantity'=>array(
                'relative'=>false,
                'value'=>$request->qty
            )
        ));
        return redirect()->route('cart.index');
    }

    public function removeProductFromCart(Product $product)
    {
        \Cart::remove($product->id);
        return redirect()->route('cart.index');
    }
}
