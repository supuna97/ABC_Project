<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // page view route function
    public function index()
    {
        return view("superadmin/superadmin-admin");
    }
}
