<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CustomerPurchasedItemController extends Controller
{

    // get purchases items by customer
    public function index()
    {

        $userId = Auth::user()->id;

        $items = DB::table('users as u')
        ->select('o.o_number as o_number','i.i_code as i_code','i.i_name as i_name','oi.price as price','oi.quantity as quantity',
                 DB::raw("DATE_FORMAT(o.created_at, '%d-%b-%Y') as created_at"))
            ->join('orders  as o', 'u.id', 'o.u_id')
            ->join('order_items as oi', 'o.o_id', 'oi.o_id')
            ->join('items as i', 'oi.i_id', 'i.i_id')
            ->where('o.u_id', '=', $userId)
            ->get();

       
        $data = $items->transform(function ($val) {
            return [
                'o_number' => $val->o_number,
                'i_code' => $val->i_code,
                'i_name' => $val->i_name,
                'price' => $val->price,
                'quantity' => $val->quantity,
                'created_at' => $val->created_at
            ];
        });


        //  $orderitems = Order::with('items')->where('u_id',$userId)->get();

        return view('client.customerpurchaseditem', ['items' => $data]);
    }
}
