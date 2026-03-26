<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "id" => $product->id, 
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->sale_price ?? $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => true, 'cart' => array_values($cart)]);
        }

        return redirect()->back()->with('success', 'تمت إضافة الدراجة إلى سلة السباق!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['success' => true]);
            }

            return redirect()->back()->with('success', 'تمت إزالة المنتج.');
        }
    }
}