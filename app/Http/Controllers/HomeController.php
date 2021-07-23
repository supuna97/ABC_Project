<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch(auth()->user()->role) {
            case User::ADMIN:
                return view('admin/index');
                break;   
            case User::SUPERADMIN:
                return view('superadmin/index');
                break;  
            
            case User::OM:
                return view('operationmanager/index');
                break;  
            case User::SM:
                return view('salesmanager/index');
                break; 
            case User::CLIENTS:
                return redirect('welcome');
                break;                          
        }
        // return redirect("login");
    }
}
