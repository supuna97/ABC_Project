<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class SalesManagerController extends Controller
{
    // page view route function
    public function index()
    {
        $sms = User::where('role','=',4)->get();
        return view("superadmin/superadmin-salesmanager",compact('sms'));
    }

    //insert sm
    public function store(Request $request)
    {

        $request->validate([
            'sm_name' => 'required',
            'sm_email' => ['email','unique:App\Models\User,email'],
            'sm_password' =>'required|min:8'
        ]);

        $sms = new User();

        $sms->name = $request->input('sm_name');
        $sms->email = $request->input('sm_email');
        $sms->password = Hash::make($request->input('sm_password'));
        $sms->role = "4";
        

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
        User::find($id)->delete();
         return response()->json(['status'=>'Sales Manager Delete Successfully']);
 
     }

     //edit data
    public function edit_salesmanager(Request $request)
    {
        $sms = User::find($request->id);
        return $sms;
    }

    //update data
    public function update_salesmanager(Request $request)
    {
        $sms = User::find($request->get('sm_id'));
        
        $request->validate([
            'sm_name' => 'required',
            'sm_email' => ['email','unique:App\Models\User,email'],
            'sm_password' =>'required|min:8'
        ]);

        $sms->name = $request->get('sm_name');
        $sms->email = $request->get('sm_email');
        $sms->password = Hash::make($request->input('sm_password'));
        $sms->role = "4";
        
        $sms->save();

        if ($sms) {
            return redirect('superadmin/superadmin-salesmanager')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('superadmin/superadmin-salesmanager')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
