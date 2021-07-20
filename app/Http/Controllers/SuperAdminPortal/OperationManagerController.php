<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OperationManagerController extends Controller
{
    // page view route function
    public function index()
    {
        return view("superadmin/superadmin-operationmanager");
    }
}
