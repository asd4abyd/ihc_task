<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function nonSelected()
    {
        return view('dashboard.non_selected')
            ->with('products', Product::has('users', '=', 0)->paginate(15));
    }

    public function countActiveProducts()
    {
        $count = DB::table('user_products')
            ->join('products', 'products.id', '=', 'user_products.product_id')
            ->where('status', 1)
            ->sum('count');


        return view('dashboard.count_all_active_products')
            ->with('active_products', $count);
    }

    public function summarizedPricesProducts()
    {
        return view('dashboard.summarized_prices')
            ->with('users', User::where('is_admin', 0)->with('active_products')->paginate(15));
    }
}
