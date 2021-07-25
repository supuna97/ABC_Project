<?php

namespace App\Http\Controllers\SuperAdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AdminController extends Controller
{
    // page view route function
    public function index()
    {
        $admins = User::where('role','=',2)->get();
        return view("superadmin/superadmin-admin", compact('admins'));
    }

    //insert admin
    public function store(Request $request)
    {

        $request->validate([
            'a_name' => 'required',
            'a_email' => ['email','unique:App\Models\User,email'],
            'a_password' =>'required|min:8'
        ]);

        $admins = new User();

        $admins->name = $request->input('a_name');
        $admins->email = $request->input('a_email');
        $admins->password = Hash::make($request->input('a_password'));
        $admins->role = "2";
        

        $admins->save();

        if ($admins) {
            return redirect('superadmin/superadmin-admin')->with('success', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } else {
            return redirect('superadmin/superadmin-admin')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
    }

     //delete data
     public function destroy($id)
     {
        User::find($id)->delete();
         return response()->json(['status'=>'Admin Delete Successfully']);
 
     }

     //edit data
    public function edit_admin(Request $request)
    {
        $admins = User::find($request->id);
        return $admins;
    }

    //update data
    public function update_admin(Request $request)
    {
        $admins = User::find($request->get('a_id'));  

        $request->validate([
            'a_name' => 'required',
            'a_email' => ['email','unique:App\Models\User,email'],
            'a_password' =>'required|min:8'
        ]);

        $admins->name = $request->get('a_name');
        $admins->email = $request->get('a_email');
        $admins->password = Hash::make($request->input('a_password'));
        $admins->role = "2";
        
        $admins->save();

        if ($admins) {
            return redirect('superadmin/superadmin-admin')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('superadmin/superadmin-admin')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
