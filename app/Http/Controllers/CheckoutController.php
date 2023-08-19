<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function index() {
        return view('frontend.pages.checkout.checkoutinfo');
   }
   public function saveCustomerInfo(Request $request) {
        $this->validate($request, [
            'first_name' => 'required | regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required | regex:/^[\pL\s\-]+$/u',
            'email' => 'required',
            // 'email' => 'required|eamil|unique:users,email',
            'password' => 'required',
            'phone' => 'required|size:11|regex:/(01)[0-9]{9}/',
            'address' => 'required',
        ]);
        return 'success';
   }
}
