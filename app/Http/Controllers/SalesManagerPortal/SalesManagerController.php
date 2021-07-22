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

        // switch(auth()->user()->role) {
        //     case User::SM:
        //         return view('salesmanager/index');
        //         break; 
        //     case User::SUPERADMIN:
        //         return view('superadmin/index');
        //         break;  
        //     case User::ADMIN:
        //         return view('admin/index');
        //         break;   
        //     case User::OM:
        //         return view('operationmanager/index');
        //         break;  
           
        //     case User::CLIENTS:
        //         return view('clients/index');
        //         break;                          
        // }
        // return redirect("login");
        return view("salesmanager/index");
    }
}
