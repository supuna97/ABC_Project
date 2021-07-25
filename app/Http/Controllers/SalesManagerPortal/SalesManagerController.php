<?php

namespace App\Http\Controllers\SalesManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class SalesManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    // page view route function
    public function index()
    {

        return view("salesmanager/index");
    }
}
