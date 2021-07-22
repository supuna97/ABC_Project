<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Item;

class DashboardController extends Controller
{
    
    // page view route function
    public function index()
    {
        $kitchens = Item::where('pc_id','=','1')->get();
        $bathrooms = Item::where('pc_id','=','2')->get();
        $livings = Item::where('pc_id','=','3')->get();
        $others = Item::where('pc_id','=','4')->get();
        return view('welcome', compact('kitchens','bathrooms','livings','others'));
    }
}
