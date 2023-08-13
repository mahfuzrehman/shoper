<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        // $quantity = $request->quantity;
        // $id = $request->id;
        // $product = Product::where('id',$id)->first();
        $product = Product::find($request->id);
        Cart::add([
            'id' => $product->id, // inique row ID
            'name' => $product->product_name,
            'price' => $product->selling_price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $product->product_image,
            ]
        ]);
        return redirect('/cart/details');
    }
    public function cartDetails() {
        return view('frontend.pages.cart.showcart');
    }
}
