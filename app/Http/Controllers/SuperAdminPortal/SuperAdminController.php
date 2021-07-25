<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class SuperAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    // page view route function
    public function index()
    {

        return view("superadmin/index");
    }
}
