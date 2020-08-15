<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductCustomerController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $userProducts = $user->products;

        return view('product_customer')
            ->with('product_ids', $userProducts->pluck('id')->toArray())
            ->with('user_products', $userProducts)
            ->with('products', Product::all());
    }

    public function save(Request $request)
    {
        $user = auth()->user();

        $product = [];

        foreach ($request->get('product', []) as $key => $item) {
            $product[$key] = $item;
            $product[$key]['status'] = $product[$key]['status'] ?? 0;
        }


        $user->products()->sync($product);


        session()->flash('sawl-alert', ['type' => 'success', 'message' => trans('messages.success')]);

        return redirect()->back();
    }
}
