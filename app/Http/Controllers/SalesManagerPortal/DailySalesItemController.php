<?php

namespace App\Http\Controllers\SalesManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DailySalesItemController extends Controller
{
    // page view route function
    public function index()
    {
        return view("salesmanager/sm-dailysales-item");
    }
}
