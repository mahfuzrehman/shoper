<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = Product::find($request->id);
        Cart::add([
            'id' => $product->id, // unique row ID
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
        $cartproducts = Cart::getContent();
        return view('frontend.pages.cart.showcart', compact('cartproducts'));
    }
    public function updateCart(Request $request) {
        Cart::update($request->rowId, $request->quantity);
        return redirect('/cart/details');
    }
    public function deleteCart($id) {
        Cart::remove($id);
        return redirect('/cart/details');
    }
}
