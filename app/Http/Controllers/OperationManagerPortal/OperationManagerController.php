<?php

namespace App\Http\Controllers\OperationManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OperationManagerController extends Controller
{
    // page view route function
    public function index()
    {
        return view("operationmanager/index");
    }
}
