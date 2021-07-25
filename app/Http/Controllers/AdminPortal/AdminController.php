<?php

namespace App\Http\Controllers\AdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   
    // page view route function
    public function index()
    {
        return view("admin/index");
    }
}
