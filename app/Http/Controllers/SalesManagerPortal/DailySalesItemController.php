<?php

namespace App\Http\Controllers\SalesManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Item;

class DailySalesItemController extends Controller
{
    // page view route function
    public function index()
    {

        $products = collect();

        return view('salesmanager/sm-dailysales-item', compact('products'));
    }

    //search
    public function search(Request $request)
    {

        $startDate = Carbon::createFromFormat('d/m/Y', $request->input('start_date'))->startOfDay();
        $endDate = Carbon::createFromFormat('d/m/Y', $request->input('end_date'))->endOfDay();


        $products = Item::with(['orders' => function ($query) use ($startDate,$endDate) {
            $query->whereBetween('orders.created_at', [$startDate, $endDate]);
        }])
         ->whereHas('orders', function ($query) use ($startDate,$endDate) {
            $query->whereBetween('orders.created_at', [$startDate, $endDate]);
        })
        ->get()
        ->transform(function ($product) {
            $product->byPrice = $product->orders
                ->pluck('items')
                ->flatten()
                ->where('i_id', $product->i_id)
                ->groupBy('pivot.price');
        
            return $product;
        });


        return view('salesmanager/sm-dailysales-item',compact('products'));
    }
}
