<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class OperationManagerController extends Controller
{
    // page view route function
    public function index()
    {
        $oms = User::where('r_id','=',3)->get();
        return view("superadmin/superadmin-operationmanager",compact('oms'));
    }


    //insert om
    public function store(Request $request)
    {

        $request->validate([
            'om_name' => 'required',
            'om_email' => ['email','unique:App\Models\User,email'],
            'om_password' =>'required|min:8'
        ]);

        $oms = new User();

        $oms->name = $request->input('om_name');
        $oms->email = $request->input('om_email');
        $oms->password = Hash::make($request->input('om_password'));
        $oms->r_id = "3";
        

        $oms->save();

        if ($oms) {
            return redirect('superadmin/superadmin-operationmanager')->with('success', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } else {
            return redirect('superadmin/superadmin-operationmanager')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
    }

     //delete data
     public function destroy($id)
     {
        User::find($id)->delete();
         return response()->json(['status'=>'Operation Manager Delete Successfully']);
 
     }

     //edit data
    public function edit_operationmanager(Request $request)
    {
        $oms = User::find($request->id);
        return $oms;
    }

    //update data
    public function update_operationmanager(Request $request)
    {
        $oms = User::find($request->get('om_id')); 
        
        $request->validate([
            'om_name' => 'required',
            'om_email' => ['email','unique:App\Models\OperationManager,om_email'],
            'om_password' =>'required|min:8'
        ]);
        
        $oms->name = $request->get('om_name');
        $oms->email = $request->get('om_email');
        $oms->password = Hash::make($request->input('om_password'));
        $oms->r_id = "3";
        
        $oms->save();

        if ($oms) {
            return redirect('superadmin/superadmin-operationmanager')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('superadmin/superadmin-operationmanager')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
