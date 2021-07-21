<?php

namespace App\Http\Controllers\SalesManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SalesManagerController extends Controller
{
    // page view route function
    public function index()
    {
        return view("salesmanager/index");
    }
}
