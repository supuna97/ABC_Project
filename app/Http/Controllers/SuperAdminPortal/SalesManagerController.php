<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\SalesManager;

class SalesManagerController extends Controller
{
    // page view route function
    public function index()
    {
        $sms = SalesManager::get();
        return view("superadmin/superadmin-salesmanager",compact('sms'));
    }

    //insert sm
    public function store(Request $request)
    {

        $request->validate([
            'sm_name' => 'required',
            'sm_email' => ['email','unique:App\Models\SalesManager,sm_email'],
            'sm_password' =>'required|min:8'
        ]);

        $sms = new SalesManager();

        $sms->sm_name = $request->input('sm_name');
        $sms->sm_email = $request->input('sm_email');
        $sms->sm_password = Hash::make($request->input('sm_password'));
        

        $sms->save();

        if ($sms) {
            return redirect('superadmin/superadmin-salesmanager')->with('success', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } else {
            return redirect('superadmin/superadmin-salesmanager')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
    }

     //delete data
     public function destroy($id)
     {
        SalesManager::find($id)->delete();
         return response()->json(['status'=>'Sales Manager Delete Successfully']);
 
     }

     //edit data
    public function edit_salesmanager(Request $request)
    {
        $sms = SalesManager::find($request->id);
        return $sms;
    }

    //update data
    public function update_salesmanager(Request $request)
    {
        $sms = SalesManager::find($request->get('sm_id'));  
        $sms->sm_name = $request->get('sm_name');
        $sms->sm_email = $request->get('sm_email');
        $sms->sm_password = Hash::make($request->input('sm_password'));
        
        $sms->save();

        if ($sms) {
            return redirect('superadmin/superadmin-salesmanager')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('superadmin/superadmin-salesmanager')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
