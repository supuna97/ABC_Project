<?php

namespace App\Http\Controllers\OperationManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

class OperationManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // page view route function
    public function index()
    {
        return view("operationmanager/index");
    }
}
