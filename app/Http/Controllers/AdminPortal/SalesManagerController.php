<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesManagerController extends Controller
{
    // page view route function
    public function index()
    {
        return view("superadmin/superadmin-salesmanager");
    }
}
