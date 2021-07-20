<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    // page view route function
    public function index()
    {
        return view("superadmin/index");
    }
}
