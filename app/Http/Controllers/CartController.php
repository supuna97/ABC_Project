<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class CartController extends Controller
{
    public function add(Item $item){
        dd($item);
    }
}
